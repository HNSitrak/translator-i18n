<?php
require_once __DIR__ . '/../Database.php';

class CategoryRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAllByLanguage(string $langCode): array
    {
        $sql = "
            SELECT c.id, c.code,
                COALESCE(ct_current.label, ct_default.label) AS label
            FROM category c
            LEFT JOIN language l_current ON l_current.code = :lang
            LEFT JOIN category_translation ct_current
                ON ct_current.category_id = c.id
                AND ct_current.language_id = l_current.id
            JOIN language l_default ON l_default.is_default = TRUE
            LEFT JOIN category_translation ct_default
                ON ct_default.category_id = c.id
                AND ct_default.language_id = l_default.id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['lang' => $langCode]);
        return $stmt->fetchAll();
    }
}
