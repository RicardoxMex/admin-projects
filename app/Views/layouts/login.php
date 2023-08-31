<!DOCTYPE html>
<html lang="<?= DEFAULT_LANGUAGE ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.jsdelivr.net/npm/turbolinks"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="<?= CSS . 'main.min.css' ?>">
    <script src="<?= JS . 'main.min.js' ?>" defer></script>
    <script src="<?= JS . 'app.min.js' ?>"></script>

</head>

<body>

    <main>
        <?= $child ?>
    </main>

</body>

</html>