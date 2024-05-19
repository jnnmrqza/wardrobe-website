<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <div class="box login-box">
        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used. Try another one!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("Error Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='home.html'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>


            <header>Sign Up</header>
            <form action="" method="post">
                <div class="inBox input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="inBox input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="on">
                </div>

                <div class="inBox input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="input">
                    <input type="submit" class="btn" name="submit" value="Sign Up" required>
                </div>
                
                <div class="login">
                    Already has an account? <a href="index.php">Log in</a>
                </div>
            </form>
        </div>

    </div>
    <?php } ?>
</body>
</html>