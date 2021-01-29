<?php

class UserController
{
  public static function trimhtml ($data)
  {
      $data = trim($data);
      $data = htmlspecialchars($data);
      return $data;
  }

  public function actionRegister ()
  {
      $login = $email = $password = $password2 = '';
      $result = false;

      if (isset($_POST['do_signup'])) {

          $login = self::trimhtml($_POST['login']);
          $email = self::trimhtml($_POST['email']);
          $password = htmlspecialchars($_POST['password']);
          $password2 = htmlspecialchars($_POST['password2']);

          $errors = array();

          if (!User::checkLogin($login)) {
              $errors[] = "Логин должен быть больше 4-х и меньше 20-ти символов";
          }

          if (!User::checkEmail($email)) {
              $errors[] = "Введена некорректная почта";
          }

          if (!User::checkPassword($password)) {
              $errors[] = "Минимальная длина пароля - 5 символов. Максимальная длина - 30 символов";
          }

          if (!User::checkSecondPassword($password, $password2)) {
              $errors[] = "Пароли не совпадают";
          }

          if (User::checkLoginExists($login)) {
              $errors[] = "Такой логин уже существует";
          }

          if (User::checkEmailExists($email)) {
              $errors[] = "Такой почтовый адрес уже существует";
          }

          if ($errors == False) {
              $result = User::registerUser($login, $email, $password);
              if(is_uploaded_file($_FILES['imageav']['tmp_name'])) {
                move_uploaded_file($_FILES['imageav']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/avatars/{$result}.jpg");
              }
          }
      }

      require_once VIEWS . "/user/register.php";
  }

  public static function actionLogin ()
  {
    User::loggedUser();
    $login = $email = $password = $password2 = '';
    if (isset($_POST['do_login'])) {

        $login = self::trimhtml($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $errors = array();
        $userId = User::checkUserData($login, $password);

        if ($userId == False) {
          $errors[] = "Неверно введены данные для авторизации";
        } else {
          User::auth($userId);
        }
    }

    require_once VIEWS . "/user/login.php";
  }

  public static function actionLogout()
  {
    unset($_SESSION['user']);
    header("Location: /");
  }

  /////////////////////////////////////////////////////////////////
  // Нужно будет дописать систему восстановления пароля по почте //
  /////////////////////////////////////////////////////////////////

  // public static function actionReset()
  // {
  //   $email = '';
  //   if (isset($_POST['do_reset'])) {

  //     $email = self::trimhtml($_POST['email']);

  //     if (User::checkEmailExists($email)) {
  //       $hash = 3569138601368;
  //     }

  //   }
  //   require_once VIEWS . "/user/reset.php";
  // }
}

 ?>
