<?php
require_once __DIR__ . '/../Service/TranslationService.php';

class HomeController
{
    private TranslationService $translationService;

    public function __construct()
    {
        $this->translationService = new TranslationService();
    }

    public function index(string $lang): void
    {
        $lang = $this->translationService->getActiveLanguage($lang);

        $categories = $this->translationService->getCategories($lang);
        $statuses = $this->translationService->getStatuses($lang);

        require __DIR__ . '/../../app/views/home.php';
    }
}
