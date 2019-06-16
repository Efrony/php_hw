<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="style/header_style.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/footer_style.css">
    <title><?=$title?></title>
</head>

<body>
    <?= $header ?>
    <?= $menu ?>
    <main>
        <?= $content ?>
    </main>
    <?= $subscribe ?>
    <?= $footer ?>
</body>

</html>