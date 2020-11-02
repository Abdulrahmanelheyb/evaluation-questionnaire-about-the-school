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
    $Answer = new Answer();
    $Answer->setAnswer($_POST['Answer']);
    $Answer->setQID(intval($_POST['QID']) - 1);
    $PID = intval($Answer->getLastPID());
    if ($Answer->getQID() == 0){
        $Answer->setPID($PID+1);
    }else{
        $Answer->setPID($PID);
    }
    $Answer->Insert_Answer($Answer);
    echo $PID;
}