<?php

class User
{

    public static function registerUser($login, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $time = time();
        $db = Db::getConnection();

        $sql = 'INSERT INTO users (login, email, password, date) VALUES (:login, :email, :password, :time)';
        $result = $db->prepare($sql);

        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':time', $time, PDO::PARAM_STR);

        if ($result->execute()) {
          // $lastId = LAST_INSERT_ID();
          return $db->lastInsertId();
        }
    }

    public static function checkLogin ($login)
    {

        if (strlen($login) > 4 && strlen($login) < 20) {
            return True;
        } else {
            return False;
        }
    }

    public static function checkEmail ($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return True;
        } else {
            return False;
        }
    }

    public static function checkPassword ($password)
    {
        if (strlen($password) >= 5 && strlen($password) <= 30) {
            return True;
        } else {
            return False;
        }
    }

    public static function checkSecondPassword ($password, $password2)
    {
        if ($password == $password2) {
            return True;
        } else {
            return False;
        }

    }

    public static function checkLoginExists ($login)
    {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT COUNT(*) FROM users WHERE login = :login");
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return True;
        return False;
    }

    public static function checkEmailExists ($email)
    {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return True;
        return False;
    }

    public static function checkUserData ($login, $password)
    {
        $db = Db::getConnection();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE login = :login";
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();

        if(password_verify($password, $data['password'])) {
            return $data['id'];
        } else {
            return False;
        }
    }

    public static function auth ($userId)
    {
        $_SESSION['user'] = $userId;
        header("Location: /");
    }

    public static function logout ()
    {
        unset($_SESSION['user']);
    }

    public static function checkUserById ($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM users WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    // Обратные друг другу методы: один работает при авторизированном пользователе, другой - наоборот.
    public static function checkLogged ()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        } else {
            header("Location: /");
        }
    }

    public static function loggedUser ()
    {
        if (isset($_SESSION['user'])) {
            header ("Location: /");
        }
    }

    // Для панели администратора

    public static function adminCheck ()
    {
      if (isset ($_SESSION['user'])) {
        $userDataById = self::checkUserById($_SESSION['user']);
        if ($userDataById['role'] == 'admin') {
          return True;
        }
        return False;
      }
    }

    public static function getUsersList ()
    {
      $db = Db::getConnection();
      $sql = "SELECT id, login, email, role FROM users";
      $result = $db->query($sql);
      return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteUserById ($id)
    {
      $id = intval($id);
      $db = Db::getConnection();
      $sql = "DELETE FROM users WHERE id = :id";
      $result = $db->prepare($sql);
      $result->bindParam(":id", $id, PDO::PARAM_INT);

      return $result->execute();
    }

    public static function getAdminUserById ($id)
    {
      $id = intval($id);
      $db = Db::getConnection();
      $sql = "SELECT * FROM users WHERE id = :id";
      $result = $db->prepare($sql);
      $result->bindParam(":id", $id, PDO::PARAM_INT);
      $result->execute();
      return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateUserById ($user, $id)
    {
      $db = Db::getConnection();
      $sql = "UPDATE users SET " .
      "login = :login, email = :email, role = :role " .
      "WHERE id = :id";
      $result = $db->prepare($sql);
      $result->bindParam(":login", $user['login'], PDO::PARAM_STR);
      $result->bindParam(":email", $user['email'], PDO::PARAM_STR);
      $result->bindParam(":role", $user['role'], PDO::PARAM_STR);
      $result->bindParam(":id", $id, PDO::PARAM_STR);
      return $result->execute();
    }


    // Форум

    public static function nameUserById ($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM users WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['login'];
    }


    // Аватарки
    //
    public static function getUserAvatar ($id)
    {
      $noImage = "missing.png";
      $path = "/upload/image/avatars/";
      $pathToAvatarImage = $path . $id . ".jpg";
      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToAvatarImage)) {
        return $pathToAvatarImage;
      }

      return $path . $noImage;
    }

}

 ?>
