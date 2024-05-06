<?php
  session_start();
  if(isset($_SESSION['userid']))
    header("url: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reset Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
  
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/design.css">
  <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Check password and confirm password are same -->
  <script>
    function validate(){
    var pass = document.getElementById("pwd").value;
    var cpass = document.getElementById("cpwd").value;
    if(pass != cpass){
      document.getElementById("cpwd_msg").innerHTML = "  * Password does not match";
      return false;
    }
  }
</script>

</head>

<style>
  
  #page{
    left: 50%;
    right: 50%;
    top: 50%;
    position: absolute;
    transform : translate(-50%,-50%);
  }
 </style>
<body class="bg-dark">
  <div class="container col-sm-4 p-4 border bg-light rounded shadow" id="page">
      
  <form action="password_reset.php" method="POST">
        
      <div class="bg-info text-white mb-4 text-center border border-info">
          <h1>Reset Password</h1>
        </div>

      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" placeholder="Enter Password" id="pwd" name="password" minlength="8" required>
    </div>
      
    <div class="form-group">
        <label for="pwd">Confirm Password:</label>
        <label id="cpwd_msg" style="color:red;"></label>
        <input type="password" class="form-control" placeholder="Confirm Password" id="cpwd" name="cpassword" required>
    </div> 
      
      <div class="form-group text-center mt-2">
        <button type="submit" class="btn btn-info" onclick="return validate()">Submit</button>
      </div>
      
    </form>    
    <div class="col-sm-12 text-center text-danger" id ="resetSuccess">
    <?php
      $conn = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        if ($conn and isset($_POST['password']) and isset($_POST['cpassword']))
        {
            session_start();

            $userid = $_SESSION['userid'];
            $password = md5($_POST['password']);
            $cpassword = md5($_POST['cpassword']);

            if (($password == $cpassword) and (mysqli_query($conn, "UPDATE users SET password='$password' WHERE userid='$userid'"))) {
    
                echo "<div class='col-sm-12 text-center text-success' id = 'resetSuccess'>Your Password Has Been Changed. Please Relogin into your Account! </div>";
                header('refresh:4; url=login.php');

            }else {
                echo "Password does not match.";
            }

            mysqli_close($conn);
        }
        else
          echo "Some error occured, please try refreshing the page";
      }
    ?>          
    </div>
  </div>
 </body>
</html>

