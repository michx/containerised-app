

-- Seleziona il database appena creato
USE ecommerce;


-- Crea la tabella dei prodotti
CREATE TABLE prodotti (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descrizione TEXT,
    prezzo DECIMAL(10, 2) NOT NULL,
    immagine VARCHAR(255)
);


INSERT INTO prodotti (nome, descrizione, prezzo, immagine)
VALUES
('T-shirt running uomo', 'T-shirt leggera e traspirante per la corsa', 29.99, 'tshirt_running_uomo.jpg'),
('Shorts allenamento donna', 'Shorts elasticizzati per allenamenti intensi', 24.99, 'shorts_allenamento_donna.jpg'),
('Scarpe da running', 'Scarpe da running leggere e ammortizzate', 89.99, 'scarpe_running.jpg'),
('Felpa con cappuccio uomo', 'Felpa comoda per il tempo libero e allenamenti', 39.99, 'felpa_cappuccio_uomo.jpg'),
('Leggings sportivi donna', 'Leggings ad alta compressione per attività fisica', 34.99, 'leggings_sportivi_donna.jpg'),
('Giacca antivento uomo', 'Giacca antivento e impermeabile per outdoor', 49.99, 'giacca_antivento_uomo.jpg'),
('Pantaloni da trekking donna', 'Pantaloni resistenti e comodi per il trekking', 54.99, 'pantaloni_trekking_donna.jpg'),
('Zaino sportivo', 'Zaino capiente e resistente per le attività outdoor', 59.99, 'zaino_sportivo.jpg'),
('Canotta da palestra uomo', 'Canotta traspirante per l’allenamento in palestra', 19.99, 'canotta_palestra_uomo.jpg'),
('Guanti da ciclismo', 'Guanti leggeri e traspiranti per ciclismo', 14.99, 'guanti_ciclismo.jpg'),
('Cappellino sportivo', 'Cappellino leggero per proteggersi dal sole durante lo sport', 12.99, 'cappellino_sportivo.jpg'),
('Calze tecniche running', 'Calze leggere e traspiranti per la corsa', 9.99, 'calze_running.jpg'),
('Polo sportiva uomo', 'Polo leggera e traspirante per sport e tempo libero', 27.99, 'polo_sportiva_uomo.jpg'),
('Giacca impermeabile trekking', 'Giacca leggera e impermeabile per trekking', 74.99, 'giacca_impermeabile_trekking.jpg'),
('Tuta da ginnastica donna', 'Tuta completa per allenamenti e tempo libero', 59.99, 'tuta_ginnastica_donna.jpg'),
('Top sportivo donna', 'Top sportivo per supporto durante gli allenamenti', 22.99, 'top_sportivo_donna.jpg'),
('Pantaloncini da calcio uomo', 'Pantaloncini comodi e leggeri per il calcio', 21.99, 'pantaloncini_calcio_uomo.jpg'),
('Scarpe da basket', 'Scarpe leggere e ammortizzate per il basket', 95.99, 'scarpe_basket.jpg'),
('Maglia termica uomo', 'Maglia termica a maniche lunghe per sport outdoor', 44.99, 'maglia_termica_uomo.jpg'),
('Gilet running riflettente', 'Gilet leggero e riflettente per la corsa notturna', 18.99, 'gilet_running_riflettente.jpg');
