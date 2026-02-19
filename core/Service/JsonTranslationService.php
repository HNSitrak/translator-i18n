<?php

class JsonTranslationService
{
    private array $translations = [];
    private array $fallbackTranslations = [];
    private string $lang;
    private string $defaultLang = 'fr';

    public function __construct(string $requestedLang)
    {
        $this->lang = $this->resolveLanguage($requestedLang);
        $this->loadTranslations();
    }

    private function resolveLanguage(string $requestedLang): string
    {
        $supported = ['fr', 'en', 'de'];
        return in_array($requestedLang, $supported) ? $requestedLang : $this->defaultLang;
    }

    private function loadTranslations(): void
    {
        $basePath = __DIR__ . '/../../app/i18n/';

        $currentFile = $basePath . $this->lang . '.json';
        $fallbackFile = $basePath . $this->defaultLang . '.json';

        if (file_exists($currentFile)) {
            $this->translations = json_decode(file_get_contents($currentFile), true) ?? [];
        }

        if (file_exists($fallbackFile)) {
            $this->fallbackTranslations = json_decode(file_get_contents($fallbackFile), true) ?? [];
        }
    }

    public function trans(string $key): string
    {
        return $this->translations[$key] ?? $this->fallbackTranslations[$key] ?? $key;
    }

    public function getAll(): array
    {
        return array_merge($this->fallbackTranslations, $this->translations);
    }

    public function getCurrentLanguage(): string
    {
        return $this->lang;
    }
}
