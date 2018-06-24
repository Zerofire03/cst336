<?php
function displayCard($randomCard, $player)
{
    /*
    switch($randomSuit)
    {
        case 0: $suit = "d";
            break;
        case 1: $suit = "c";
            break;
        case 2: $suit = "h";
            break;
        case 3: $suit = "s";
            break;
    }
    */
    
    echo "<p id='player$player'>Player $player</p>";
    echo "<img id='imgplayer$player' src='img/$randomCard.png' alt='$randomCard' title='$randomCard' width='70'/>";
}

function displayWinner($randomCard1, $randomCard2)
{
    echo "<div id='output'>";
    if($randomCard1[0] > $randomCard2[0])
    {
        echo "<h1 id='winner' class='winner'>Player 1 Wins!</h1>";
    }
    elseif($randomCard1[0] < $randomCard2[0])
    {
        echo "<h1 id='winner' class='winner'>Player 2 Wins!</h1>";
    }
    else
    {
        if($randomCard1[1] > $randomCard2[1])
        {
             echo "<h1 id='winner' class='winner'>Player 1 Wins!</h1>";
             $score+=1;
        }
        else
        {
             echo "<h1 id='winner' class='winner'>Player 2 Wins!</h1>";
        }
    }
    echo "</div>";
}

function play()
{
    $deck = array();
    $suits = array("c", "d", "h", "s");
    $faces = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13");
    foreach($suits as $suit)
    {
        foreach($faces as $face)
        array_push($deck, "$face$suit");
    }
    shuffle($deck);
    
    for($i=1; $i<3; $i++)
    {
        $randomKey = array_rand($deck, 1);
        ${"randomCard" . $i} = $deck[$randomKey];
        displayCard(${"randomCard" . $i}, $i);
    }
    displayWinner($randomCard1, $randomCard2);
    
}

?>