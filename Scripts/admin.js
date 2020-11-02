/*
 * Admin Page Script Functions
 * Developed By Abdulrahman Elheyb.
 * © All rights reserved to Abdulrahman Elheyb.
 */
function Exec_CLick(){
    let Score = Number(parseInt($('#Score').val()));
    if (Score !== 0){
        $('#MultiData').hide();
        $.post("src/Models/ModelsServices/AnswersServices/Get_Answers.php",{
            Score: $("#Score").val(),
            QuestionID: $("#Question").val()
        },function (data){
            let List = JSON.parse(data);
            let Persons = [];
            let Answers = [];

            List.forEach(function (item){
                Persons.push(item['PID']);
                Answers.push(item['Answer']);
            });

            $('#Persons').text(Persons.length);
            $('#TotalScore').text(Answers.length);

            if (Score === 1){
                $('#EmojiType').text("😐");
            }else if (Score === 3){
                $('#EmojiType').text("🙂");
            }else {
                $('#EmojiType').text("😊");
            }

            $('#SingleData').show();
            console.log(Persons);
            console.log(Answers);

        });
    }else {
        $('#SingleData').hide();

        let Answers = [];
        let Persons = [];

        $.post("src/Models/ModelsServices/AnswersServices/Get_Answers.php",{
            Score: 1,
            QuestionID: $("#Question").val()
        },function (data){
            let List = JSON.parse(data);
            Persons[0] = [];
            Answers[0] = [];

            List.forEach(function (item){
                Persons[0].push(item['PID']);
                Answers[0].push(item['Answer']);
            });

            $.post("src/Models/ModelsServices/AnswersServices/Get_Answers.php",{
                Score: 3,
                QuestionID: $("#Question").val()
            },function (data){
                let List = JSON.parse(data);
                Persons[1] = [];
                Answers[1] = [];

                List.forEach(function (item){
                    Persons[1].push(item['PID']);
                    Answers[1].push(item['Answer']);
                });

                $.post("src/Models/ModelsServices/AnswersServices/Get_Answers.php",{
                    Score: 5,
                    QuestionID: $("#Question").val()
                },function (data){
                    let List = JSON.parse(data);
                    Persons[2] = [];
                    Answers[2] = [];

                    List.forEach(function (item){
                        Persons[2].push(item['PID']);
                        Answers[2].push(item['Answer']);
                    });

                    $('#Persons_ndx5').text(Persons[2].length);
                    $('#TotalScore_ndx5').text(Answers[2].length);
                    $('#EmojiType_ndx5').text("😊");
                    $('#MultiData').show();
                });


                $('#Persons_ndx3').text(Persons[1].length);
                $('#TotalScore_ndx3').text(Answers[1].length);
                $('#EmojiType_ndx3').text("🙂");
            });


            $('#Persons_ndx1').text(Persons[0].length);
            $('#TotalScore_ndx1').text(Answers[0].length);
            $('#EmojiType_ndx1').text("😐");
        });
    }



}
