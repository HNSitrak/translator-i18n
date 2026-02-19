CREATE TABLE language (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(5) NOT NULL UNIQUE,
    name VARCHAR(50) NOT NULL,
    is_default BOOLEAN NOT NULL DEFAULT FALSE,
    is_active BOOLEAN NOT NULL DEFAULT TRUE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO language (code, name, is_default) VALUES
('fr', 'Français', TRUE),
('en', 'English', FALSE),
('de', 'Deutsch', FALSE);

CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE category_translation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    language_id INT NOT NULL,
    label VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_category_translation_category FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE,
    CONSTRAINT fk_category_translation_language FOREIGN KEY (language_id) REFERENCES language(id) ON DELETE CASCADE,
    CONSTRAINT uq_category_language UNIQUE(category_id, language_id)
);

CREATE TABLE status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE status_translation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    status_id INT NOT NULL,
    language_id INT NOT NULL,
    label VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_status_translation_status FOREIGN KEY (status_id) REFERENCES status(id) ON DELETE CASCADE,
    CONSTRAINT fk_status_translation_language FOREIGN KEY (language_id) REFERENCES language(id) ON DELETE CASCADE,
    CONSTRAINT uq_status_language UNIQUE(status_id, language_id)
);
