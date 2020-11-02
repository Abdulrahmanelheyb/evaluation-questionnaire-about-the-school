<?php
/*
 * Index Page Script Functions
 * Created By Abdulrahman Elheyb.
 * Date :   "10/22/2020"
 * Time :   "10:40 PM"
 */

if (is_null($_POST) == false){

    require_once("../../Answer.php");
    require_once("../../../Models/Base/DataAccess.php");

    $Answers = Answer::Select_Answers("SELECT PID,QID,Answer FROM Answers WHERE Answer='" . $_POST['Score'] ."' AND QID='" . $_POST['QuestionID']  . "'");
    echo json_encode($Answers);

}