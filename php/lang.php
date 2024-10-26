<?php
// Inizializza la sessione per la gestione della lingua
session_start();

// Controllo della lingua
if (isset($_GET['lang']) && in_array($_GET['lang'], ['it', 'en'])) {
    $_SESSION['lang'] = $_GET['lang'];
} elseif (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'it'; // Lingua di default italiana
}

$lang = $_SESSION['lang'];

// Dizionario delle traduzioni
$translations = [
    'it' => [
        'menu_home' => 'Home',
        'menu_about' => 'About Us',
        'menu_products' => 'Prodotti',
        'menu_cart' => 'Carrello',
        'welcome' => 'Benvenuto nel nostro E-Commerce!',
        'product_details' => 'Dettagli del Prodotto',
        'add_to_cart' => 'Aggiungi al Carrello',
        'cart_empty' => 'Il carrello è vuoto.',
        'total' => 'Totale',
        'about_us_title' => 'About Us',
        'about_us_text' => 'SportWear nasce dalla passione per lo sport e il desiderio di offrire prodotti di alta qualità...',
        'cart_title' => 'Il tuo Carrello',
        'main_page' =>'<h1>Benvenuto su SportWear!</h1><p><strong>Scopri il meglio dell\'abbigliamento sportivo</strong></p><p>Sei pronto a migliorare le tue performance? Da noi trovi una selezione di capi sportivi per ogni disciplina, con materiali di alta qualità pensati per farti sentire al meglio in ogni allenamento.<br><br>Fai il primo passo verso il successo, <a href="prodotti.php">scopri i nostri prodotti</a>!</p></div>'
    ],
    'en' => [
        'menu_home' => 'Home',
        'menu_about' => 'About Us',
        'menu_products' => 'Products',
        'menu_cart' => 'Cart',
        'welcome' => 'Welcome to our E-Commerce!',
        'product_details' => 'Product Details',
        'add_to_cart' => 'Add to Cart',
        'cart_empty' => 'Your cart is empty.',
        'total' => 'Total',
        'about_us_title' => 'About Us',
        'about_us_text' => 'SportWear was born from a passion for sports and the desire to offer high-quality products...',
        'cart_title' => 'Your Cart',
        'main_page' =>'<h1>Benvenuto su SportWear!</h1><p><strong>Scopri il meglio dell\'abbigliamento sportivo</strong></p><p>Sei pronto a migliorare le tue performance? Da noi trovi una selezione di capi sportivi per ogni disciplina, con materiali di alta qualità pensati per farti sentire al meglio in ogni allenamento.<br><br>Fai il primo passo verso il successo, <a href="prodotti.php">scopri i nostri prodotti</a>!</p></div>',        
    ]
];

// Funzione di traduzione
function t($key) {
    global $translations, $lang;
    return $translations[$lang][$key];
}
?>
