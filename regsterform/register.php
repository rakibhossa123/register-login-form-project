
<?php

include 'config.php';

error_reporting(0);

if(isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password= md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if(!result->num_rows > 0){
            $sql="INSERT INTO users (username,email,password)
                VALUES('$username', '$email', '$password')";
            $result=mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('Wow! Your regstation successfully.')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else{
                echo "<script>alert('Woops! Something wrong went.')</script>";
            }
        } else{
            echo "<script>alert('Woops! Email already Exists.')</script>";
        }
    } else{
        echo "<script>alert('Password Not Matched.')</script>";
    }
    
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regsterform</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="container py-5">
        <form action="" method="POST">
            <p class="login-text text-center fs-1 mb-5">রেজিষ্টেসন করুন</p>
            <div class="input-group">
                <label for="">User Name </label>
                <input type="text" name="username" value="<?php echo $username;?>" placeholder="Username" id="name" required>
            </div>
            <div class="input-group">
                <label for="">Email </label>
                <input type="email" name="email" value="<?php echo $email;?>" placeholder="Email" id="email" required>
            </div>
            <div class="input-group">
                <label for="">Password </label>
                <input type="password" name="password" value="<?php echo $_POST['password'];?>" placeholder="Password" id="password" required>
            </div>
            <div class="input-group">
                <label for="">Confirm Password</label>
                <input type="password" name="password" value="<?php echo $_POST['cpassword'];?>" placeholder="Confirm Password" id="cpassword" required>
            </div>
            
            <div class="input-group pt-4">
                <button name="submit" class="btn btn-primary mt-3 fs-4">Register</button>
            </div>
            <p class="login-register-text mt-4">Don't have an account? <a href="index.php">Login Here</a></p>
        </form>
    </div>



    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>