<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .header, .footer {
            width: 100%;
            text-align: center;
        }
        .header img, .footer img {
            max-height: 70px;
        }
        .header {
            margin-bottom: 20px;
        }
        .content {
            margin: 0 30px;
        }
        .title {
            text-align: center;
            font-weight: bold;
            margin: 10px 0;
        }
        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }
        .signature {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="{{ public_path($document->header_logo_url) }}" alt="Logo de encabezado">
    <p><strong>{{ $document->place }}</strong></p>
</div>

<div class="content">
    <p><strong>Dirigido a:</strong> {{ $document->receiver_name }}</p>
    <p><strong>Puesto:</strong> {{ $document->receiver_position }}</p>
    <p>{{ $document->greeting }}</p>

    <div class="body">
        {!! nl2br(e($document->body)) !!}
    </div>

    <p>{{ $document->farewell }}</p>
</div>

<div class="signature">
    <p><strong>{{ $document->issuer_name }}</strong></p>
    <p>{{ $document->issuer_position }}</p>
</div>

<div class="footer">
    @if ($document->footer_logo_url)
        <img src="{{ public_path($document->footer_logo_url) }}" alt="Logo de pie de página">
    @endif
    <p>{{ $document->footer_text }}</p>
</div>
</body>
</html>
