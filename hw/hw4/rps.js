var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;
var playerChoice;

function init()
{
	deselectAll();
}

function deselectAll()
{
	$("#btnPaper").css('backgroundColor', 'silver');
	$("#btnScissors").css('backgroundColor', 'silver');
	$("#btnRock").css('backgroundColor', 'silver');
}

function select(choice)
{
	playerChoice = choice;
	var fileName = 'images/' + choice + '.png';
	$("#imgPlayer").attr("src",fileName);
	deselectAll();
	if(choice=='rock') $("#btnRock").css('backgroundColor', '#888888');
	if(choice=='paper') $("#btnPaper").css('backgroundColor', '#888888');
	if(choice=='scissors') $("#btnScissors").css('backgroundColor', '#888888');
	
	$("#btnGo").css("display", "block");
}

function go()
{
	var numChoice = Math.floor(Math.random() * 3);

	$("#lblRock").css('backgroundColor', '#EEEEEE');
	$("#lblPaper").css('backgroundColor', '#EEEEEE');
	$("#lblScissors").css('backgroundColor', '#EEEEEE');
	
	if(numChoice==0)
	{
		computerChoice = 'rock';
		$("#imgComputer").attr("src","images/rock.png");
		$("#lblRock").css('backgroundColor', 'yellow');
		if(playerChoice=='rock')
		{
			$("#txtEndTitle").html('');
			$("#txtEndMessage").html('TIE');
		}
		else if(playerChoice=='paper')
		{
			$("#txtEndTitle").html('Paper covers Rock');
			$("#txtEndMessage").html('YOU WIN');
			
		}
		else if(playerChoice=='scissors')
		{
			$("#txtEndTitle").html('Rock smashes Scissors');
			$("#txtEndMessage").html('YOU LOSE');
		}
	}
	else if(numChoice==1)
	{
		computerChoice = 'paper';
		$("#imgComputer").attr("src","images/paper.png");
		$("#lblPaper").css('backgroundColor', 'yellow');
		if(playerChoice=='rock')
		{
			$("#txtEndTitle").html('Paper covers Rock');
			$("#txtEndMessage").html('YOU LOSE');
		}
		else if(playerChoice=='paper')
		{
			$("#txtEndTitle").html('');
			$("#txtEndMessage").html('TIE');
		}
		else if(playerChoice=='scissors')
		{
			$("#txtEndTitle").html('Scissors cut Paper');
			$("#txtEndMessage").html('YOU WIN');
		}
	}
	else if(numChoice==2)
	{
		computerChoice = 'scissors';
		$("#imgComputer").attr("src","images/scissors.png");
		$("#lblScissors").css('backgroundColor', 'yellow');
		if(playerChoice=='rock')
		{
			$("#txtEndTitle").html('Rock smashes Scissors');
			$("#txtEndMessage").html('YOU WIN');
		}
		else if(playerChoice=='paper')
		{
			$("#txtEndTitle").html('Scissors cuts Paper');
			$("#txtEndMessage").html('YOU LOSE');
		}
		else if(playerChoice=='scissors')
		{
			$("#txtEndTitle").html('');
			$("#txtEndMessage").html('TIE');
		}
	}
	$("#endScreen").css("display", "block");
}

function startGame()
{
	$("#introScreen").css("display", "none");
}

function replay()
{
	$("#endScreen").css("display", "none");
}