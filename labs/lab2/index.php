<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <script type="text/javascript">
            function play_sound()
            {
                var audioElement = document.createElement('audio');
                audioElement.setAttribute('src', 'sound/jackpot.mp3');
                audioElement.setAttribute('autoplay', 'autoplay');
                audioElement.load();
                audioElement.play();
            }
        </script>
        <div id="main">
            <?php
                include 'inc/functions.php';
                play();
            ?>
            <form>
                <input type="submit" value="Spin!"/>
            </form>
        </div>
    </body>
</html>