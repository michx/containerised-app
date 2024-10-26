<?php
include 'lang.php';
$ordineId = isset($_GET['ordine_id']) ? intval($_GET['ordine_id']) : null;

if (!$ordineId) {
    echo "Ordine non trovato.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stile.css">
    <title>Conferma Ordine - SportWear</title>
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
        <a href="carrello.php"><?php echo t('menu_cart'); ?></a>
    </div>

    <div class="main-content">
        <h1>Ordine Confermato</h1>
        <p>Grazie per il tuo ordine! Il numero dell'ordine è: <strong><?php echo $ordineId; ?></strong></p>
        <p>Torneremo presto con i dettagli della spedizione.</p>
        <a href="index.php">Torna alla Home</a>
    </div>
</body>
</html>
