<?php require VIEWS . "layouts/header.php";?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Форум</li>
  </ol>
</nav>

<div class="container mt-2 rounded" style="background: silver; min-height: 500px;">
  <h4 class="text-center p-3 border-bottom">Форум</h4>
  <div class="row">
    <div class="col-lg-4">
      <h5>Тема</h5>
      <?php foreach ($topics as $topic):?>
      <p><a href="/forum/topic/<?php echo $topic['id']?>"><?php echo $topic['topic_name']?></a></p>
      <?php endforeach; ?>
    </div>
    <div class="col-lg-4">
      <h5>Последнее сообщение</h5>
      <?php foreach ($topics as $topic):?>
      <p><?php echo Forum::takeLastMessageFromTopic($topic['id'], 1); ?></p>
      <?php endforeach; ?>
    </div>
    <div class="col-lg-2">
      <h5>Дата</h5>
      <?php foreach ($topics as $topic):?>
      <p><?php echo date("d-m-y H:i", Forum::takeLastMessageFromTopic($topic['id'], 2)); ?></p>
      <?php endforeach; ?>
    </div>
  </div>
  <a href="/forum/createtopic" class="btn btn-primary">Create new topic</a>
</div>


<?php require VIEWS . "layouts/footer.php";?>
