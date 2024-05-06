<?php
$conn = mysqli_connect("192.168.10.254", "Group10", "H52052", "Group10_db");
session_start();
if (isset($_SESSION['userid']))
    $user_id = $_SESSION['userid'];
else
    $user_id = -1;
$threadId = $_POST['threadId'];
$threadDetails = mysqli_fetch_row(mysqli_query($conn, "SELECT * FROM threads WHERE threadid = $threadId"));
$threadUserId = mysqli_fetch_row(mysqli_query($conn, "SELECT admin_id FROM threads WHERE threadid = $threadId"))[0];
?>
<html>

<head>
    <title><?php echo $threadDetails[1]; ?> - PowWow</title>
    <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

    <script type="text/Javascript">
        function checkUser()
            {
                $.ajax(
                    {
                        type: "POST",
                        url: "logout.php",
                        data: { action: "checking"},
                        success: function(data) {
                            if(data.trim()=="yes") {
                                document.getElementById("commentui").hidden = false;
                                Array.from(document.getElementsByClassName("btnReply")).forEach((item) => {
                                    item.hidden = false;
                                })
                            }
                            else
                            {
                                document.getElementById("commentui").hidden = true;
                                Array.from(document.getElementsByClassName('btnReply')).forEach((item) => {
                                    item.hidden = true;
                                })
                            }
                        }
                    }
                );
            }
            replying = false;
            function addComment() 
            { 
                $.ajax({
                    type: "POST",
                    url: "threader.php",
                    data: {
                        action: "addComment", 
                        thr_id: <?php echo $threadId ?>,
                        userid: <?php echo $user_id ?>,
                        reply: replying,
                        commentText : document.getElementById('newComment').value
                    },
                    success: function(html) {
                        if(html.trim() == "1")
                        {
                            location.reload();
                        }
                        else
                            alert(html)
                    }
                });
            }
            function deleteComment(cid) 
            {
                $.ajax(
                    {
                        type: "POST",
                        url: "threader.php",
                        data: {
                            action: "deleteComment",
                            thr_id: <?php echo $threadId ?>,
                            comment_id: cid
                        },
                        success: function(html) {
                            if(html.trim() == "yes")
                            {
                                alert("Your Comment has been Deleted.");
                                location.reload();
                            }
                            else
                            {
                                alert('Error. Please Try Again');
                            }
                        }
                    }
                );
            }
            function replyText(username,replyid = null) {
                document.getElementById('newComment').value = "@" + document.getElementById(username).textContent + " " + document.getElementById('newComment').value;
                if(replyid == null) replying = username;
                else replying = replyid;
                document.getElementById("cancelReplyBtn").disabled = false;
            }
            function cancelReply() {
                replying = false;
                document.getElementById("cancelReplyBtn").disabled = true;
                document.getElementById("newComment").value = "";   
            }

            //fetch profile
            if ("<?php echo $threadDetails[2] ?>") {
                jQuery(document).ready(function () {
                    jQuery.get("/Attachments/Profiles/profile_<?php echo "$threadUserId"; ?>.jpeg")
                    .done(function () {
                        document.getElementById("profileImg").src = "./Attachments/Profiles/profile_<?php echo $threadUserId; ?>.jpeg";
                    })
                    .fail(function () {
                        document.getElementById("profileImg").src = "./Attachments/Profiles/default.jpeg";
                    })
                })
            }
        </script>

    <style>
        pre {
            text-align: justify;
            font-family: poppins;
        }

        @font-face {
            font-family: "poppins";
            src: url("/fonts/pxiByp8kv8JHgFVrLDz8Z1xlEw.woff");
        }

        .scroll {
            height: 250px;
            overflow-y: scroll;

        }

        div {
            font-family: poppins;
        }
    </style>
</head>

<body class="bg" onload="checkUser()">
    <?php include "./navbar.php";
    //fetch username
    $username = mysqli_fetch_row(mysqli_query($conn, "SELECT username FROM users WHERE userid = (SELECT admin_id from threads WHERE threadid =" . $threadId . ")"))[0];
    ?>
    <!--div for thread-->
    <div class="col-lg-12 ml-0 mr-5 my-5 p-2 bg-info fixed-position shadow ">
        <div class="rounded mb-0 mt-4 ml-1 mr-1 col-lg-12 fixed-position">
            <div class="card">
                <div class="card-header bg-dark text-white shadow"><img src="" class="rounded-circle  border border-dark" alt="P" width="40" height="40" id="profileImg<?php echo $id; ?>" /><span class="ml-2"><?php printf($username); ?></span></div>
                <div class="card-body">
                    <h1 class="font-weight-bold"><?php echo "$threadDetails[1]" ?></h1>
                    
                        <pre><?php echo "$threadDetails[3]"; ?></pre>
                   
                    <h6 class="text-primary"><?php echo "$threadDetails[4]"; ?></h6>
                    <span><?php echo "$threadDetails[5]"; ?></span>
                    <span><?php echo "$threadDetails[6]"; ?></span>

                    <!-- table -->
                    <div id="11 " class="fixed-position p-2">
                        <div class="row">
                            <div class="p-3 bg-white shadow scroll col-lg-7">
                                <table class="table table-lg table-hover" style="margin:auto " width="100%">

                                    <?php
                                    $getMainComments = mysqli_query($conn, "SELECT comment_id,commenter_id,commenter_username,comment,comment_time FROM thread_$threadId WHERE replying_to IS NULL");
                                    while ($mainCommentRow = mysqli_fetch_row($getMainComments)) {
                                        echo "<tr>
                        <td colspan='2'>
                        <div class='d-inline mw-75 float-left'>
                            <span id='$mainCommentRow[0]' style='font-weight: bold' class='text-left'>$mainCommentRow[2]</span> 
                            $mainCommentRow[4]<br>
                            $mainCommentRow[3]
                        </div>
                        <span class='btnReply'><input type='button' class='d-inline btn btn-sm btn-outline-info float-right' value='Reply' onclick=\"replyText('$mainCommentRow[0]')\"></span><br>";
                                        if ($user_id == $mainCommentRow[1] || $user_id == $threadUserId[0])
                                            echo "<br><input type='button' class='d-inline btn btn-sm btn-outline-danger float-right' value='Delete' onclick=\"deleteComment('$mainCommentRow[0]')\">";
                                        echo "</div></td>
                    </tr>";
                                        $getReplyComments = mysqli_query($conn, "SELECT comment_id,commenter_id,commenter_username,comment,comment_time FROM thread_$threadId WHERE replying_to = $mainCommentRow[0]");
                                        while ($replyCommentRow = mysqli_fetch_row($getReplyComments)) {
                                            echo "<tr>
                            <td width='4%'> &nbsp; </td>
                            <td style='border-left: 2px solid gray; height: 15%;'>
                            <div class='d-inline mw-75 float-left'>
                                <span id='$replyCommentRow[0]' style='font-weight: bold'>$replyCommentRow[2]</span>
                                $replyCommentRow[4] <br>
                                $replyCommentRow[3]
                            </div>
                            <span class='btnReply'><input type='button' class='d-inline btn btn-sm btn-outline-info float-right' value='Reply' onclick=\"replyText('$replyCommentRow[0]','$mainCommentRow[0]')\"></span><br>";
                                            if ($user_id == $replyCommentRow[1] || $user_id == $threadUserId[0])
                                                echo "<br><input type='button' class='d-inline btn btn-sm btn-outline-danger float-right' value='Delete' onclick=\"deleteComment('$replyCommentRow[0]')\">";
                                            echo "</td>
                        </tr>";
                                        }
                                    }
                                    ?>
                                </table>


                            </div>
                            <!--thread-->
                            <div class="col-lg-4 shadow ml-4" id="commentui">
                                <!--commet-->
                                <form class="mt-3 mb-2" id="commentui">

                                    <textarea id="newComment" placeholder=" Enter Your Comment:" cols="30" rows='3' class="form-control"></textarea>
                                    <span><input type="button" class="form-control btn btn-outline-info mt-3" value='Comment' onclick="addComment()"></span>
                                    <span> <input type="button" class="form-control btn btn-danger mt-2" id="cancelReplyBtn" value="Cancel Reply" onclick="cancelReply()" disabled></span>
                                </form>
                            </div>

                        </div>
                    </div><!-- 11 -->

                </div>
            </div>
        </div>
    </div>

</body>

</html>


<?php
mysqli_close($conn);
?>