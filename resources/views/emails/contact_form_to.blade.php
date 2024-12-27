<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesajınız Başarıyla Gönderildi!</title>
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

        .cta-button {
            display: inline-block;
            background-color: #009688;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }

        .cta-button:hover {
            background-color: #00796b;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Mesajınız Başarıyla Gönderildi!</h2>
        </div>
        <div class="content">
            <p>Merhaba {{ $name }},</p>
            <p>İletişim formunuz başarıyla gönderildi. Mesajınız bizlere ulaştı ve en kısa sürede geri dönüş sağlanacaktır.</p>

            <p>Bizimle iletişimde kalmak için sitemizi ziyaret edebilirsiniz. <a href="https://tayfuntasdemir.com.tr" target="_blank">Buraya tıklayarak</a> daha fazla bilgi edinin.</p>

            <p>İyi günler dileriz!</p>
        </div>
        <div class="footer">
            <p>Bizimle çalışmak isterseniz <a href="mailto:info@tayfuntasdemir.com.tr">buraya tıklayarak</a> iletişime geçebilirsiniz.</p>
        </div>
    </div>

</body>
</html>
