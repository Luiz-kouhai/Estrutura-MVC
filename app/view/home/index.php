<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <p>Está é a pagina Inicial.</p>

    <br>
    <p>O seu nome é:<?=  $nome ?? '' ; ?></p>
    <br>
    <p>A sua idade é: <?= $idade ?? '' ; ?></p>
    <br>
    <p>O seu email é: <?= $email ?? '' ; ?></p>
</body>
</html>