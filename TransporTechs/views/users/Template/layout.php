<?php
ob_start(); // Commencer la mise en mémoire tampon de la sortie
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="./image/logo.jpg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    
<?= $content ?? 'erreur'?>


</body>
</html>
<?php
ob_end_flush(); // Afficher le contenu mis en mémoire tampon et effacer le tampon
?>