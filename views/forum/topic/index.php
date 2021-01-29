<?php require VIEWS . "layouts/header.php";?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Главная</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="/forum">Форум</a></li>
    <li class="breadcrumb-item" aria-current="page"><?php echo $topicName; ?></li>
  </ol>
</nav>

<div class="container mt-2 mb-5 rounded" style="background: #EBEBF9FF; min-height: 500px;">
  <h4 class="text-center p-3">Название темы: <?php echo $topicName; ?></h4>

  <table class="table table-responsive fixed-table-body table-hover table-sm">
    <tr>
      <th>Сообщение</th>
      <th>Пользователь</th>
      <th>Дата</th>
    </tr>
    <?php foreach($messagesFromTopic as $message): ?>
    <tr>
      <td><?php echo $message['message'] ?></td>
      <td><?php echo User::nameUserById($message['user']); ?></td>
      <td style="white-space: nowrap;"><?php echo date("d.m.y H:i", $message['date']); ?></td>
    </tr>
    <?php endforeach; ?>
  </table>


  <a href="/forum/topic/<?php echo $topicId; ?>/newmessage" class="btn btn-info mb-3">Написать новое сообщение</a>
</div>

<?php require VIEWS . "layouts/footer.php";?>
