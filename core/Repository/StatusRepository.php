<?php
require_once __DIR__ . '/../Database.php';

class StatusRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAllByLanguage(string $langCode): array
    {
        $sql = "
            SELECT s.id, s.code,
                COALESCE(st_current.label, st_default.label) AS label
            FROM status s
            LEFT JOIN language l_current ON l_current.code = :lang
            LEFT JOIN status_translation st_current
                ON st_current.status_id = s.id
                AND st_current.language_id = l_current.id
            JOIN language l_default ON l_default.is_default = TRUE
            LEFT JOIN status_translation st_default
                ON st_default.status_id = s.id
                AND st_default.language_id = l_default.id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['lang' => $langCode]);
        return $stmt->fetchAll();
    }
}
