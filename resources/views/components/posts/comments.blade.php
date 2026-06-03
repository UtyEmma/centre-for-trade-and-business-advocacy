<?php

use App\Enums\CommentStatus;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    private const REMEMBER_NAME_COOKIE = 'post_comment_name';

    private const REMEMBER_EMAIL_COOKIE = 'post_comment_email';

    private const REMEMBER_COOKIE_MINUTES = 525600;

    public Post $post;

    public string $name = '';

    public string $email = '';

    public string $message = '';

    public bool $rememberDetails = false;

    public ?int $parentCommentId = null;

    public string $responseMessage = '';

    public bool $responseIsError = false;

    public function mount(Post $post): void
    {
        $this->post = $post;
        $this->name = request()->cookie(self::REMEMBER_NAME_COOKIE, '');
        $this->email = request()->cookie(self::REMEMBER_EMAIL_COOKIE, '');
        $this->rememberDetails = filled($this->name) || filled($this->email);
    }

    #[Computed]
    public function visibleComments(): Collection
    {
        return $this->post->comments()
            ->with([
                'user',
                'replies' => function (HasMany $query): void {
                    $query
                        ->where('status', CommentStatus::Approved->value)
                        ->oldest()
                        ->with('user');
                },
            ])
            ->whereNull('comment_id')
            ->where('status', CommentStatus::Approved->value)
            ->oldest()
            ->get();
    }

    #[Computed]
    public function visibleCommentCount(): int
    {
        return $this->visibleComments->sum(
            fn (Comment $comment): int => 1 + $comment->replies->count(),
        );
    }

    #[Computed]
    public function parentComment(): ?Comment
    {
        if (! $this->parentCommentId) {
            return null;
        }

        return $this->post->comments()
            ->whereNull('comment_id')
            ->where('status', CommentStatus::Approved->value)
            ->find($this->parentCommentId);
    }

    public function selectReply(int $commentId): void
    {
        $comment = $this->post->comments()
            ->whereNull('comment_id')
            ->where('status', CommentStatus::Approved->value)
            ->find($commentId);

        if (! $comment instanceof Comment) {
            return;
        }

        $this->parentCommentId = $comment->getKey();
        $this->responseMessage = 'Replying to '.$this->commentAuthorName($comment).'.';
        $this->responseIsError = false;
    }

    public function submit(): void
    {
        $this->responseMessage = '';
        $this->responseIsError = false;

        if (! $this->post->allow_comments) {
            $this->responseIsError = true;

            throw ValidationException::withMessages([
                'message' => 'Comments are closed for this post.',
            ]);
        }

        $validated = $this->validate();

        $this->post->comments()->create([
            'comment_id' => $this->parentComment?->getKey(),
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'comment' => $validated['message'],
            'status' => CommentStatus::Pending,
            'approved_at' => null,
        ]);

        $this->rememberVisitorDetails();
        $this->reset('message', 'parentCommentId');
        $this->resetValidation();

        $this->responseMessage = 'Thank you. Your comment is awaiting moderation.';

        unset($this->visibleComments, $this->visibleCommentCount, $this->parentComment);
    }

    public function commentAuthorName(Comment $comment): string
    {
        return $comment->user?->name ?: ($comment->name ?: 'Anonymous');
    }

    /**
     * @return array<string, list<string>>
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    private function rememberVisitorDetails(): void
    {
        if ($this->rememberDetails) {
            Cookie::queue(self::REMEMBER_NAME_COOKIE, $this->name, self::REMEMBER_COOKIE_MINUTES);
            Cookie::queue(self::REMEMBER_EMAIL_COOKIE, $this->email, self::REMEMBER_COOKIE_MINUTES);

            return;
        }

        Cookie::expire(self::REMEMBER_NAME_COOKIE);
        Cookie::expire(self::REMEMBER_EMAIL_COOKIE);
    }
};
?>

<div>
    <div class="tp-blog-details-comment-ptb tp-sec-ptb pb-140">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="postbox-details-comment mb-55">
                        <h3 class="postbox-details-comment-title">{{ str_pad((string) $this->visibleCommentCount, 2, '0', STR_PAD_LEFT) }} Comments</h3>
                        <ul>
                            @foreach ($this->visibleComments as $comment)
                                <li wire:key="comment-{{ $comment->getKey() }}">
                                    <div class="postbox-details-comment-box d-flex">
                                        {{-- <div class="postbox-details-comment-info">
                                            <div class="postbox-details-comment-avater mr-20">
                                                <img loading="lazy" src="assets/img/blog/user-2.jpg" alt="">
                                            </div>
                                        </div> --}}
                                        <div class="postbox-details-comment-text">
                                            <div class="postbox-details-comment-name">
                                                <h3>{{ $this->commentAuthorName($comment) }}</h3>
                                                <span class="post-meta"> {{ $comment->created_at?->format('F j, Y \a\t g:i a') }}</span>
                                            </div>
                                            <p>{{ $comment->comment }}</p>
                                            @if ($post->allow_comments)
                                                <div class="postbox-details-comment-reply">
                                                    <a href="#contact-form" wire:click="selectReply({{ $comment->getKey() }})">
                                                        <svg width="12" height="10" viewBox="0 0 14 10" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M1 5.00024L9 5.00024C10.3333 5.00024 13 5.80025 13 9.00025"
                                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                                            </path>
                                                        </svg>
                                                        Reply
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>

                                @foreach ($comment->replies as $reply)
                                    <li class="children" wire:key="comment-reply-{{ $reply->getKey() }}">
                                        <div class="postbox-details-comment-box d-flex">
                                            {{-- <div class="postbox-details-comment-info">
                                                <div class="postbox-details-comment-avater mr-20">
                                                    <img loading="lazy" src="assets/img/blog/user-3.jpg" alt="">
                                                </div>
                                            </div> --}}
                                            <div class="postbox-details-comment-text">
                                                <div class="postbox-details-comment-name">
                                                    <h3>{{ $this->commentAuthorName($reply) }}</h3>
                                                    <span class="post-meta"> {{ $reply->created_at?->format('F j, Y \a\t g:i a') }}</span>
                                                </div>
                                                <p>{{ $reply->comment }}</p>
                                                @if ($post->allow_comments)
                                                    <div class="postbox-details-comment-reply">
                                                        <a href="#contact-form" wire:click="selectReply({{ $comment->getKey() }})">
                                                            <svg width="12" height="10" viewBox="0 0 14 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M1 5.00024L9 5.00024C10.3333 5.00024 13 5.80025 13 9.00025"
                                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                                                </path>
                                                            </svg>
                                                            Reply
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>

                    @if ($post->allow_comments)
                        <div class="postbox-details-comment-from">
                            <h3 class="postbox-details-comment-title">Share your thoughts</h3>

                            <form id="contact-form" wire:submit="submit">
                                <div class="tp-contact-input-form">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="tp-contact-input p-relative mb-20">
                                                <input placeholder="Your name" type="text" name="name" wire:model="name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="tp-contact-input p-relative mb-20">
                                                <input placeholder="Your email" type="email" name="email" wire:model="email">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="tp-contact-input p-relative mb-20">
                                                <textarea placeholder="Write your thoughts here...."
                                                    name="message" wire:model="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="tp-contact-input-remeber mb-35">
                                                <div class="tp-checkbox-item ">
                                                    <input class="tp-form-checkbox" id="checkbox" type="checkbox" wire:model="rememberDetails">
                                                    <label class="tp-form-checkbox-label" for="checkbox">Save my name,
                                                        email, and website in this browser for the next time I
                                                        comment.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-contact-btn">
                                            <button class="tp-btn theme-bg-color tp-btn-switch-animation" type="submit">
                                                <span class="d-flex align-items-center justify-content-center">
                                                    <span class="btn-text">
                                                        Submit your message
                                                    </span>
                                                    <i class="btn-icon"></i>
                                                    <i class="btn-icon"></i>
                                                </span>
                                            </button>
                                            <p class="ajax-response {{ $errors->any() || $responseIsError ? 'text-danger' : 'text-success' }} mt-1 mb-0">
                                                {{ $errors->first() ?: $responseMessage }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
