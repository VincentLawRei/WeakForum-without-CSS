<?php require VIEWS . "layouts/header.php";?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <form action="" method="post" enctype="multipart/form-data">

                <input type="text" name="login" id="" class="form-control shadow-sm mt-1" placeholder="Type login" value="<?php echo trim($login) ?>">
                <input type="text" name="email" id="" class="form-control shadow-sm mt-1" placeholder="Type email" value="<?php echo $email ?>">
                <input type="password" name="password" id="" class="form-control shadow-sm mt-1" placeholder="Type password" value="<?php echo $password; ?>">
                <input type="password" name="password2" id="" class="form-control shadow-sm mt-1" placeholder="Type password one more time" value="<?php echo $password2 ?>">
                <input type="file" name="imageav" class="form-control-file mt-1">
                <button class="btn btn-outline-info mt-1 shadow-sm form-control" type="submit" name="do_signup">Sign Up</button>
            </form>
            <?php if (isset($errors)): ?>
                <ul class="list-unstyled text-danger mt-2">
                    <?php foreach ($errors as $error) {
                        echo '<li> — ' . $error . '! </li>';
                    } ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php require VIEWS . "layouts/footer.php";?>


