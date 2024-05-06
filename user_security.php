<?php
  session_start();
  if(isset($_SESSION['userid']))
    header("url: index.php");

$conn = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");
$userid = $_SESSION["userid"];

if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_security WHERE user_id='$userid'")) > 0) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Information</title>
    
    <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/design.css">
    <script src="/bootstrap/js/bootstrap.min.js"></script>



</head>
<body class="bg-dark">
    <div class="container col-sm-6 p-4 mt-5 border bg-light rounded shadow" id="page">
        <form action="" method="POST">
            <h3 class="text-center"><b>Security Information</b></h3>
            <div class="form-group mt-2 mt-4">
                <label><strong>Security Question 1 : </strong></label> <br>
                <select name="question1" class="form-control">
                <option value="What is your date of birth ?" selected>What is your date of birth ?</option>
                    <option value="What was your school favorite teacher\'s name ?">What was your school favorite teacher's name ?</option>
                    <option value="what\'s your favorite movie ?">what's your favorite movie ?</option>
        </select>
                </select><br>
                <input type="text" class="mt-2 form-control" name="answer1">
    </div>
    <div class="form-group mt-2">
            <label><strong>Security Question 2 :</strong></label> <br>
            <select name="question2" class="form-control">
            <option value="What city were you born in ?" selected>What city were you born in ?</option>
                <option value="What is the title of your favorite song ?">What is the title of your favorite song ?</option>
                <option value="who is your favorite Actor ?">who is your favorite Actor ?</option>
            </select>
            <br>
            <input type="text" class="mt-2 form-control" name="answer2">
    </div>
    <div class="form-group mt-2">
            <label><strong>Security Question 3 : </strong></label><br>
            <select name="question3" class="form-control">
            <option value="What was your dream job as a child ?" selected>What was your dream job as a child ?</option>
                <option value="What was your childhood nickname ?">What was your childhood nickname ?</option>
                <option value="What was the name of your primary school ?">What was the name of your primary school ?</option>
            </select>
            <br>
            <input type="text" class="mt-2 form-control" name="answer3">
    </div>
    <div class="form-group text-center mt-2">
            <input type="submit" class="btn btn-info rounded text-white" name="submit" value="Submit">
    </div>
        </form>
        </div>
        <?php
            session_start();
            $conn = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");
            
            if($conn)
            {
                if( isset($_POST['question1']) and isset($_POST['question2']) and isset($_POST['question3']) and isset($_POST['answer1']) and isset($_POST['answer2']) and isset($_POST['answer3']))
                {
                    $user_id = $_SESSION['userid'];
                    $question1 = $_POST['question1'];
                    $question2 = $_POST['question2'];
                    $question3 = $_POST['question3'];
                    $answer1 = $_POST['answer1'];
                    $answer2 = $_POST['answer2'];
                    $answer3 = $_POST['answer3'];
                    $queryResult = mysqli_query($conn,"INSERT INTO user_security VALUES ('$user_id','$question1','$answer1','$question2','$answer2','$question3','$answer3') ");
                    if($queryResult)
                    {
                        echo "<script>alert('Account Security Setup Complete. Redirecting to home page......')</script>";
                        header("refresh: 5; URL= home.php");
                        echo "Account Security Setup Complete. Redirecting to home page......";
                        header("refresh: 3; URL= index.php");
                    }
                    else
                    {
                        echo "<script>alert('Some error occured. Please refresh and try again.".mysqli_error($conn)."  ')</script>";
                    }
                }
                mysqli_close($conn);
            }
            else    echo "<script>alert('Some error occured. Please refresh page.')</script>";
        ?>

    </body>
</html>