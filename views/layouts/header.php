<!DOCTYPE html>
<html lang="en">
<style>

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="templates/favicon3.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

<style>

.product
{
  border: 1px solid #000;
}

.producttext
{
  margin: 0;
  padding: 0;
}
</style>
</head>
<body>
 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-decoration-none">My Test Site</a></h4>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/">Главная</a>
    <?php if(isset($_SESSION['user'])): ?>
  <a class="btn btn-outline-success mr-2" href="/account">Личный кабинет</span></a>
  <a class="btn btn-outline-danger" href="/logout">Выйти</a>
  </nav>
    <?php else: ?>
    <a class="p-2 text-dark" href="/signup">Регистрация</a>
  </nav>
  <a class="btn btn-outline-primary" href="/login">Авторизоваться</a>
    <?php endif; ?>
</div>
