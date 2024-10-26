<?php
include 'db.php'; // Connessione al database

// Verifica che sia stato fornito un ID prodotto
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Assicura che l'ID sia un intero per maggiore sicurezza

    // Query per ottenere i dettagli del prodotto
    $sql = "SELECT * FROM prodotti WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Associa il parametro come intero
    $stmt->execute();
    $result = $stmt->get_result();

    // Controlla se il prodotto è stato trovato
    if ($result->num_rows > 0) {
        $prodotto = $result->fetch_assoc();
    } else {
        echo "Prodotto non trovato.";
        exit;
    }
} else {
    echo "ID prodotto mancante.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stile.css">
    <title><?php echo $prodotto['nome']; ?> - SportWear</title>
</head>
<body>
    <!-- Inizio Sidebar -->
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="prodotti.php">Prodotti</a>
    </div>
    <!-- Fine Sidebar -->

    <!-- Inizio Contenuto Principale -->
    <div class="main-content">
        <h1><?php echo $prodotto['nome']; ?></h1>
        <div class="product-details">
            <img src="img/<?php echo $prodotto['immagine']; ?>" alt="<?php echo $prodotto['nome']; ?>" class="product-image">
            <div class="product-info">
                <p class="product-description"><?php echo $prodotto['descrizione']; ?></p>
                <p><strong>Prezzo: €<?php echo number_format($prodotto['prezzo'], 2); ?></strong></p>
                <a href="prodotti.php" class="back-link">Torna ai prodotti</a>
            </div>
        </div>
    </div>
    <!-- Fine Contenuto Principale -->
</body>
</html>
