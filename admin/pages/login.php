<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../common/head.php'); ?>
    <link rel="stylesheet" href="../dist/css/login.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng nhập hệ thống</h3>
                    </div>
                    <div class="panel-body">
                        <form method='post' action='../api/login.php'>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tài khoản" name="username"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                                </div>
                                <?php if(isset($_GET['wrong'])): ?>
                                <div class="alert alert-danger">
                                  Tài khoản hoặc mật khẩu không chính xác !
                                </div>
                              <?php endif ?>
                                <!-- Change this to a button or input when using this as a form -->
                                <button name='submit' type='submit' class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <?php require('../common/script.php'); ?>

</body>

</html>
