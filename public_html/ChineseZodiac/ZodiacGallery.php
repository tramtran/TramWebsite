<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title>Zodiac Gallery</title>
<style type='text/css'>
div { margin-top: 2em; text-align: center; }
table { border-collapse: collapse; width: 100%; }
table img { width: 75px; }
table td { border: 1px solid gray; text-align: center; padding: 1em; }
td a { text-decoration: none; color: gray; }
</style>
</head>
<body>
<h1>Zodiac Gallery</h1>

<table>
<tr>
<?php
    $Images = [
    "Rat.jpg" => "Rat",
    "Ox.jpg" => "Ox",
    "Tiger.jpg" => "Tiger",
    "Rabbit.jpg" => "Rabbit",
    "Dragon.jpg" => "Dragon",
    "Snake.jpg" => "Snake",
    "Horse.jpg" => "Horse",
    "Goat.jpg" => "Goat",
    "Monkey.jpg" => "Monkey",
    "Rooster.jpg" => "Rooster",
    "Dog.jpg" => "Dog",
    "Pig.jpg" => "Pig"
    ];
    
    
    
    $col = 0;
    foreach ($Images as $file => $caption) {
        $col++;
        echo "<td>\n";
        echo "<figure>\n";
        echo "<a href='ZodiacGallery.php?image=$file'>";
        echo "<img src='$file' /></a>\n";
        echo "<figcaption>$caption</figcaption>\n";
        echo "</figure>\n";
        echo "</td>\n";
        if ($col % 4 == 0) {
            echo "</tr><tr>\n";
        }
    }
    ?>
</tr>
</table>

<div>
<?php
    if (isset ( $_GET['image'] )) {
        $bigimage = $_GET['image'];
        echo "<img src=\"$bigimage\" />\n";
    }
    ?>
</div>

</body>
</html>

