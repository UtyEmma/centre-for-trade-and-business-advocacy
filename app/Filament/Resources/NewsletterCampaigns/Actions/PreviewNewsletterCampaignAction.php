<?php

namespace App\Filament\Resources\NewsletterCampaigns\Actions;

use App\Models\NewsletterCampaign;
use App\Support\NewsletterContent;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\HtmlString;

final class PreviewNewsletterCampaignAction
{
    public static function make(): Action
    {
        return Action::make('previewCampaign')
            ->label('Preview')
            ->icon(Heroicon::OutlinedEye)
            ->color('gray')
            ->modalHeading(fn (NewsletterCampaign $record): string => $record->subject)
            ->modalSubmitAction(false)
            ->modalCancelActionLabel('Close')
            ->modalContent(fn (NewsletterCampaign $record): HtmlString => new HtmlString(
                '<div class="space-y-4">'
                .'<div><p class="text-sm font-medium text-gray-500">Subject</p><p class="text-base font-semibold">'.e(NewsletterContent::render($record->subject, campaign: $record)).'</p></div>'
                .'<div><p class="text-sm font-medium text-gray-500">Preview text</p><p>'.(filled($record->preview_text) ? e(NewsletterContent::render($record->preview_text, campaign: $record)) : '-').'</p></div>'
                .'<div class="prose max-w-none">'.NewsletterContent::render($record->content, campaign: $record).'</div>'
                .'</div>'
            ));
    }
}
