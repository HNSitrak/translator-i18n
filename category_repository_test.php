<?php
require_once 'core/Repository/CategoryRepository.php';

$repo = new CategoryRepository();
$cats = $repo->findAllByLanguage('en');

print_r($cats);
