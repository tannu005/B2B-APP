<?php
\ = file_get_contents('database/ecomm.sql');

// Extract products
\ = explode("\n", \);
\ = [];
foreach (\ as \) {
    if (strpos(\, "INSERT INTO products") === 0) continue;
    if (preg_match("/^\((\d+),\s*'([^']+)',\s*'([^']*)',\s*'([^']+)',\s*([\d\.]+),\s*'([^']+)'/i", trim(\), \)) {
        \[] = [
            'cat_id' => intval(\[1]),
            'name' => \[2],
            'desc' => \[3],
            'slug' => \[4],
            'price' => floatval(\[5]),
            'wholesale' => round(floatval(\[5]) * 0.7),
            'photo' => 'uploads/products/' . \[6]
        ];
    }
}

echo "TOTAL_RAILWAY_PRODUCTS_PARSED: " . count(\) . "\n";
file_put_contents('railway_products.json', json_encode(\, JSON_PRETTY_PRINT));
