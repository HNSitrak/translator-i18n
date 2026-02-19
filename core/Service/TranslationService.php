<?php
require_once __DIR__ . '/../Repository/CategoryRepository.php';
require_once __DIR__ . '/../Repository/StatusRepository.php';

class TranslationService
{
    private CategoryRepository $categoryRepository;
    private StatusRepository $statusRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->statusRepository = new StatusRepository();
    }

    public function getActiveLanguage(string $lang): string
    {
        $allowed = ['fr','en','de'];
        return in_array($lang, $allowed) ? $lang : 'fr';
    }

    public function getCategories(string $lang): array
    {
        return $this->categoryRepository->findAllByLanguage($lang);
    }

    public function getStatuses(string $lang): array
    {
        return $this->statusRepository->findAllByLanguage($lang);
    }
}
