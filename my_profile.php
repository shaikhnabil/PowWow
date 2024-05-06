<?php
  session_start();
  if(isset($_SESSION['userid']))
    header("url: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
  
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/design.css">
  <script src="/bootstrap/js/bootstrap.min.js"></script>

  <!-- fontawesome  -->
  <link rel="stylesheet" href="/fonts/fontawesome-free-5.9.0-web/css/all.css">
  <script src="/fonts/fontawesome-free-5.9.0-web/js/all.js"></script>
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
  <div class="container">

  <?php include "./navbar.php" ?>

  </div>
  <div class="container col-sm-4 p-4 border bg-light rounded shadow" id="page">
    <!-- Php Script to fetch username and email-->
     <?php
      session_start();
      $conn = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");
      
      if ($conn) {
        if (isset($_SESSION["userid"])) {
            $userId = $_SESSION["userid"];
  
            $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE userid='$userId'"));

            $username = $user["username"];
            $email = $user["email"];
        }

        mysqli_close($conn);

      }else echo "Some error occured. Please refresh page.";
      ?>
      

      <!-- jQuery Script to check whether profile exists or not.-->
      <script>
        jQuery(document).ready(function () {
          jQuery.get("/Attachments/Profiles/profile_<?php echo $userId; ?>.jpeg")
          .done(function () {
            document.getElementById("profileImg").src = "./Attachments/Profiles/profile_<?php echo $userId; ?>.jpeg";
          })
          .fail(function () {
            document.getElementById("profileImg").src = "./Attachments/Profiles/default.jpeg";
          })
        })
      </script>


  <form action="my_profile.php" method="POST" enctype="multipart/form-data" id="profileForm">

        <div class="bg-info text-white mb-4 text-center border border-info">
            <h1>My Profile</h1>
        </div>
        
        <div class="form-group">
            <img src="" class="rounded-circle mx-auto d-block border border-dark" alt="Profile 2" width="120" height="120" id="profileImg">
            <input id="profile" type="file" accept="image/*" name="profile" onChange="this.form.submit()" hidden/>
            <label class="float-right my-0" style="margin-right:190px;margin-top:0;cursor:pointer;color:#54B4D3;" for="profile" id="profileUpload"><i class="fas fa-edit fa-lg my-0" ></i></label> 
        </div>


        <div class="form-group mt-5">
                <label for="email">User Name:</label>
                <input type="text" class="form-control" placeholder="User Name" id="username" name="username" value="<?php echo $username ?>" disabled>
            </div>
            
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter Email" id="email"  value="<?php echo $email ?>" name="email" disabled>
            </div>  

            <div class="form-group text-center">
                <a href="/password_reset.php" >Change Password ?</a>
            </div>
    </form>   
  </div>

  <?php
    session_start();
      $conn = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");

      $path = "./Attachments/Profiles/";
      if ($conn) {
        if (!empty($_FILES)){

          $uploadFileName = $_FILES["profile"]["tmp_name"];
          $extension = explode("/", $_FILES["profile"]["type"])[1];
          $filename  = "profile_".$_SESSION["userid"].".jpeg";
          $acceptedExt = array("jpeg", "png", "jpg");
          $filesize = $_FILES["profile"]["size"];
          $uploadPath = $path.$filename;

          if (in_array($extension, $acceptedExt)===false){
            echo '<script>alert("File type not supported.")</script>';
          } elseif ($filesize > 1000000 ) {
            echo '<script>alert("File size should below 1 MB.")</script>';
          } elseif (!move_uploaded_file($uploadFileName, $uploadPath)) {
            echo '<script>alert("Error while uploading file.")</script>';
          } else {
            move_uploaded_file($uploadFileName, $uploadPath);
          }
        }
      }
    ?>

 </body>
</html>