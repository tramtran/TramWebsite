<!DOCTYPE html>
<html>
<head></head>

<body>
<?php
    // echo file("proverbs.txt");
    
    $DBConnect=@mysql_connect("localhost","ca86_33","php");
    if($DBConnect === FALSE)
    echo"<p>Unable to connect to the database server.</p>"
    ."<p>Error code ". mysql_errno().": ".mysql_error()."</p>";
    
    else{
        
        $DBName="ca86_33";
        if(!@mysql_select_db($DBName,$DBConnect)){
            echo "Unable to select the database";
        }
        else{
            
            $TableName = "randomproverb";
            $SQLstring = "count(*) from $TableName";
            $QueryResult = @mysql_query($SQLstring,$DBConnect);
            
            if($QueryResult==0)
                echo"<P>There are no proverbs in the table!</p>";
            else{
                $index=1;
                $max=rand(1,$QueryResult);
                while (($Row = mysql_fetch_assoc($QueryResult)) !== FALSE && $index < $max){
                    $index++;
                }
                $ProverbArray=$Row['proverb'];
                echo "$ProverbArray";
                $SQLstring = "update $TableName set display_count = display_count + 1 where proverb = ".$ProverbArray;
                $QueryResult = @mysql_query($SQLstring,$DBConnect);
                if($QueryResult===FALSE){
                    echo "Unable to update display_count";
                }
            }
            mysql_free_result($QueryResult);
        }
        mysql_close($DBConnect);
    }
    ?>
</body>
</html>