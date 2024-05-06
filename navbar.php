<?php 
session_start();
$userId = $_SESSION['userid'];
?>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/Javascript">
      /*function logOutUser() 
      {
        $.ajax({
          type: "POST",
          url: "logout.php",
          data: {action: "calling"},
          success: function() {
            location.reload();
          }
        });
      }*/
      function logOutUser() 
      {
        $.ajax({
          type: "POST",
          url: "logout.php",
          data: {action: "calling"},
          success: function(html) {
            if (html == "yes") {
              alert("You have Logged Out");
              location.reload();
            }
            else  alert("No User logged in " + html);
          }
        });
    }

    //jQuery Script to check whether profile exists or not
    if ("<?php echo $userId; ?>") {
      jQuery(document).ready(function () {
          jQuery.get("/Attachments/Profiles/profile_<?php echo $userId; ?>.jpeg")
          .done(function () {
            document.getElementById("profileNavImg").src = "./Attachments/Profiles/profile_<?php echo $userId; ?>.jpeg";
          })
          .fail(function () {
            document.getElementById("profileNavImg").src = "./Attachments/Profiles/default.jpeg";
          })
        })
    }
</script>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-light bg-light text-dark fixed-top py-2 mb-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PowWow</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item mr-sm-2">
          <a class="nav-link" href="mythreads.php">MyThreads</a>
        </li>
        <!--<li class="nav-item mr-sm-2">
          <a class="nav-link" href="javascript:void(0)">Explore</a>
        </li>-->
        <li class="nav-item mr-sm-2">
          <a class="nav-link" href="javascript:void(0)">About</a>
        </li>
      </ul>
      <form class="d-flex mt-1">
      <input class="form-control mr-sm-2 " type="text" placeholder="Search">
        <button class="btn btn-info" type="button">Search</button>
      </form>
    </div>
    <div>
      <a href="login.php">
      <?php
        if(isset($_SESSION['userid']))
        {
          $userid = $_SESSION['userid'];
          $conn = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");
          if($conn)
          {
            $query = mysqli_query($conn,"SELECT username FROM users WHERE userid = $userid");
            if(mysqli_num_rows($query) > 0)
            {
              //echo "<label style='margin-right:50px;'>".mysqli_fetch_row($query)[0]."</label>";
             ?>
    <!-- profile dropdown -->
        <div class="collapse navbar-collapse mx-0" id="navbar-list-4">
          <ul class="navbar-nav mx-0">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardropdownmenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="" class="rounded-circle border border-dark" alt="Profile 2" width="35" height="35" id="profileNavImg">
                  <!--<input id="profile" type="file" accept="image/*" name="profile" onChange="this.form.submit()" hidden/>-->
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbardropdownmenuLink">
                      <a class="dropdown-item" href="my_profile.php">My Profile</a>
                      <a class='dropdown-item' type='button'onclick="logOutUser()">Logout</a>
                  </div>
              </li>
              <li class="float-right my-3 font-weight-bold"><?php echo mysqli_fetch_row($query)[0] ?></li>
          </ul>
      </div>
      <!-- profile dropdown -->
             <?php 
            }
            else  echo "<button class='btn btn-info' type='button'>Sign In</button>";
          }
          else  echo "<button class='btn btn-info' type='button'>Sign In</button>";
        }
        else  echo "<button class='btn btn-info' type='button'>Sign In</button>";
      ?>
      </a>
      
     <!--  <button class='btn' type='button'onclick="logOutUser()">Logout</button>-->
    </div>
  </div>
</nav>
<!-- Navbar -->