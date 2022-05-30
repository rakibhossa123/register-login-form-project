
<?php 
    include 'config.php';

    error_reporting(0);

    session_start();

    if(isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: welcome.php");
        }else {
            echo "<script>('Woops! Email or password is wrong.')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="container">
        <form  class="login-eamil" action="" method="POST">
            <p class="login-text text-center fs-1 pb-4">Login form </p>
            <div class="input-group">
                <label for="">Email or Phone</label>
                <input type="email" name="email" value="<?php echo $email;?>" placeholder="Email" id="email" required>
            </div>
            <div class="input-group">
                <label for="">Password</label>
                <input type="password" name="password" value="<?php echo $_POST['password'];?>" placeholder="Password" id="password" required>
            </div>
            
            <div class="input-group">
                <button name="submit" class="btn btn-primary mt-4 fs-4">Login</button>
            </div>
            <p class="login-register-text mt-4 ">Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>



    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>