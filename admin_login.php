<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/admin_login.css?v=<?php echo time(); ?>">
        <title>TatuApp</title>
    </head>
    <body>
        <div class="container">
            <div class="heading">
                <br><br><h1>Login</h1><br><br>
            </div>
            <form method="post" action="queries/admin_login_query.php">
            <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?></p>

                <?php } 
            ?>
                <div class="input-group">
                    <label for="email">Email</label> 
                    <input class="line" required name="email" type="email" style="margin-left: 55px;"><br><br>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input class="line" required name="pass" type="password"><br><br>
                </div>
                <div class="button">
                    <input class="button" type="submit" value="Log in">
                </div>
                <p>Go to commuter login?  <a href="login.php">Sign up</a></p>
            </form>
        </div>
    </body>
</html>