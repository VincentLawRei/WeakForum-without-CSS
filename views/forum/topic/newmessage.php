<?php require VIEWS . "layouts/header.php";?>

<div class="container mt-2">
    <a href="/">Главная</a> /
    <a href="/catalog">Весь ассортимент</a> /
    <a href="/forum">Форум</a> /
    <a href="">О магазине</a> /
    <a href="">Контакты</a>
</div>

<div class="container mt-2 rounded" style="background: silver; min-height: 500px;">
  <div class="pt-2">
    <form action="" method="post">
      <div class="form-group">
        <textarea name="message" rows="5" class="form-control" maxlength="150"></textarea>
      </div>

      <button class="btn btn-success" name="submit">Отправить сообщение</button>
    </form>
  </div>
</div>


<?php require VIEWS . "layouts/footer.php";?>
