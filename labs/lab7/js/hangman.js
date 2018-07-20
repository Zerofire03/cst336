//Variables
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{word: "snake", hint: "It's a reptile"},
             {word: "monkey", hint: "It's a mammal"},
             {word: "beetle", hint: "It's an insect"}];
//Creating an array of available letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                
var correctWords;               
if(sessionStorage.getItem('correctWords'))
{
    correctWords = JSON.parse(sessionStorage.getItem('correctWords'));
}
else
{
    correctWords = [];
}


//sessionStorage.setItem('correctWords', JSON.stringify(correctWords));

    
//Listeners
window.onload = startGame();

$(".letter").click(function()
{
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".replayBtn").on("click", function()
{
    location.reload();
})

$(".hintBtn").on("click", function()
{
    displayHint();
    disableButton($(this));
})

//Functions
function startGame()
{
    pickWord();
    initBoard()
    createLetters();
    updateBoard();
    displayGuessedWords();
}

function initBoard()
{
    for(var letter in selectedWord)
    {
        board.push("_");
    }
}

function pickWord()
{
    var randomInt = Math.floor(Math.random() * words.length); 
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

//Creates the letters inside the letters div
function createLetters()
{
    for(var letter of alphabet)
    {
        $("#letters").append("<button class='btn btn-success letter' id='" + letter + "'>" + letter + "</button>");
    }
}

//Checks to see if the selected letter exists in the selectedWord
function checkLetter(letter)
{
    var positions = new Array();
    
    //put all the positions the letter exists in an array
    for(var i=0; i<selectedWord.length; i++)
    {
        if(letter == selectedWord[i])
        {
            positions.push(i);
        }
    }
    
    if(positions.length > 0)
    {
        updateWord(positions, letter);
        
        //Check to see if this is a winning guess
        if(!board.includes('_'))
        {
            endGame(true);
        }
    }
    else
    {
        remainingGuesses -= 1;
        updateMan();
    }
    if(remainingGuesses <= 0)
    {
        endGame(false);
    }
}

//Update the current word then calls for a board update
function updateWord(positions, letter)
{
    for(var pos of positions)
    {
        board[pos] = letter;
    }
    updateBoard();
}

function updateBoard()
{
    $("#word").empty();
    
    for(var letter of board)
    {
        document.getElementById("word").innerHTML += letter + " ";
    }
    
    $("#word").append("<br />");
    $("#word").append("<button class='hintBtn btn btn-success'>Hint</button>");
}

function displayHint()
{
    //console.log(remainingGuess);
    $("#word").append("<br />");
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    remainingGuesses -= 1;
    updateMan();
}

//Disables the button and changes the style to tell the user it's disabled
function disableButton(btn)
{
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}



//Calculates and updates the image for our stick man
function updateMan()
{
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win)
{
    $("#letters").hide();
    
    if(win)
    {
        $('#won').show();
        correctWords.push(selectedWord);
        sessionStorage.setItem('correctWords', JSON.stringify(correctWords));
    }
    else
    {
        $('#lost').show();
    }
}

function displayGuessedWords()
{
    if(correctWords.length > 0)
    {
        $("#correctWords").append("<h4>Guessed Words</h4>");
        for(correctWord of correctWords)
        {
            $("#correctWords").append("<p>" + correctWord + "</p>");
        }
    }
}