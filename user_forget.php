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
            <label for="email"><strong>Username:</strong></label>
            <input type="text" class="form-control" placeholder="User Name" id="username" name="username" required>
            <br>
            </div>
        
            <div class="form-group mt-2 mt-4">
                <label><strong>Security Question 1 : </strong></label> <br>
                <select name="question1" class="form-control">
                <option value="What is your date of birth ?" selected>What is your date of birth ?</option>
                    <option value="What was your school favorite teacher's name ?">What was your school favorite teacher's name ?</option>
                    <option value="what's your favorite movie ?">what's your favorite movie ?</option>
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

            $conn = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");
            
            if($conn)
            {
                if (isset($_POST["username"]) and isset($_POST["question1"]) and isset($_POST["question2"]) and isset($_POST["question3"]) and isset($_POST["answer1"]) and isset($_POST['answer2']) and isset($_POST['answer3'])) {

                    $username = $_POST["username"];
                    $question1 = $_POST["question1"];
                    $question2 = $_POST["question2"];
                    $question3 = $_POST["question3"];

                    $answer1 = $_POST['answer1'];
                    $answer2 = $_POST['answer2'];
                    $answer3 = $_POST['answer3'];

                    $query = "SELECT * FROM user_security WHERE user_id=(SELECT userid FROM users WHERE username='$username')";
                    if (mysqli_num_rows(mysqli_query($conn, $query)) > 0) {
        
                        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

                        if ($result['question1'] == $question1 and $result['question2'] == $question2 and $result['question3'] == $question3
                        and $result['answer1'] == $answer1 and $result['answer2'] == $answer2 and $result['answer3'] == $answer3){
                            session_start();
                            $_SESSION['userid'] = mysqli_fetch_row(mysqli_query($conn, "SELECT userid FROM users WHERE username='$username'"))[0];
                            header('Location: password_reset.php');
                        }else{
                            echo "Invalid Q/A Specified!";
                        }

                    }else{
                        echo "Username does not exist!";
                    }

                }
                mysqli_close($conn);
            }
            else   echo "Some error occured. Please refresh page.";
        ?>
    </body>
</html>