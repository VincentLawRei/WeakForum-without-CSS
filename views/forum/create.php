<?php require VIEWS . "layouts/header.php";?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Главная</a></li>
    <li class="breadcrumb-item"><a href="/forum">Форум</a></li>
    <li class="breadcrumb-item active" aria-current="page">Создать новую тему</li>
  </ol>
</nav>

<div class="container mt-2 rounded" style="background: silver; min-height: 500px;">
  <h4 class="text-center p-3 border-bottom">Форум</h4>
  <div>
    <form action="" method="post">
      <div class="form-group">
        <input type="text" name="topic" placeholder="Название темы" class="form-control">
      </div>
        <div class="form-group">
          <textarea name="firstmessage" placeholder="Сообщение" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary" name="submit">Создать новую тему</button>
    </form>
  </div>
</div>


<?php require VIEWS . "layouts/footer.php";?>
