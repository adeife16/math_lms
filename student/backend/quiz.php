<?php
    require_once 'config.php';
    require_once 'function.php';
    $data = array();

    // get quiz questions

    if(isset($_GET['getQuiz']) && $_GET['getQuiz'] != "")
    {
        $topic = $_GET['getQuiz'];

        $stmt = "SELECT * FROM single WHERE topic_id = ?";

        $get_single = mysqli_prepare($con, $stmt);
        mysqli_stmt_bind_param($get_single,'s', $topic);
        mysqli_execute($get_single);
        $result = mysqli_stmt_get_result($get_single);

        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                unset($row['answer']);
                array_push($data, $row);
            }
        }
        $stmt = "SELECT * FROM multiple WHERE topic_id = ?";
        $get_multiple = mysqli_prepare($con, $stmt);
        mysqli_stmt_bind_param($get_multiple,'s', $topic);
        mysqli_execute($get_multiple);
        $result = mysqli_stmt_get_result($get_multiple);
        if($result)
        {
            while($row2 = mysqli_fetch_assoc($result))
            {
                unset($row['answer']);
                array_push($data, $row2);
            }
        }
        $stmt = "SELECT * FROM tf WHERE topic_id = ?";
        $get_tf = mysqli_prepare($con, $stmt);
        mysqli_stmt_bind_param($get_tf,'s', $topic);
        mysqli_execute($get_tf);
        $result = mysqli_stmt_get_result($get_tf);
        if($result)
        {
            while($row3 = mysqli_fetch_assoc($result))
            {
                unset($row['answer']);
                array_push($data, $row3);
            }
        }
        shuffle($data);
        
        $res = array("status" => "success", "data" => $data);
        print json_encode($res);

    }
    if(isset($_POST['submit']) && $_POST['submit'] !="")
    {
        $ans = $_POST['submit'];
        $topic_id = $_POST['topic'];

        $keys = array_keys($ans);
        $values = array_values($ans);
        $score = 0;
        $total_question = count($keys);


        for($i=0; $i<$total_question; $i++)
        {
            $question_id = $keys[$i];
            if(is_array($values[$i]))
            {
                $check_multiple = mysqli_query($con, "SELECT answer FROM multiple WHERE topic_id = '$topic_id' AND question_id = '$question_id'");
                if(mysqli_num_rows($check_multiple) == 1)
                {
                    $row = mysqli_fetch_assoc($check_multiple);
                    $answer = explode(",", $row['answer']);
                    if($answer == $values[$i])
                    {
                        // print $i;
                        $score++;
                    }

                }
            }
            else
            {
                $check_single = mysqli_query($con, "SELECT answer FROM single WHERE topic_id = '$topic_id' AND question_id = '$question_id'");
                if(mysqli_num_rows($check_single) == 1)
                {
                    $row = mysqli_fetch_assoc($check_single);
                    $answer = $row['answer'];
                    // print $answer;
                    if($answer == $values[$i])
                    {
                        // print $i;
                        $score++;
                    }
                }
                $check_tf = mysqli_query($con, "SELECT answer FROM tf WHERE topic_id = '$topic_id' AND question_id = '$question_id'");
                if(mysqli_num_rows($check_tf) == 1)
                {
                    $row = mysqli_fetch_assoc($check_tf);
                    $answer = $row['answer'];
                    if($answer == $values[$i])
                    {
                        // print $i;
                        $score++;
                    }
                }
            } 
        }

        $matric = $_SESSION['matric'];
        $percent = intval(($score / $total_question) * 100);
        $grade = grade($percent);
        $save_score = mysqli_query($con, "INSERT INTO quiz_score(matric, total_question, score, percent, grade, topic_id, date_created) VALUES('$matric', '$total_question', '$score', '$percent', '$grade', '$topic_id',NOW() )");

        if($save_score)
        {
            $res = array("status" => "success", "topic" => $topic_id, "student" => $matric);
        }
        print json_encode($res);
    }

    if(isset($_GET['getScore']) && $_GET['getScore'] != "")
    {
        $matric = $_GET['getScore'];
        $topic_id = $_GET['topic_id'];

        $stmt = "SELECT * FROM quiz_score WHERE matric = ? AND topic_id = ?";
        $get_score = mysqli_prepare($con, $stmt);
        mysqli_stmt_bind_param($get_score, 'ss', $matric, $topic_id);
        mysqli_stmt_execute($get_score);
        $result = mysqli_stmt_get_result($get_score);
        // print_r($result);
        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_assoc($result);
            $res = array("status" => "success", "data" => $row['percent']);
        }
        print json_encode($res);
    }