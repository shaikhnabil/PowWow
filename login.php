<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index-PowWow</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
  
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/design.css">
  <script src="/bootstrap/js/bootstrap.min.js"></script>

</head>

<style>
hr{
  height:20px;
}
 
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
      
  <form action="login.php" method="post">
        
  <div class="bg-info text-white mb-4 text-center border border-info">
      <h2 class="font-weight-bold mt-2"> Login </h2>
        </div>
      
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" required>
    </div>
      
      <h6 class="text-center mb-3  ">New User ? <a href="./signup.php">Sign - Up</a><br><a href="./user_forget.php"> Forget Password ?</a></h6>

      <div class="form-group text-center mt-2">
        <button type="submit" class="btn btn-info">Submit</button>
      </div>
      
    </form>    
      <?php

        $con = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");
        if ($con and isset($_POST['email']) and isset($_POST['password'])) 
        {
          $email = $_POST["email"];
          $password = md5($_POST["password"]);
          
          $query = "SELECT userid FROM users WHERE email= '$email' AND password='$password' ";
          if (mysqli_num_rows(mysqli_query($con, $query)) > 0)
          {
            echo "<div class='col-sm-12 text-center text-success' id = 'fid'>Login Successfull </div>";
            session_start();
            $_SESSION['userid'] = mysqli_fetch_row(mysqli_query($con,$query))[0]; 
            header("refresh:1; url=index.php");
          }
          else 
          {
            echo "<div class='col-sm-12 text-center text-danger' id = 'fid'>Incorrect Credential </div>";
          }
          mysqli_close($con);
        }
      ?>
  </div>
 </body>
</html>