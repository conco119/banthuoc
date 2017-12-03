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
                                    <input class="form-control" placeholder="Tài khoản" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Ghi nhớ
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Đăng nhập</a>
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
