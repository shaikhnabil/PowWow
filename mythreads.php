<?php
        $conn = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");
        session_start();
        if(!isset($_SESSION['userid'])) 
        {
            header("Location: login.php");
        }    
        $userId = $_SESSION['userid'];    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    
    
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/design.css">
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- fontawesome  -->
    <link rel="stylesheet" href="/fonts/fontawesome-free-5.9.0-web/css/all.css">
    <script src="/fonts/fontawesome-free-5.9.0-web/js/all.js"></script>
    <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
    <style>
      #page{
        top: 10%;
        left: 2%;
        position: absolute;
      }
    </style>

    <script type="text/Javascript">
      function logOutUser() 
      {
        $.ajax({
          type: "POST",
          url: "logout.php",
          data: {action: "calling"},
          success: function(html) {
            if (html == "yes") {
              alert("You have Logged Out");
              getElementById("logInControl").Text = "Sign In";
            }
            else  alert("No User logged in");
          }
        });
    }
    function gotothread(thr)
    {
      document.getElementById('threadId').value = thr;
      document.getElementById('toThread').submit();
    }
    </script>

</head>
<body class="bg-dark">
<!-- Navbar -->

<!-- Navbar -->
<?php include "./navbar.php" ?>
<!--Main Area-->
<div class="container mt-5 col-lg-12" id="page">
  <div class="row">
   <div class="col-lg-4 bg-light ml-3 p-3 shadow col-md-6">
   <div class="bg-info text-white mb-4 text-center border border-info">
       <b><h5 class="text-center text-light mt-2">Post Thread </h5></b>
   </div>
      <div id="threadinsert" class="p-4 shadow border mt-2 mb-2">
                <form class="">
                    Topic : <input class="form-control " type="text" name="topic" id="topic"> <br>
                    Description : <textarea class="form-control "rows="4"  name="description" id="description">Describe the Topic</textarea>
                    <br>
                    Hashtags : <input  class="form-control "  type ="text" name="hashtags" id="hashtags"> <br>
                    <input class="form-control btn btn-outline-info"  type="button" value="submit" onclick="CreateThread()">
                </form>
                </div>
    </div>
    <div class="col-lg-7 bg-info ml-4 p-4 shadow col-md-6 ">
      <b><p class="text-center text-light">My Threads </p></b>
      <!--myt -->
    
    <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
    <script type="text/Javascript">
        function DeleteThread(thread_id) 
        { 
            $.ajax({
                type: "POST",
                url: "threader.php",
                data: {
                    action: "deleteThread", 
                    id: thread_id
                },
                success: function(html) {
                    alert(html);
                    location.reload();
                }
            });
        }
        function CreateThread() {
            $.ajax({
                type: "POST",
                url: "threader.php",
                data: {
                    action: "createThread", 
                    adminId: <?php echo $userId;?>, 
                    topic: document.getElementById('topic').value,
                    description: document.getElementById('description').value,
                    hashtags: document.getElementById('hashtags').value
                },
                success: function(html) {
                    alert(html);
                    location.reload();
                }
            });
        }
        function gotothread(thr)
        {
            document.getElementById('threadId').value = thr;
            document.getElementById('toThread').submit();
        }
    </script>
   
        <table style="margin: auto; text-align:center;border:1px solid black;" class="table table-light  table-striped border shadow text-dark table-hover p-5">
        <tr>
            <th scope="col">Topic</th>
            <th scope="col">Description</th>
            <th scope="col">Last Update</th>
            <th scope="col">Delete Thread</th>
        </tr>
        <?php
            $queryResult = mysqli_query($conn,"SELECT threadid,topic, description, last_update FROM threads WHERE admin_id='$userId' ");
            while(($row =  mysqli_fetch_row($queryResult)))
            {
                echo "<tr>  
                    <td><a id='linker' onClick=\"gotothread('$row[0]')\">$row[1]</a></td>
                    <td><pre>$row[2]</pre></td>
                    <td>$row[3]</td>
                    <td><a href='' onclick='DeleteThread(". decbin($row[0]). ")'>Delete</a></td>
                </tr>";
            }
        ?>
        <tr>
            
        
            <td colspan="5" class="mt-2">
            
            </td>
       
        </tr>
        </table>
  <!--myt -->

    </div>
  </div>
</div>

<form id="toThread" action="thread.php" method="POST">
  <input type="hidden" name="threadId" id="threadId">
</form>

</form>
</body>
</html>
    
    
   
