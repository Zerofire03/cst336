$(document).ready(function()
{
    $("input[name=searchmovies]").click(function()
    {
        var superhero = $('#superheroName').find(":selected").text();
        $.ajax(
        {
             url:'storesession.php',
             type:'POST',
             data:{
                 txt: superhero,
             },
             dataType:'json',
             success: function(data, status)
             {
                 
             }
             comlete: function(data, status)
             {
                 
             }
        });
        /**
        $.ajax(
        {
            url: "https://www.omdbapi.com/?s=" + $($('#superheroName').find(":selected").text()) + "&apikey=12215ee6",
            dataType: "json",
            success: function(data,status)
            {
                $('#movieResults').html(data["metadata"].title + "<br>");
                for(var i=0; i<data['features'].length; i++)
                {
                    $('#movieResults').append(data[i]['Title'] + " - " + data[i]['Poster'] + "<br>");
                }
            },//end of success
            complete: function(data, status)
            {
                //optional, used for debugging
                //alert(status);
            }
        });//end AJAX
        **/
    });//End function
});//End document reader