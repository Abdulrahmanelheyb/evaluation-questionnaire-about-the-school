<?php
require_once("src/Models/Question.php");
require_once("src/Models/Base/DataAccess.php");
?>
<html lang="tr-TR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="Scripts/index.js"></script>
    <title>Okulumuz Hakkinda Sizce</title>

</head>

<body>
    <div id="container">
        <?php Question::Select_Questions(); ?>
        <span id="QuestionCount"><?php echo Question::getQuestionsCount();?><span id="QuestionID"></span></span>
        <div hidden id="Questions" value="<?php echo Question::getQuestionsCount();?>">
            <?php
            foreach (Question::$Questions as $q){
                echo "<span hidden id='Qst". $q->getQID() ."' value='". $q->getQID() ."'>". $q->getQuestion() ."</span>";
            }
            ?>
        </div>
        <div id="QuestionDiv">
            <p id="Question"></p>
        </div>
            <hr>
        <ul id="Answer">
            <li ><button class="EmojiButtons" id="E0" onclick="SubmitE0();"><img src="../Assets/E0.png" alt="Emoji 0"></button></li>
            <li id="EmojiLi"><button class="EmojiButtons" id="E1" onclick="SubmitE1();"><img src="../Assets/E1.png" alt="Emoji 1"></button></li>
            <li ><button class="EmojiButtons" id="E2" onclick="SubmitE2();"><img src="../Assets/E2.png" alt="Emoji 2"></button></li>
            <!-- this submitE`x`(); func for submit value te database. -->
        </ul>
    </div>
</body>
</html>