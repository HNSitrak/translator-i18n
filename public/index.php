<?php
require_once __DIR__ . '/../core/Controller/HomeController.php';
session_start();

$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'fr';
$_SESSION['lang'] = $lang;

$controller = new HomeController();
$controller->index($lang);
