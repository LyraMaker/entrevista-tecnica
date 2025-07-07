<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sync360.io | Sistema de perfis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css" />
    <script defer src="https://friconix.com/cdn/friconix.js"></script>
    <link rel="stylesheet" href="<?= $_ENV['base_url'] ?>/css/style.css">
    <script src="<?= $_ENV['base_url'] ?>/js/script.js" defer></script>

</head>

<body data-theme="light">
    <nav class="navbar is-centered-mobile has-background-info-light" role="navigation">
        <div class="navbar-brand is-flex is-justify-content-center is-align-items-center">
            <a href="./index.php" class="navbar-item is-uppercase has-text-black title-container">
                <h1 class="title is-5">Sistema de perfis</h1>
            </a>
        </div>
        <div class="navbar-end is-hidden-touch">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="/create" class="button is-primary"><strong>Novo perfil</strong></a>
                </div>
            </div>
        </div>
    </nav>