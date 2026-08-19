<?php
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
$pdo = (new \ReflectionProperty($app->db, 'pdo'))->getValue($app->db);
$stmt = $pdo->query("SHOW COLUMNS FROM users");
print_r($stmt->fetchAll(\PDO::FETCH_ASSOC));
