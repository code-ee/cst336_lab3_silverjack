<!DOCTYPE html>
<html>
<head>
    <title>Silver Jack</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet" />
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
                
                $suitCheck = floor($card/13);
                if($suitCheck == 4) {
                    $suitCheck = 3;
                }
                
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
    ?>
</body>
</html>