<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .email-container { background: white; padding: 20px; border-radius: 8px; }
        p { font-size: 16px; line-height: 1.5; }
    </style>
</head>
<body>
    <div class="email-container">
        {!! nl2br(e($bodyMessage)) !!}
    </div>
</body>
</html>
