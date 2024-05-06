<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/design.css">
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- fontawesome  -->
    <link rel="stylesheet" href="/fonts/fontawesome-free-5.9.0-web/css/all.css">
    <script src="/fonts/fontawesome-free-5.9.0-web/js/all.js"></script>
    <style>
      .scroll{
        height:650px;
        overflow-y:scroll;
        overflow-x: hidden;
      }



      #page{
        top: 8%;
        left: 0%;
        position: absolute;
      }

      pre{
        text-align:justify;
        font-family: poppins;
      }
    </style>

    <script type="text/Javascript">
     
    function gotothread(thr)
    {
      document.getElementById('threadId').value = thr;
      document.getElementById('toThread').submit();
    }
    </script>

</head>
<body class="bg-dark">
<?php include "./navbar.php";

//session_start();
$conn = mysqli_connect("192.168.10.254","Group10","H52052","group10_db");
$threads = mysqli_query($conn, "SELECT * FROM threads");
// $allThreads = mysqli_fetch_assoc($threads);
?>
<!--Main Area-->
<div class="container mt-5 col-lg-12" id="page" style="height: 84%;">
  <div class="row" style="margin-top: -2%; height: 100%">
   <div class="col-lg-8 ml-5 p-4 bg-info fixed-position shadow scroll " style="height:100%"> 
    <?php
       $id = 0;
       while($row = mysqli_fetch_assoc($threads)) {   
         $id++;
         $username = mysqli_fetch_row(mysqli_query($conn,"SELECT username FROM users WHERE userid = (SELECT admin_id from threads WHERE threadid =" .$row["threadid"].")"))[0];   
        ?>

        <script>

          jQuery.get("/Attachments/Profiles/profile_<?php  echo $row["admin_id"]; ?>.jpeg")
            .done(function () {
              document.getElementById("profileImg<?php echo $id; ?>").src = "./Attachments/Profiles/profile_<?php echo $row["admin_id"]; ?>.jpeg";
            })
            .fail(function () {
              document.getElementById("profileImg<?php echo $id; ?>").src = "./Attachments/Profiles/default.jpeg";
            })
        </script>

        <div class="rounded mb-4 mt-4 ml-1 mr-1 col-lg-12">
          <div class="card">
          <div class="card-header bg-dark text-white shadow"><img src="" class="rounded-circle  border border-dark" alt="P" width="40" height="40" id="profileImg<?php echo $id; ?>"/><span class="ml-2"><?php printf($username);?></span></div>
          <div class="card-body">
          <h1 class="font-weight-bold" id="linker" onClick="gotothread('<?php echo $row["threadid"]; ?>')"><?php echo $row["topic"]; ?></h1>
        <pre><?php echo $row["description"]; ?></pre>
        <h6 class="text-primary"><?php echo $row["hashtags"]; ?></h6>
          </div> 
        </div>
      </div>
      
    <?php } ?>
       
     
    </div>
    <!-- div 2-->
    <div class="col-lg-3 ml-4 p-1 shadow bg-white fixed-position float-right" style="height: 100%;"> 
      <div class="row">
        <div class="1 col-lg-12">
      <h3 class="text-center mt-2 mb-3">About</h3>
    
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Under Construction...</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
          </div>
        </div>
        </div><!-- 1 -->
        <!-- <div class="2 col-lg-10 mt-5 mb-5">
        <div class="card">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Under Heavy Construction...</p> -->
          <!-- <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a> -->
          <!-- </div> -->
        <!-- </div> -->
          <!-- </div>2 -->
      
      </div>
          
      </div>
      <!-- div 2-->
  </div>
          <br>
</div>

<form id="toThread" action="thread.php" method="POST">
  <input type="hidden" name="threadId" id="threadId">
</form>

</body>
</html>