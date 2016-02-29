<!DOCTYPE html>
<html>
<head>
    <title>Silver Jack</title>
    <link href="styles.css" type="text/css" rel="stylesheet" />
    <?php
        $deck = array();
        $players = array();
        for ($i = 1; $i <= 52; $i++) {
            $deck[$i] = $i;

        }
        for ($i = 1; $i <= 4; $i++) {
            $players[$i] = $i;           
        }
    ?>
</head>
<body>
    <h2>Silver Jack</h2>
    <?php
        shuffle($deck);
        shuffle($players);
        echo "<hr>";
        
        for ($i = 1; $i <= 4; $i++) {
            echo "<hr>";
            $player = array_pop($players);
            echo "<img class=\"players\" src=\"players/$player.jpg\">";
            echo " ";
            $numberOfCards = rand(4,6);
            $score = 0;
            
            for ($j = 1; $j <= $numberOfCards; $j++) {
                $card = array_pop($deck);
                //echo $card;
                
                $suitCheck = floor(($card-1)/13);
                
                $suit = array("clubs", "diamonds", "hearts", "spades");
                $cardSuit = $suit[$suitCheck];
                
                $randomCard = rand(1,13);
                $cardValue = $card % 13;
                if ($cardValue == 0) {
                    $cardValue = 13;
                }
                $score += $cardValue;
                echo "<img src=\"cards/$cardSuit/$cardValue.png\">";
            }
            $playerScores[$player] = $score;
            echo "<h3>" . $score . "</h3>";
        }
        
        // determine winner
        $winningScore = 0;
        $winner = 0;
        for ($i = 1; $i <= 4; $i++) {
            if ($playerScores[$i] > $winningScore && $playerScores[$i] <= 42) {
                $winningScore = $playerScores[$i];
                $winner = $i;
            } else if ($playerScores[$i] == $winningScore) {
                $winner = 5;
            }
        }
        echo "<br><br>";
        
        // print winner
        switch($winner) {
            case 1:
                echo "<h2>Mario wins!!</h2>";
                break;
            case 2:
                echo "<h2>Wario wins!!</h2>";
                break;
            case 3:
                echo "<h2>Luigi wins!!</h2>";
                break;
            case 4:
                echo "<h2>Waluigi wins!!</h2>";
                break;
            case 5:
                echo "<h2>It's a tie!!</h2>";
                break;
        }
    ?>
        <div class="button">
        <form action ="index.php" method="post">
            <input class="continue" type="submit" name="choice" value="Play Again"></input><br>
        </form>
        </div>
</body>
</html>
