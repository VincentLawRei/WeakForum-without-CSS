<?php require VIEWS . "layouts/header.php";?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header text-center">
                    <?php echo $dataFromId['login'];?>
                </div>
                <div class="card-body">
                  <img src="<?php echo User::getUserAvatar($dataFromId['id']); ?>" alt="" class="mx-auto d-block mb-3" width=240>
                  <table class="table">
                    <tr>
                      <td>Your login: </td>
                      <td><?php echo $dataFromId['login']; ?></td>
                    </tr>
                    <tr>
                      <td>Your email: </td>
                      <td><?php echo $dataFromId['email']; ?></td>
                    </tr>
                    <tr>
                      <td>Date of registration: </td>
                      <td> <?php echo date('d.m.y', $dataFromId['date']); ?></td>
                    </tr>
                    <tr>
                      <td>Role: </td>
                      <td> <?php echo ucfirst($dataFromId['role']); ?></td>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require VIEWS . "layouts/footer.php";?>


