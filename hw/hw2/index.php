<!DOCTYPE html>
<html>
    <head>
        <title>High Low Card Game</title>
        <style>
            @import url("css/style.css");
        </style>
    </head>
    <body>
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