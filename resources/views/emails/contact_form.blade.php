<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni İletişim Formu Mesajı</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #009688;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .header h2 {
            margin: 0;
        }

        .content {
            padding: 20px;
            font-size: 16px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 0 0 8px 8px;
        }

        .details {
            margin-bottom: 20px;
        }

        .details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Yeni İletişim Formu Mesajı</h2>
        </div>
        <div class="content">
            <p>Merhaba,</p>
            <p>Yeni bir iletişim formu mesajınız alındı. Aşağıda mesajın detaylarını bulabilirsiniz:</p>

            <div class="details">
                <p><strong>Adı:</strong> {{ $name }}</p>
                <p><strong>E-posta:</strong> {{ $email }}</p>
                <p><strong>Mesaj:</strong></p>
                <p>{{ $message }}</p>
            </div>
        </div>
    </div>

</body>
</html>
