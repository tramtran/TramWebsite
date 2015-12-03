<!DOCTYPE html>
<html>
<head>
<title>Hit Counter</title>
</head>
<body>
<?php
    $CounterFile= "hitcount.txt";
    if(file_exists($CounterFile)){
        $Hit=file_get_contents($CounterFile);
        ++$Hit;
    }else{
        $Hit=1;
    }
    echo "<h1>There have been $Hit hits to this page.</h1>\n";
    
    if (file_put_contents($CounterFile,$Hit))
    echo "<p>The counter file has been updated.</p>\n";
    
    ?>
</body>
</html>