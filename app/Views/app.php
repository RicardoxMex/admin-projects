<!DOCTYPE html>
<html lang="<?= DEFAULT_LANGUAGE ?>">

<head>
    <link rel="shortcut icon" href="/images/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,1,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/turbolinks"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= CSS . 'main.min.css' ?>">
    <script src="<?= JS . 'main.min.js' ?>" defer></script>
   
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('DisplayMode', {
                mode: (localStorage.getItem("DisplayMode")) ?  localStorage.getItem("DisplayMode") : 'table',
                setMode(mode){
                    this.mode = mode;
                    localStorage.setItem("DisplayMode", mode);
                }
            })
            Alpine.store('ProjectStore', {
                projects: [],
                updateState(projects) {
                    this.projects = projects;
                }
            })
        })
    </script>
    
</head>

<body>

    <style>
        .turbolinks-progress-bar {
            height: 5px;
            background-color: green;
        }

        .turbolinks-progress-bar {
            visibility: hidden;
        }

        body {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 199, 233, 1) 100%);
        }
    </style>


    <?= component("navbar", ['title' => $title]) ?>
    <?= component("drawer-navigation") ?>
    <div class="wrapper">
        <div class="sidebar">
            <?= component("sidebar");
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