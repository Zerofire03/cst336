$(document).ready(function()
{
    $("form").submit(function()
    {
        var selected = $('#superheroRealNames').find(":selected").text();
        if(selected == "Select One")
        {
            $("#questionFeedback").append("Please select a name!");
        }
        else
        {
            var alt = $("img").attr('alt');
            var id = $('#superheroRealNames').children(":selected").attr("id");
            $("#waiting").html("<img src='img/loading.gif' alt='submiting data'/>");
            if(alt == id)
            {
                correctAnswer($("#questionFeedback"));
                //Updates the correct selection in db
                $.ajax({
                    type : "post",
                    url  : "submitCorrectAnswer.php",            
                    dataType : "json",
                    data : {"name" : alt
                    },            
                    success : function(data){
                        console.log(data);
                        $("#superheroname").html(data.name);
                        $("#correct").html(data.correct);
                        $("#incorrect").html(data.incorrect);
                        $("#feedback").css("display","block");
                        $("#waiting").html("");
                        $("input[type='submit']").css("display", "");
                        
                    },
                    complete: function(data,status)
                    { //optional, used for debugging purposes
                        //alert(status);
                    }
        
                });//AJAX
            }
            else
            {
                incorrectAnswer($("#questionFeedback"));
                //Updates the incorrect selection in db
                $.ajax({
                    type : "post",
                    url  : "submitIncorrectAnswer.php",            
                    dataType : "json",
                    data : {"name" : alt
                    },            
                    success : function(data){
                        console.log(data);
                        $("#superheroname").html(data.name);
                        $("#correct").html(data.correct);
                        $("#incorrect").html(data.incorrect);
                        $("#feedback").css("display","block");
                        $("#waiting").html("");
                        $("input[type='submit']").css("display", "");
                        
                    },
                    complete: function(data,status)
                    { //optional, used for debugging purposes
                        //alert(status);
                    }
        
                });//AJAX
            }
        }
    });//End submit
    
    function correctAnswer(questionFeedback)
    {
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
    }
    
    function incorrectAnswer(questionFeedback)
    {
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
    }
});//End document ready