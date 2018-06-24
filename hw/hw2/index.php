<!DOCTYPE html>
<html>
    <head>
        <title>High Low Card Game</title>
        <style>
            @import url("css/style.css");
        </style>
    </head>
    <body>
        <header>
            <h1>High Low Card Game</h1>
        </header>
        <div id="main">
            <?php
                $score = $_POST['score'];
                include 'inc/functions.php';
                play();
            ?>
            <form>
                <input type='submit' value='Next Round!'/>
            </form>
        </div>
    </body>
</html>