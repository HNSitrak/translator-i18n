<?php
require_once __DIR__ . '/../../core/Service/JsonTranslationService.php';
$translator = new JsonTranslationService($lang);
?>
<!DOCTYPE html>
<html lang="<?= $translator->getCurrentLanguage() ?>">
<head>
    <meta charset="UTF-8">
    <title><?= $translator->trans('hero.title') ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <?= $translator->trans('hero.title') ?>
            </div>

            <ul class="nav-links">
                <li><?= $translator->trans('navbar.home') ?></li>
                <li><?= $translator->trans('navbar.about') ?></li>
                <li><?= $translator->trans('navbar.contact') ?></li>
            </ul>

            <div class="lang-switch">
                <a href="?lang=fr"><?= $translator->trans('language.fr') ?></a>
                <a href="?lang=en"><?= $translator->trans('language.en') ?></a>
                <a href="?lang=de"><?= $translator->trans('language.de') ?></a>
            </div>
            
            <button id="loginBtn">
                <?= $translator->trans('button.login') ?>
            </button>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h1><?= $translator->trans('hero.welcome') ?></h1>
            <p><?= $translator->trans('hero.subtitle') ?></p>

            <div class="translator-box">
                <input type="text" placeholder="..." />
                <button>
                    <?= $translator->trans('button.start') ?>
                </button>
            </div>

            <div class="hero-cards">

                <div class="card-grid">
                    <?php foreach($categories as $cat): ?>
                        <div class="card">
                            <h3><?= $cat['label'] ?></h3>
                            <span><?= $translator->trans('categories.code') ?>: <?= $cat['code'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="card-grid">
                    <?php foreach($statuses as $st): ?>
                        <div class="card">
                            <h3><?= $st['label'] ?></h3>
                            <span><?= $translator->trans('statuses.heading') ?>: <?= $st['code'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </header>

    <div id="loginPopup" class="popup-overlay">
        <div class="popup-content">
            <form id="loginForm">
                <h3><?= $translator->trans('button.login') ?></h3>

                <label><?= $translator->trans('login.email') ?></label>
                <input type="email" required>

                <label><?= $translator->trans('login.password') ?></label>
                <input type="password" required>

                <button type="submit">
                    <?= $translator->trans('button.login') ?>
                </button>
            </form>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
