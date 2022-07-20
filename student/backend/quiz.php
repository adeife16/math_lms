<?php
    require_once 'config.php';
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