<!DOCTYPE html>
<html>
<head>
<title>Guets Book Posts</title>
</head>
<body>
<pre>
<?php
    $DBConnect=@mysql_connect("localhost","ca86_21","php");
    if($DBConnect === FALSE)
    echo"<p>Unable to connect to the database server.</p>"
    ."<p>Error code ". mysql_errno().": ".mysql_error()."</p>";
    else{
        $DBName="ca86_21";
        if(!@mysql_select_db($DBName,$DBConnect))
            echo "<p>There are no entries in the guest book!</p>";
        else{
            $TableName = "visitors";
            $SQLstring = "select * from $TableName";
            $QueryResult = @mysql_query($SQLstring,$DBConnect);
            if(mysql_num_rows($QueryResult)==0)
                echo"<P>There are no entries in the guest book!</p>";
            else{
                echo "<p>The followeing visitors have signed our guest book:</p>";
                echo "<table width='100%' border='1'>";
                echo "<tr><th>First Name</th><th>Last Name</th></tr>";
                while (($Row = mysql_fetch_assoc($QueryResult)) !== FALSE){
                    echo "<tr><td>{$Row['first_name']}</td>";
                    echo "<td>{$Row['last_name']}</td></tr>";
                }
            }
            mysql_free_result($QueryResult);
        }
        mysql_close($DBConnect);
    }
    ?>
</pre>
</body>
</html>