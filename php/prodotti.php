<?php
include 'db.php';
session_start();
$sql = 'SELECT * FROM prodotti';
$result = $conn->query($sql);

$prodotti = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prodotti[] = $row;
    }
}

// Aggiungi al carrello
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Inizializza il carrello se non esiste
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Aggiungi il prodotto al carrello
    if (!in_array($productId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productId;
    }
    header("Location: prodotti.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stile.css">
    <title>Prodotti in Vendita - SportWear</title>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="prodotti.php">Prodotti</a>
        <a href="carrello.php">Carrello (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
    </div>

    <div class="main-content">
        <h1>Prodotti in Vendita</h1>
        <div class="prodotti">
            <?php if (count($prodotti) > 0): ?>
                <?php foreach($prodotti as $prodotto): ?>
                    <div class="prodotto">
                        <img src="img/<?php echo $prodotto['immagine']; ?>" alt="<?php echo $prodotto['nome']; ?>">
                        <h2><?php echo $prodotto['nome']; ?></h2>
                        <p><?php echo $prodotto['descrizione']; ?></p>
                        <p><strong>Prezzo: €<?php echo number_format($prodotto['prezzo'], 2); ?></strong></p>
                        <form method="POST" action="prodotti.php">
                            <input type="hidden" name="product_id" value="<?php echo $prodotto['id']; ?>">
                            <button type="submit">Aggiungi al Carrello</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nessun prodotto disponibile al momento.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
