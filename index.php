<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WalletStore</title>
  <!-- Підключення стилів Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Підключення власних стилів -->
  <link href="styles.css" rel="stylesheet">
  <style>
    .navbar-brand {
      color: #fff;
      font-size: 24px;
      font-weight: bold;
    }
    .navbar-brand:hover {
      color: #fff;
    }
    footer {
      background-color: #343a40;
      padding: 20px 0;
      color: #fff;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <?php
include "header.php"
?>
  <!-- Контент сторінки -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
        <h1 class="text-center">Ласкаво просимо на наш веб-сайт</h1>
        <p class="text-center">Тут можна написати короткий опис компанії або послуг, які вона надає.</p>
        <a href="#" class="btn btn-primary d-block mx-auto mb-4" style="width: 200px;" data-toggle="modal" data-target="#appModal">Додаток у розробці</a>
      </div>
      <div class="col-md-4">
        <img src="phone_image.jpg" class="img-fluid" alt="Телефон">
      </div>
    </div>
    <hr>
    <h2>Новини</h2>
    <ul class="list-group">
      <!-- Тут буде виводитися зміст з news.txt -->
      <?php
        $file = fopen("news.txt", "r");
        while (!feof($file)) {
          echo "<li class='list-group-item'>" . fgets($file) . "</li>";
        }
        fclose($file);
      ?>
    </ul>
  </div>

  <!-- Модальне вікно -->
  <div class="modal fade" id="appModal" tabindex="-1" role="dialog" aria-labelledby="appModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="appModalLabel">Додаток у розробці</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Наш додаток наразі знаходиться у розробці. Слідкуйте за проєктом на GitHub.
        </div>
        <div class="modal-footer">
          <a href="https://github.com/MrghtChannel" class="btn btn-primary" target="_blank">GitHub проект</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        </div>
      </div>
    </div>
  </div>

<?php
include "footer.php";
?>

  <!-- Підключення скриптів Bootstrap та jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
