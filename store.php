<?php
    include "header.php";
    ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин додатків</title>
    <!-- Підключення стилів Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Додаткові стилі */
        body {
            padding-top: 20px;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
            max-width: 800px; /* Зменшення ширини контейнера */
        }
        .product {
            margin-bottom: 20px;
        }
        .product img {
            max-width: 80px; /* Зменшення розміру зображення */
            height: auto;
            border-radius: 8px; /* Додати радіус */
        }
        /* Стилі для кнопки-панелі */
        .product-panel {
            cursor: pointer;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        .product-panel:hover {
            background-color: #f8f9fa;
        }
        .product-details {
            margin-left: 10px;
        }
        .product-name {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .app-details {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .app-details img {
            max-width: 80px;
            height: auto;
            border-radius: 8px;
            margin-right: 20px;
        }
        .app-details h2 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: bold;
        }
        .app-details p {
            margin-bottom: 10px;
            font-size: 16px;
            color: #555555;
        }
        .app-details .btn {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-self: flex-end;
            margin-top: 10px;
        }
        .app-banners {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: flex-start;
        }
        .app-banners img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Магазин додатків</h1>
        <div class="row">
            <?php
            include "filter.php";
            // Определите свой ключ доступа к API
            $api_key = 'ВАШ_КЛЮЧ_API';

            // URL для запроса к API
            $url = 'http://127.0.0.1:5000/api/applications';

            // Функция для получения данных через API
            function getProductsFromAPI($url, $api_key) {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    'Authorization: Bearer ' . $api_key,
                    'Content-Type: application/json',
                ]);
                $response = curl_exec($curl);
                curl_close($curl);
                $data = json_decode($response, true);
                return $data;
            }

            // Получение данных о приложениях
            $products = getProductsFromAPI($url, $api_key);

            // Вывод информации о приложениях
            if (!empty($products)) {
                foreach ($products as $product) {
                    // Выводим каждое приложение в виде панели
                    echo "<div class='col-md-4 product'>";
                    echo "<div class='product-panel' onclick=\"location.href='apps.php?id={$product['id']}'\" style='cursor: pointer;'>";
                    echo "<img src='{$product['icon']}' alt='Іконка додатка'>";
                    echo "<div class='product-details'>";
                    echo "<div class='product-name'>{$product['name']}</div>";
                    echo "<div class='product-author'>{$product['author']}</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='col'><p class='text-center'>Не вдалося отримати дані про додатки.</p></div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
