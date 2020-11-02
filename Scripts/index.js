/*
 * Index Page Script Functions
 * Developed By Abdulrahman Elheyb.
 * © All rights reserved to Abdulrahman Elheyb.
 */
$(document).ready(function (){
    $("#Question").text($("#Qst0").text());
    let QID = (Number($("#Qst0").attr("value")));
    $("#Question").attr("value",QID.toString());
    QID++;
    $("#QuestionID").text(QID.toString());
});
const fadeInValue = 750;
const fadeOutValue = 750;

function SubmitE0() {
    $.post("src/Models/ModelsServices/AnswersServices/Insert_Answer.php",{
        QID: $("#QuestionID").text(),
        Answer: "1"
    },function (data,status){
        data = null;
        console.log("Response status is " + status + "\n");
    });
    FadeIn_Out();
}
function SubmitE1() {
    $.post("src/Models/ModelsServices/AnswersServices/Insert_Answer.php",{
        QID: $("#QuestionID").text(),
        Answer: "3"
    },function (data,status){
        data = null;
        console.log("Response status is " + status + "\n");
    });
    FadeIn_Out();
}
function SubmitE2() {
    $.post("src/Models/ModelsServices/AnswersServices/Insert_Answer.php", {
        QID: parseInt($("#QuestionID").text()),
        Answer: "5"
    }, function (data, status) {
        data = null;
        console.log("Response status is " + status + "\n");
    });
    FadeIn_Out();
}

function FadeIn_Out(){
    $("#Answer").fadeOut(fadeOutValue,function (){
        $("#Question").fadeOut(fadeOutValue,function (){
           if (EndSurvey() === true){
               $("#Question").fadeIn(fadeInValue).css({"color":"white","font-weight":"bolder"});
               $("#QuestionDiv").fadeOut(500,function (){
                   $("#QuestionDiv").css(
                   {"background-color:":"#4158D0",
                   "background-image":"linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%)",
                   "transition":"background-image 0.5s linear"
                   }).fadeIn(500);

               });
           } else{
               NextQuestion();
               $("#Question").fadeIn(fadeInValue,function (){
                   $("#Answer").fadeIn(fadeInValue);
               });
           }
        });
    });
}

function NextQuestion(){
    try {
        let qid = Number($('#Question').attr("value"));
        let QCount = Number(parseInt($('#QuestionCount').text()));
        let NxtQid = qid + 1;
        let QNumber = NxtQid + 1;
        if (QNumber <= QCount){
            $('#Question').text($("#Qst" + NxtQid.toString()).text());
            $('#Question').attr('value',NxtQid.toString());
            $('#QuestionID').text(QNumber.toString());
        }

    }catch (e) {
        console.log("Next Question ERROR Massege : " + e.message());
    }
}
function EndSurvey(){
    let QNumber = Number($("#QuestionID").text());
    let QuestionsCount = parseInt($("#Questions").attr("value"),10);
    if (QNumber === QuestionsCount){
        $('#QuestionCount').hide();
        $('#Answer').hide();
        $('#QuestionDiv').css({'height':'100vh','padding':'0'});
        $('#Question').text("Degerlendiginiz icin tesekkur ederiz :)").css('padding','0');
        $('hr').hide();
        return true;
    }else {
        return false;
    }
}