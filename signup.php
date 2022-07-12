<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css?v=<?php echo time(); ?>">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <title>TatuApp</title>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h1>Sign Up</h1>
        </div>
        <form method="post" action="queries/client_register_query.php">
            <div class="input-group">
                <label for="first_name">First Name</label>
                <input required class="line" name="fname" type="text">
            </div>
            <div class="input-group">
                <label for="last_name">Last Name</label>
                <input required class="line" name="lname" type="text">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input required class="line" name="mail" type="email" style="margin-left: 63px;">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input required class="line" name="pass" type="password" style="margin-left: 25px;">
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirm<br>Password</label>
                <input required class="line" name="cpass" type="password" style="margin-left: 24px;">
            </div>
            <div class="button">
                <input class="button" type="submit" value="Sign Up">
            </div>
            <p>Already have an account?  <a href="login.php">log in</a></p>
        </form>

    </div>
    
</body>
</html>