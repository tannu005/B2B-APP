<?php
require_once __DIR__ . '/vendor/autoload.php';
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/';
    $prefixes = ['Core\\' => 'core/', 'App\\' => 'src/'];
    foreach ($prefixes as $prefix => $dir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) continue;
        $relativeClass = substr($class, $len);
        $file = $baseDir . $dir . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) { require $file; return; }
    }
});
use Core\Application;
$app = new Application();
$db = $app->db;

$db->query("SET FOREIGN_KEY_CHECKS = 0;");
$db->query("TRUNCATE TABLE categories;");
$db->query("TRUNCATE TABLE products;");
$db->query("TRUNCATE TABLE product_variants;");
$db->query("TRUNCATE TABLE product_images;");
$db->query("SET FOREIGN_KEY_CHECKS = 1;");

$sql = file_get_contents('C:\Users\YTANNU\Downloads\ecomm.sql');
$db->query($sql);
echo "Imported actual user DB!\n";
