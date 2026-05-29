<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $response->subject }}</title>
</head>
<body>
    <p>Hello {{ $response->contactMessage->name }},</p>

    {!! $response->response !!}

    <hr>

    <p>
        <strong>Original message:</strong><br>
        {{ $response->contactMessage->message }}
    </p>
</body>
</html>
