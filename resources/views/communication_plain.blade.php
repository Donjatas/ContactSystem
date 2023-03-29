<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message from Contact Management System</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 16px;">
    <div style="max-width: 600px; margin: 0 auto;">
        <p style="font-size: 20px;">Žinutė išsiųsta naudojantis kontaktų valdymo sistema</p>
        <br>
        <br>
        <p style="font-size: 18px;">Jums parašė {{ $kontaktas->name }} {{ $kontaktas->lastname }}:</p>
        <p style="font-size: 16px; margin-bottom: 20px;">{{ $emailMessage }}</p>
        <br>
        <p style="font-size: 18px;">Išsiųsto asmens kontaktiniai duomenys:</p>
        <p style="font-size: 16px; margin-bottom: 20px;">El. paštas - {{ $kontaktas->email }}</p>
        <p style="font-size: 16px; margin-bottom: 20px;">Telefono nr. - {{ $kontaktas->phone }}</p>
        <br>
        <br>
        <p style="font-size: 16px;">Jeigu žinutė kuri buvo atsiųsta jus įžeidžia prašome pranešti el. paštu: <a href="mailto:xdonatasx.l@gmail.com">xdonatasx.l@gmail.com</a></p>
        <p style="font-size: 16px;">Malonios dienos jums linki Kontaktų valdymo sistema</p>
    </div>
</body>
</html>
