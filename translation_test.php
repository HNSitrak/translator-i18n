<?php
require_once 'core/Service/JsonTranslationService.php';

$translator = new JsonTranslationService('de');
echo $translator->trans('hero.title');

$translator = new JsonTranslationService('en');
echo $translator->trans('hero.title');

$translator = new JsonTranslationService('fr');
echo $translator->trans('hero.title');
