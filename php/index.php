<?php

ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', true );

?>



<?php include 'lang.php' ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stile.css">
    <title>SportWear - Il tuo negozio di abbigliamento sportivo</title>
</head>
<body>
    <!-- Inizio Sidebar -->
    <?php include 'sidebar.php' ?>
    <!-- Fine Sidebar -->

    <!-- Inizio Contenuto Principale -->
    <div class="main-content">
        <!-- Sezione Logo -->
        <div class="logo-section">
            <img src="img/logo.png" alt="SportWear Logo" class="logo">
        </div>

        <!-- Sezione Testo Accattivante -->
        <div class="intro-section">
            <?php echo t('main_page'); ?>
    </div>
    <!-- Fine Contenuto Principale -->
</body>
</html>
