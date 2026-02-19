<?php
require_once __DIR__ . '/../core/Service/JsonTranslationService.php';
session_start();

$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'fr';
$_SESSION['lang'] = $lang;

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
    <nav>
        <ul>
            <li><?= $translator->trans('navbar.home') ?></li>
            <li><?= $translator->trans('navbar.about') ?></li>
            <li><?= $translator->trans('navbar.contact') ?></li>
            <li><button id="loginBtn"><?= $translator->trans('button.login') ?></button></li>
        </ul>
    </nav>

    <section class="hero">
        <h1><?= $translator->trans('hero.title') ?></h1>
        <p><?= $translator->trans('hero.subtitle') ?></p>
        <button><?= $translator->trans('hero.cta') ?></button>
    </section>

    <div id="loginPopup" style="display:none;">
        <form id="loginForm">
            <label for="email"><?= $translator->trans('login.email') ?></label>
            <input type="email" id="email" name="email" required>
            <label for="password"><?= $translator->trans('login.password') ?></label>
            <input type="password" id="password" name="password" required>
            <button type="submit"><?= $translator->trans('button.login') ?></button>
        </form>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
