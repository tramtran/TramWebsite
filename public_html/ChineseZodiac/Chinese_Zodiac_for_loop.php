<!DOCTYPE html>
<html>
<head>
<meta charset = 'utf-7' />
<title>Chinese_Zodiac_for_loop </title>
<style type='text/css'>
body { margin: 0}
h1 { text-align: center; }
h1 { background-color: pink; color: red; padding:1em; margin: 0;
}
table { border-collapse: collapse;}
table td { border: 1px solid pink;padding: 0em 0em;}
</style>
</head>
<body>

<table>
<?php
    
    $Images = array("Rat","Ox","Tiger","Rabbit","Dragon","Snake","Horse","Goat","Monkey","Rooster","Dog","Pig");
    for ($i = 0; $i < 12; $i++){
        echo '<td><img src= \''.$Images[$i].'\'.jpg></td>';
    }
    
    for ($index=1912;$index<=2015;$index++){
        $cur=$index-1912;
        if($cur%12==0){
            echo '</tr><tr>';
        }
        echo '<td>',$index,'</td>';
    }  
?>
</tr></table>
</body>
</html>