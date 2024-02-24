<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Фільтр</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .form-group {
      display: inline-block;
      margin-right: 10px; /* Відредагуйте відступ за необхідністю */
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Фільтр додатків</h2>
  <form>
    <div class="form-group">
      <label for="age">Виберіть вік:</label>
      <select class="form-control" id="age">
        <option>Діти</option>
        <option>Підлітки</option>
        <option>Дорослі</option>
        <option>Усі вікові групи</option>
      </select>
    </div>
    <div class="form-group">
      <label for="category">Виберіть категорію:</label>
      <select class="form-control" id="category">
        <option>Фінанси</option>
        <option>Державні</option>
        <option>Корисні інструменти</option>
        <option>Транспорт і навігація</option>
        <option>Покупки</option>
        <option>Спілкування</option>
        <option>Розваги</option>
        <option>Оголошення та послуги</option>
        <option>Їжа і напої</option>
        <option>Бізнес-послуги</option>
        <option>Здоров'я</option>
        <option>Подорожі</option>
        <option>Освіта</option>
        <option>Книги</option>
        <option>Стиль життя</option>
        <option>Спорт</option>
        <option>Новини та події</option>
        <option>Батькам</option>
        <option>Домашні улюбленці</option>
        <option>Ставки і лотереї</option>
      </select>
    </div>
    <div class="form-group">
      <label for="search">Пошук:</label>
      <input type="text" class="form-control" id="search" placeholder="Введіть текст для пошуку">
    </div>
    <button type="submit" class="btn btn-primary">Пошук</button>
  </form>
</div>

</body>
</html>
