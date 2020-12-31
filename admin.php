<?php
require_once("src/Models/Base/DataAccess.php");
require_once("src/Models/Question.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/admin.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>!-->
    <script src="Scripts/jquery-3.5.1.min.js"></script>
    <script src="Scripts/admin.js"></script>
    <title>Answers List</title>
</head>
<body>
    <div id="container">
        <div id="Form">
            <label for="Question">Lutfen Soruyu Seciniz.</label>
            <select id="Question">
                <?php
                    Question::Select_Questions();
                    foreach (Question::$Questions as $q){
                        echo "<option id='Qst". $q->getQID() ."' value='". $q->getQID() ."'>". $q->getQuestion() ."</option>";
                    }
                ?>
            </select>
            <label for="Score">Lutfen Emoji Seciniz.</label>
            <select id="Score">
                <option value="1">Neutral Face 😐</option>
                <option value="3">Slightly Smiling Face 🙂</option>
                <option value="5">Smiling Face with Smiling Eyes 😊</option>
                <option value="0">All 😐 🙂 😊</option>
            </select>

            <button onclick="Exec_CLick();" id="Exec">Execute</button>
        </div>
        <div id="DataDiv">
        
            <div id="SingleData">
                <label for="Persons">Persons =</label>
                <span id="Persons"></span> <br>
                <label for="TotalScore">Total Score =</label>
                <span id="TotalScore"></span> <br>
                <label for="EmojiType">Emoji Type =</label>
                <span id="EmojiType"></span> <br>
            </div>
            <div  id="MultiData">
                <label for="Persons_ndx1">Persons =</label>
                <span id="Persons_ndx1"></span> <br>
                <label for="TotalScore_ndx1">Total Score =</label>
                <span id="TotalScore_ndx1"></span> <br>
                <label for="EmojiType_ndx1">Emoji Type =</label>
                <span id="EmojiType_ndx1"></span> <br>
                <br>
                <label for="Persons_ndx3">Persons =</label>
                <span id="Persons_ndx3"></span> <br>
                <label for="TotalScore_ndx3">Total Score =</label>
                <span id="TotalScore_ndx3"></span> <br>
                <label for="EmojiType_ndx3">Emoji Type =</label>
                <span id="EmojiType_ndx3"></span> <br>
                <br>
                <label for="Persons_ndx5">Persons =</label>
                <span id="Persons_ndx5"></span> <br>
                <label for="TotalScore_ndx5">Total Score =</label>
                <span id="TotalScore_ndx5"></span> <br>
                <label for="EmojiType_ndx5">Emoji Type =</label>
                <span id="EmojiType_ndx5"></span> <br>
            </div>

        </div>
    </div>
</body>
</html>