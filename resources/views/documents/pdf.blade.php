<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 13.5px;
            line-height: 1.5;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .header img {
            height: 60px;
        }

        .content {
            margin: 20px;
        }

        .content .date {
            margin-left: 70%;
            text-align: right;
        }

        .recipient {
            margin-top: 20px;
            text-align: center;
        }

        .content p {
            text-align: justify;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 75%;
            background-color: #fff;
        }

        .footer p {
            font-size: 12px;
            color: #555;
            margin: 0;
        }

        .footer img {
            height: 60px;
            margin-left: 90%;
        }

        .signature-table {
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
        }

        .signature-table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        .signature-table {
            max-width: 100%;
            height: auto;
        }

        .image-cell img {
            max-width: 100%;
            width: 60px;
        }
    </style>
</head>

<body>
    <div class="header">
        @if ($document->header_logo_url)
            <img src="{{ public_path('storage/'.$document->header_logo_url) }}" alt="Logo de encabezado">
        @endif
    </div>

    <div class="content">
        <div class="date">
            <p>{{ $document->place }}, a {{ $document->created_at }}</p>
        </div>

        <div class="recipient">
            <p><strong>{{ $document->receiver_name}}</strong></p>
            <p>{{ $document->receiver_position}}</p>
            <p><strong>{{ $document->greeting}}</strong></p>
        </div>

        <p>{!! $document->body !!}</p>

        <p><strong>{{ $document->farewell }}</strong></p>
        <p><strong>{{ $document->issuer_name }}</strong></p>
        <p>{{ $document->issuer_position}}</p>


        <table class="signature-table">
            <tr>
                <td colspan="2">Firma Digital</td>
            </tr>
            <tr>
                <td class="image-cell">
                    <img src="{{ public_path('storage/' . $document->qrCodePath) }}" alt="Código QR">
                </td>
                <td>{{ $document->signedDocument->cfdi }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <table style="width:100%">
            <tr>
                <th style="width:90%"></th>
                <th></th>
            </tr>
            <tr>
                <td>
                    <p>{!! $document->footer_text !!}</p>
                </td>
                <td>
                    @if ($document->footer_logo_url)
                        <img src="{{ public_path('storage/'.$document->footer_logo_url) }}" alt="Logo de pie de página">
                    @endif
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
