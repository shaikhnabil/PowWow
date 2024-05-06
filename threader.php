<?php
    $conn = mysqli_connect("192.168.10.254","Group10","H52052","Group10_db");
    
    function CreateThread()
    {
        global $conn;
        $adminId = $_POST['adminId'];
        $topic = $_POST['topic'];
        $description = $_POST['description'];
        $hashtags = $_POST['hashtags'];
            
        $query = mysqli_query($conn,"INSERT INTO threads(topic,admin_id,description,hashtags,create_time,last_update) VALUES ('$topic','$adminId','$description','$hashtags',now(),now())");

        if ($query)
        {
            $threadId = mysqli_fetch_row(mysqli_query($conn,"SELECT threadid FROM threads WHERE topic='$topic' and description='$description' and hashtags='$hashtags' and admin_id='$adminId' "))[0];
            $threadQuery = 
            "CREATE TABLE `group10_db`.`thread_$threadId`
            (
                `comment_id` INT NOT NULL AUTO_INCREMENT,
                `commenter_id` INT NOT NULL,
                `commenter_username` VARCHAR(50) NOT NULL,
                `comment` NVARCHAR(4000) NOT NULL,
                `comment_time` DATETIME NOT NULL,
                `replying_to` INT NULL,
                `likes` JSON NULL,
                `dislikes` JSON NULL,
                `attachments` JSON NULL,
                PRIMARY KEY (`comment_id`),
                INDEX `commenter_user_id_t".$threadId."_idx` (`commenter_id` ASC) VISIBLE,
                CONSTRAINT `commenter_user_id_t$threadId`
                  FOREIGN KEY (`commenter_id`)
                  REFERENCES `group10_db`.`users`(`userid`)
                  ON DELETE CASCADE
                  ON UPDATE CASCADE,
                INDEX `commenter_username_t".$threadId."_idx` (`commenter_username` ASC) VISIBLE,
                  CONSTRAINT `commenter_username_t$threadId`
                  FOREIGN KEY (`commenter_username`)
                  REFERENCES `group10_db`.`users` (`username`)
                  ON DELETE CASCADE
                  ON UPDATE CASCADE
            );";
            if(mysqli_query($conn,$threadQuery))
            {
                $threadQuery = "ALTER TABLE `group10_db`.`thread_$threadId` 
                ADD CONSTRAINT `comment_reply_id_t$threadId`
                  FOREIGN KEY (`replying_to`)
                  REFERENCES `group10_db`.`thread_$threadId` (`comment_id`)
                  ON DELETE CASCADE
                  ON UPDATE CASCADE,
                  ADD INDEX `comment_reply_id_t".$threadId."_idx` (replying_to ASC) VISIBLE ;";
                if(mysqli_query($conn,$threadQuery))
                    echo "Thread Created";
                else    echo mysqli_error($conn);
            }
            else    echo mysqli_error($conn);
        }
        else
            echo "Some error occured. Please Try Again ". mysqli_error($conn);
    }

    function DeleteThread($id)
    {
        global $conn;
        $id = bindec($id);
        mysqli_query($conn,"DELETE FROM threads WHERE threadid = $id");
        mysqli_query($conn,"DROP TABLE thread_$id");
        echo "Thread Deleted";
    }

    function AddComment()
    {
        $threadID = $_POST['thr_id'];
        $userID = $_POST['userid'];
        $commentText = $_POST['commentText'];
        $replying = $_POST['reply'];
        if($replying == "false") $replying = 'null';

        global $conn;

        $commenetQuery = "INSERT INTO thread_$threadID(commenter_id,commenter_username,comment,comment_time,replying_to) 
            VALUES($userID,(SELECT username FROM users WHERE userid = $userID),'$commentText',now(),$replying)";
        if(mysqli_query($conn,$commenetQuery))
        {
            echo "1";
        }
        else    echo "0";
    }

    function DeleteComment()
    {
        global $conn;
        $threadId = $_POST['thr_id'];
        $commentId = $_POST['comment_id'];

        if(mysqli_query($conn,"DELETE FROM thread_$threadId WHERE comment_id='$commentId'"))
        {
            echo "yes";
        }
        else    echo "no";
    }

    if($_POST['action'] == 'deleteThread') DeleteThread($_POST['id']);
    if($_POST['action'] == 'createThread') CreateThread();
    if($_POST['action'] == 'addComment') AddComment();
    if($_POST['action'] == 'deleteComment') DeleteComment();
    mysqli_close($conn);
?>

