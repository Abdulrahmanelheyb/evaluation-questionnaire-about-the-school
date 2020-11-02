<?php
/*
 * Index Page Script Functions
 * Created By Abdulrahman Elheyb.
 * Date :   "10/22/2020"
 * Time :   "10:41 PM"
 */
class Question
{
    private  $QID = null;
    private $Question = null;
    public static array $Questions = array();

    public function setQID($qid)
    {
       $this->QID = $qid;
    }
    public function getQID()
    {
        return  $this->QID;
    }
    public function setQuestion($question)
    {
        $this->Question = $question;
    }
    public function getQuestion()
    {
        return $this->Question;
    }
    public static function getQuestionsCount(){
       return intval(count(self::$Questions));
    }

    # DATABASE FUNCTIONS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

    static public function Select_Questions()
    {
        $db = new DataAccess();
        $stmt = $db->Statement("SELECT * FROM Questions");
        while ($QuestionIndex = $stmt->fetch() ) {
            require_once("Question.php");
            $question = new Question();
            $question->setQID($QuestionIndex["QID"]);
            $question->setQuestion($QuestionIndex["Question"]);
            Question::$Questions[] = $question;
        }
    }
}