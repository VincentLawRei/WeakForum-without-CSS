<?php

class Forum
{
  public static function topicView ($topicId)
  {

    $db = Db::getConnection();
    $sql = "SELECT * FROM forum WHERE topic = :topicId";
    $result = $db->prepare($sql);
    $result->bindParam(":topicId", $topicId, PDO::PARAM_STR);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function createMessage ($info)
  {
    $date = time();

    // dd::dd2($info);
    // dd::dd2($timedate);
    $db = Db::getConnection();
    $sql = "INSERT INTO forum (topic, message, user, date) VALUES (:topicId, :message, :user, :date)";
    $result = $db->prepare($sql);

    $result->bindParam(":message", $info['message'], PDO::PARAM_STR);
    $result->bindParam(":topicId", $info['topicId'], PDO::PARAM_INT);
    $result->bindParam(":user", $info['user'], PDO::PARAM_INT);
    $result->bindParam(":date", $date, PDO::PARAM_INT);
    return $result->execute();
  }

  public static function viewAllTopics ()
  {
    $db = Db::getConnection();
    $sql = "SELECT * FROM topics";
    $result = $db->query($sql);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function takeLastMessageFromTopic ($topicId, $type)
  {
    $db = Db::getConnection();
    $sql = "SELECT message, date FROM forum WHERE topic = :topicId ORDER BY id DESC";
    $result = $db->prepare($sql);
    $result->bindParam(":topicId", $topicId, PDO::PARAM_STR);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $date = $row['date'];
    $message = $row['message'];
    if ($type == 2) {
      return $date;
    } else {
      return $message;
    }
  }

  public static function createNewTopic ($data)
  {
    $db = Db::getConnection();
    $sql = "INSERT INTO topics (topic_name, author_id) VALUES (:topic_name, :author_id)";
    $result = $db->prepare($sql);
    $result->bindParam(":topic_name", $data['topicname']);
    $result->bindParam(":author_id", $data['user']);
    $result->execute();
    return $db->lastInsertId();
  }

  public static function checkTopicName ($topicId)
  {
    $db = Db::getConnection();
    $sql = "SELECT topic_name FROM topics WHERE id = $topicId";
    $result = $db->query($sql);
    $topicName = $result->fetch( PDO::FETCH_ASSOC );
    return $topicName['topic_name'];

  }

}

 ?>
