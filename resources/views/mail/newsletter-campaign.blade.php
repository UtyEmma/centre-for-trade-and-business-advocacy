<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $recipient->campaign->subject }}</title>
</head>
<body>
    @if (filled($previewText))
        <div style="display:none;max-height:0;overflow:hidden;">{{ $previewText }}</div>
    @endif

    {!! $body !!}

    <hr>

    {!! $footer !!}
</body>
</html>
