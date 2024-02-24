<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інформація про додаток</title>
    <!-- Підключення стилів Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Общие стили */
        body {
            padding-top: 20px;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
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
        <div class="app-details">
            <?php
            // Проверяем наличие параметра id в URL
            if(isset($_GET['id'])) {
                // Получаем значение параметра id из URL
                $id = $_GET['id'];

                // Определите свой ключ доступа к API
                $api_key = 'ВАШ_КЛЮЧ_API';

                // URL для запроса к API с использованием переданного id
                $url = "http://127.0.0.1:5000/api/applications?id=$id";

                // Получаем данные из API
                $response = file_get_contents($url);

                // Проверяем успешность запроса и выводим результат
                if($response) {
                    $data = json_decode($response, true);
                    if(!empty($data)) {
                        $product = $data[0];
                        echo "<img src='{$product['icon']}' alt='Іконка додатка'>";
                        echo "<div>";
                        echo "<h2>{$product['name']}</h2>";
                        echo "<p>Description: {$product['description']}</p>";
                        echo "<p>Version: {$product['version']}</p>";
                        echo "<p>Type: {$product['type']}</p>";
                        echo "<p>Status: {$product['status']}</p>";
                        echo "<p>Age Restriction: {$product['age_restriction']}</p>";
                        echo "<p>Author: {$product['author']}</p>";
                        echo "<a href='{$product['apk']}' class='btn' download>Завантажити APK</a>";
                        echo "<div class='app-banners'>";
                        // Проверяем наличие изображений баннеров и выводим их
                        for($i = 1; $i <= 3; $i++) {
                            $bannerKey = "banner$i";
                            if(isset($product[$bannerKey])) {
                                echo "<img src='{$product[$bannerKey]}' alt='Баннер $i'>";
                            }
                        }
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<p class='text-center'>Не вдалося отримати дані про додатки.</p>";
                    }
                } else {
                    echo "<p class='text-center'>Не вдалося здійснити запит до сервера.</p>";
                }
            } else {
                echo "<p class='text-center'>ID не передано в URL.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
