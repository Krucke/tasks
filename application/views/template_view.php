<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Задачник</title>
    <script src="https://kit.fontawesome.com/6531eaa3fa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/media.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Задачник</a>
        <?php if(!isset($_SESSION['user'])) { ?>
        <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal" type="submit">Авторизироваться</button>
        <?php } else{ ?>
        <a class="text-danger" href="/main/logout"><?php echo $_SESSION['user']. " (Выход)"; }?></a>
    </nav>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../../main/login" method="post" id="form">
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input type="text" class="form-control" id="login" aria-describedby="emailHelp" name="log" value="admin" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control form-control" id="password" name="pass" value="123" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Выход</button>
                            <button type="submit" class="btn btn-primary" name="sign" id="sign">Войти</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</header>
<div class="container">
    <?php include 'application/views/'.$content_view;?>
    <ul class="pagination d-flex justify-content-center">
        <?php
        if($_SESSION['pages'] > 1){
        for($i = 1;$i<=$_SESSION['pages'];$i++){
            if($i==1){?>
                <li class="pagination__item"><a class="pagination__link m-2 p-2 rounded text-white bg-primary" href="/main"><?=$i?></a></li>
            <?php }
            else{ ?>
                <li class="pagination__item"><a class="pagination__link m-2 p-2 rounded text-white bg-primary" href="/main/pagination/<?=$i?>"><?=$i?></a></li>
            <?php }
        }}
        ?>
    </ul>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="js/signin.js"></script>
</body>
</html>