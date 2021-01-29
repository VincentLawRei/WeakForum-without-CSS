<?php

class ForumController
{
  public function actionIndex ()
  {

    $topics = Forum::viewAllTopics();
    require_once VIEWS . "forum/index.php";
    return True;
  }

  public function actionTopic (int $topicId)
  {
    $messagesFromTopic = Forum::topicView($topicId);
    if ($messagesFromTopic == False) {
      header("Location: /forum");
      return True;
    }

    $topicName = Forum::checkTopicName($topicId);
    require_once VIEWS . "forum/topic/index.php";
    return True;
  }

  public function actionCreateTopic ()
  {
    if (isset($_POST['submit'])) {
      if (strlen(trim($_POST['topic'])) < 3) {
        echo "<hr> Введите корректное название для новой темы <hr>";
        exit();
      }
      if (strlen(trim($_POST['firstmessage'])) < 10) {
        echo "<hr>Сообщение должно содержать больше десяти символов<hr>";
        exit();
      }
      $data['topicname'] = htmlspecialchars($_POST['topic']);
      $data['user'] = $_SESSION['user'];

      $info['topicId'] = Forum::createNewTopic($data);
      $info['user'] = $_SESSION['user'];
      $info['message'] = htmlspecialchars($_POST['firstmessage']);
      Forum::createMessage($info);


    }
    require_once VIEWS . "forum/create.php";
    return True;
  }

  public function actionCreateMessage ($topicId)
  {
    $topicId = intval($topicId);
    if (isset($_POST['submit'])) {
      $info['message'] = htmlspecialchars($_POST['message']);
      $info['user'] = $_SESSION['user'];
      $info['topicId'] = htmlspecialchars($topicId);
      Forum::createMessage($info);
      header("Location: /forum/topic/$topicId");

    }
    require_once VIEWS . "forum/topic/newmessage.php";
    return True;
  }
}

 ?>
