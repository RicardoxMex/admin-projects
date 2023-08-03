<!DOCTYPE html>
<html lang="<?= DEFAULT_LANGUAGE ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,1,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/turbolinks"></script>
    <link rel="stylesheet" href="<?= CSS . 'main.min.css' ?>">
    <script src="<?= JS . 'main.min.js' ?>" defer></script>

</head>

<body>
    <?= component("navbar", ['title' => $title]) ?>
    <?= component("drawer-navigation") ?>
    <div class="wrapper">
        <div class="sidebar">
            <?=component("sidebar"); 
            ?>
        </div>
        <div class="content">
            <header class="topbar" hidden>
                <!-- Contenido de la barra superior -->
            </header>
            <main>
                <?= $child ?>
            </main>
        </div>

    </div>
</body>

</html>