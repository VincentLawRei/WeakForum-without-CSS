<?php require VIEWS . "layouts/header.php";?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <form action="" method="post">
                <input type="email" name="email" id="" class="form-control shadow-sm mt-1" placeholder="Введите ваш почтовый адрес">
                <button class="btn btn-outline-primary mt-1 shadow-sm form-control" type="submit" name="do_reset">Reset</button>
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


