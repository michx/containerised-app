
<?php
include 'db.php';
include 'lang.php';
session_start();
$cartItems = [];
$totalPrice = 0;

// Verifica se ci sono prodotti nel carrello
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    // Prepara i placeholder per la query SQL
    $placeholders = implode(',', array_fill(0, count($_SESSION['cart']), '?'));
    $stmt = $conn->prepare("SELECT * FROM prodotti WHERE id IN ($placeholders)");

    // Bind dei parametri dinamici
    $types = str_repeat('i', count($_SESSION['cart']));
    $stmt->bind_param($types, ...$_SESSION['cart']);
    $stmt->execute();
    $result = $stmt->get_result();
    $cartItems = $result->fetch_all(MYSQLI_ASSOC);

    // Calcolo del prezzo totale
    foreach ($cartItems as $item) {
        $totalPrice += $item['prezzo'];
    }
}

// Gestione dell'ordine
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_order'])) {
    if (count($cartItems) > 0) {
        // Inserisci l'ordine nella tabella "ordini"
        $stmt = $conn->prepare("INSERT INTO ordini (data_ordine, totale) VALUES (NOW(), ?)");
        $stmt->bind_param('d', $totalPrice);
        $stmt->execute();
        $ordineId = $stmt->insert_id;

        // Inserisci i prodotti dell'ordine nella tabella "ordine_prodotti"
        $stmt = $conn->prepare("INSERT INTO ordine_prodotti (ordine_id, prodotto_id, quantita) VALUES (?, ?, ?)");
        foreach ($cartItems as $item) {
            $prodottoId = $item['id'];
            $quantita = 1; // Consideriamo una quantità di 1 per semplicità
            $stmt->bind_param('iii', $ordineId, $prodottoId, $quantita);
            $stmt->execute();
        }

        // Svuota il carrello dopo aver confermato l'ordine
        unset($_SESSION['cart']);

        // Reindirizza a una pagina di conferma
        header("Location: conferma_ordine.php?ordine_id=$ordineId");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stile.css">
    <title><?php echo t('cart_title'); ?> - SportWear</title>
</head>
<body>
    <div class="language-switch">
        <a href="?lang=it">IT</a> | <a href="?lang=en">EN</a>
    </div>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="index.php"><?php echo t('menu_home'); ?></a>
        <a href="about.php"><?php echo t('menu_about'); ?></a>
        <a href="prodotti.php"><?php echo t('menu_products'); ?></a>
        <a href="carrello.php"><?php echo t('menu_cart'); ?> (<?php echo count($_SESSION['cart']); ?>)</a>
    </div>

    <div class="main-content">
        <h1><?php echo t('cart_title'); ?></h1>
        <?php if (count($cartItems) > 0): ?>
            <table>
                <tr>
                    <th>Prodotto</th>
                    <th>Prezzo</th>
                </tr>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?php echo $item['nome']; ?></td>
                        <td>€<?php echo number_format($item['prezzo'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><strong><?php echo t('total'); ?></strong></td>
                    <td><strong>€<?php echo number_format($totalPrice, 2); ?></strong></td>
                </tr>
            </table>
            <form method="POST" action="carrello.php">
                <button type="submit" name="confirm_order">Conferma Ordine</button>
            </form>
        <?php else: ?>
            <p><?php echo t('cart_empty'); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
