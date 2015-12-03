<!DOCTYPE html>
<html>
<head>
<title>Guest Book</title>
</head>
<body>
<?php
    if (empty($_POST['first_name']) || empty($_POST['last_name']))
    echo "<p>You must enter your first and last name.  Click your browser's Back button to return to the Guest Book.</p>\n";
    else{
        $DBConnect=@mysql_connect("localhost","ca86_21","php");
        
        if($DBConnect===FALSE)
            echo "<p>Unable to connect to the database server.</p>"
            ."<p>Error code ". mysql_errno().": ".mysql_error()."</p>";
        else{
            $DBName="ca86_21";
            if(!@mysql_select_db($DBName,$DBConnect)){
                $SQLstring = "create database $DBName";
                $QueryResult = @mysql_query($SQLstring,$DBConnect);
                if($QueryResult===FALSE)
                    echo "<p>Unable to executer the query.</p>"."<p>Error code ".mysql_errno($DBConnect).": ".mysql_error($DBConnect)."</p>";
                else{
                    echo "<p>You are the first visitor!</p>";
                }
            }
            mysql_select_db($DBName,$DBConnect);
            
            $TableName="visitors";
            $SQLstring="show tables like '$TableName'";
            $QueryResult = @mysql_query($SQLstring,$DBConnect);
            if(mysql_num_rows($QueryResult)==0){
                $SQLstring="create table $TableName(countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,last_name varchar(40),first_name varchar(40))";
                //echo "gethere";
                $QueryResult=@mysql_query($SQLstring,$DBConnect);
                if ($QueryResult===FALSE)
                    echo "<p>Unable to create the table.</p>"
                    ."<p>Error code ".mysql_errno($DBConnect) . ": ".mysql_error($DBConnect)."</p>";
            }
                $FirstName=addslashes($_POST['first_name']);
                 $LastName=addslashes($_POST['last_name']);
                 $SQLstring="insert into $TableName values(NULL,'$LastName','$FirstName')";
                 $QueryResult = @mysql_query($SQLstring,$DBConnect);
                 if($QueryResult===FALSE)
                 echo "<p>Unable to execute the query.</p>"."<p>Error code ".mysql_errno($DBConnect).": ".mysql_error($DBConnect)."</p>";
                 else
                 echo "<h1>Thank you for signing our guest book!</h1>";
            
            mysql_close($DBConnect);
        }
    }
    
    ?>
</body>
</html>