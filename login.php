<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Product Detail - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="custom/css/typica-login.css">
        <link href="toastr/toastr.min.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le favicon -->
        <!--<link rel="shortcut icon" href="favicon.ico">-->

    </head>
    <body>
        <div class="navbar navbar-fixed-top">
        </div>
        <div class="container">
            <div id="login-wraper">
                <form class="form login-form">
                    <legend><span class="blue">Sign In</span></legend>
                    <div class="body">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" value="<?= isset($_COOKIE['username']) ? $_COOKIE['username'] : ""; ?>">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : ""; ?>">
                    </div>
                    <div class="footer">
                        <!--<label class="checkbox inline">
                            <input type="checkbox" id="inlineCheckbox1" value="option1"> Remember me
                        </label>-->
                        <button type="submit" class="btn btn-success" id="loginFormButton" style="display: block; width: 90%;"
                                data-loading-text="Logging In...">Login
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="custom/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="custom/js/backstretch.min.js"></script>
        <script src="toastr/toastr.min.js"></script>
        <script src="custom/js/login.js"></script>

    </body>
</html>
