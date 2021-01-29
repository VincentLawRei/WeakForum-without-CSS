<?php

class AccountController
{
    public function actionIndex ()
    {
        $userId = User::checkLogged();
        $dataFromId = User::checkUserById($userId);
        require_once VIEWS . "user/account.php";
    }
}

 ?>
