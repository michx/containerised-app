<?php
include 'lang.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stile.css">
    <title><?php echo t('menu_about'); ?> - SportWear</title>
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
        <a href="carrello.php"><?php echo t('menu_cart'); ?> (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
        <div class="language-switch">
            <a href="?lang=it">IT</a> | <a href="?lang=en">EN</a>
        </div>
    </div>

    <div class="main-content">
        <h1><?php echo t('about_us_title'); ?></h1>
        <div class="about-section">
            <p><?php echo t('about_us_text'); ?></p>
        </div>
    </div>
</body>
</html>
