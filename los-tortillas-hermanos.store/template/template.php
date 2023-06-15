<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/littlecss/lstyle.css" media="screen and (max-width: 1000px)">
    <?= $head ?? '' ?>
    <title>LosTortillasHermanos</title>
    <link rel="icon" type="image/png" href="../public/img/logoLosTortillas.png">
</head>
<body>
<div id="containerBox">
    <?php include_once 'navbar/navbar.php' ?>
    <?= $content ?? '' ?>
    <?php include_once 'footer/footer.php' ?>
</div>
</body>
</html>
