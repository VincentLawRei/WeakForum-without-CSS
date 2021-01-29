<?php require VIEWS . "layouts/header.php";?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <form action="" method="post">

                <input type="text" name="login" id="" class="form-control shadow-sm mt-1" placeholder="Type login" value="<?php echo trim($login) ?>">
                <input type="password" name="password" id="" class="form-control shadow-sm mt-1" placeholder="Type password" value="<?php echo $password; ?>">
                <a href="reset" class="btn btn-link" style="font-size: 0.8em;">Забыли пароль?</a>
                <button class="btn btn-outline-primary mt-1 shadow-sm form-control" type="submit" name="do_login">Log In</button>
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


