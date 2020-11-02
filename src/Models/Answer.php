<?php
/*
 * Index Page Script Functions
 * Created By Abdulrahman Elheyb.
 * Date :   "10/22/2020"
 * Time :   "10:41 PM"
 */
class Answer
{
    private $AID = null;
    private $PID = null;
    private $QID = null;
    private $Answer = null;

    public function setAID($aid)
    {
        $this->AID = $aid;
    }
    public function getAID()
    {
        return $this->AID;
    }

    public function setPID($pid)
    {
        $this->PID = $pid;
    }
    public function getPID()
    {
        return $this->PID;
    }

    public function setQID($qid)
    {
        $this->QID = $qid;
    }
    public function getQID()
    {
        return $this->QID;
    }

    public function setAnswer($answer)
    {
        $this->Answer = $answer;
    }
    public function getAnswer()
    {
        return $this->Answer;
    }

    # DATABASE FUNCTIONS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

    public function Insert_Answer(Answer $answer)
    {
        $db = new DataAccess();
        $PID = $answer->getPID();
        $QID = $answer->getQID();
        $Answer = $answer->getAnswer();
        $db->Statement("INSERT INTO Answers (PID,QID,Answer) VALUES ('$PID','$QID','$Answer')");
    }

    public function getLastPID(){
        $db = new DataAccess();
        $PID = 0;
        $stmt = $db->Statement("SELECT * FROM Answers ORDER BY AID DESC LIMIT 1");
        while ($Answer = $stmt->fetch()){
            $PID = $Answer["PID"];
        }
        return $PID;
    }

    public static function Select_Answers($Query = null)
    {
        $db = new DataAccess();
        $stmt = $db->Statement($Query);
        return $stmt->fetchAll();
    }
}