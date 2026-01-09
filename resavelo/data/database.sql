-- Création de la base de données

CREATE DATABASE IF NOT EXISTS resavelo
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE resavelo;

-- Création des tables
    -- Création de la table velos
    CREATE TABLE velos (
        velo_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(150) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        quantity INT NOT NULL DEFAULT 0,
        description TEXT,
        image_url VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Création de la table reservations
    CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    velo_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    total_price DECIMAL(10,2) NOT NULL, -- pour les prix (évite les erreurs de calcul)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_reservations_velos
        FOREIGN KEY (velo_id) -- pour lier réservations ↔ vélos
        REFERENCES velos(velo_id)
        ON DELETE CASCADE -- ON DELETE CASCADE → si un vélo est supprimé, ses réservations aussi
    );

-- Création de fausses données 
    -- velos
    INSERT INTO velos (name, price, quantity, description, image_url) VALUES
    (
    'Vélo de ville classique',
    15.00,
    10,
    'Vélo confortable idéal pour les déplacements urbains.',
    'velo-ville.jpg'
    ),
    (
    'VTT tout terrain',
    25.00,
    5,
    'VTT robuste adapté aux chemins et sentiers.',
    'vtt.jpg'
    ),
    (
    'Vélo électrique',
    35.00,
    4,
    'Vélo électrique avec assistance jusqu’à 25 km/h.',
    'velo-electrique.jpg'
    ),
    (
    'Vélo enfant',
    10.00,
    8,
    'Vélo sécurisé pour enfants de 6 à 10 ans.',
    'velo-enfant.jpg'
    ),
    (
    'Vélo de route',
    30.00,
    3,
    'Vélo léger conçu pour la vitesse et les longues distances.',
    'velo-route.jpg'
    );

    -- réservations 
    INSERT INTO reservations (velo_id, start_date, end_date, total_price) VALUES
    (
    1,
    '2026-01-10',
    '2026-01-12',
    30.00
    ),
    (
    2,
    '2026-01-15',
    '2026-01-18',
    75.00
    ),
    (
    3,
    '2026-01-20',
    '2026-01-21',
    35.00
    ),
    (
    1,
    '2026-02-01',
    '2026-02-05',
    60.00
    ),
    (
    4,
    '2026-02-10',
    '2026-02-11',
    10.00
    );

