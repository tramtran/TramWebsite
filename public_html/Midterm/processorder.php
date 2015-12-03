<!DOCTYPE html>
<html>
<head>
<title>Movie Ticket Order Form</title>
</head>
<body>
<?php
    function validateInput($data,$fieldName){
        global $errorCount;
        if(empty($data)){
            echo "\"$fieldName\" is a required field.<br />\n";
            ++$errorCount;
        } else{
            return($data);
        }
    }
    function displayForm($AdultOrder,$ChildOrder,$StudentOrder,$CustomerName){
        ?>
<h2 style ="text_align:left">Movie Ticket Order Form</h2>
<p>Please fill out the order form.  You will receive a 5% group discount if you order 8 or more tickets.</p>
<form name="order" action="processorder.php" method="post">
<table>
<tr><td>Tickets</td> <td>Quantity</td></tr>
<tr><td>Adult ($11.65) </td><td><input type="number" name="Adult" value="<?php echo $AdultOrder; ?>" /></td></tr>
<tr><td>Child ($8.65) </td><td><input type="number" name="Child" value="<?php echo $ChildOrder; ?>"/></td></tr>
<tr><td>Student ($9.65) </td><td><input type="number" name="Student" value="<?php echo $StudentOrder; ?>" /></td></tr>
<tr><td>Customer Name </td><td><input type="text" name="CustomerName" value="<?php echo $CustomerName; ?>" /></td></tr>
</table>
<input type="submit" name="Submit" value"Send Form" /></p>
</form>

<?php
    }
    const AdultPrice = 11.65;
    const ChildPrice = 8.65;
    const StudentPrice = 9.65;
    $ShowForm=TRUE;
    $errorCount=0;
    $AdultOrder=0;
    $ChildOrder=0;
    $StudentOrder=0;
    $Total=0;
    $TotalTickets=0;
    $CustomerName="";
    if(isset($_POST['Submit'])){
        $AdultOrder=$_POST['Adult'];
        $ChildOrder=$_POST['Child'];
        $StudentOrder=$_POST['Student'];
        $CustomerName=validateInput($_POST['CustomerName'],"Customer Name");
        if($errorCount==0)
            $ShowForm=FALSE;
        else
            $ShowForm=TRUE;
    }
    if ($ShowForm==TRUE){
        if($errorCount>0)
            echo "<p>Please re-enter the form information below.</p>\n";
        displayForm($AdultOrder,$ChildOrder,$StudentOrder,$CustomerName);
    }
    else{
        $Total=$AdultOrder*AdultPrice+$ChildOrder*ChildPrice+$StudentOrder*StudentPrice;
        $TotalTickets=$AdultOrder+$ChildOrder+$StudentOrder;
        echo "<h2 style =\"text_align:left\">Movie Tickets Order Confirmation</h2>";
        echo "Thank you, ".$CustomerName.", for ordering. Here is your confirmation.";
        echo "<hr size=1>";
        if ($TotalTickets>=8){
            $Total=$Total*0.95;
            echo "<p style=\"text-align:center;\">".$AdultOrder." Adult Tickets<br>".$ChildOrder." Child Tickets<br>".$StudentOrder." Student Tickets<br>Group Discount Applied</p>";
        }else{
            
            echo "<p style=\"text-align:center;\">".$AdultOrder." Adult Tickets<br>".$ChildOrder." Child Tickets<br>".$StudentOrder." Student Tickets</p>";
        }
         echo "<p style=\"text-align:center;\"><font color=\"red\">Total Order: $".money_format('%.2n',$Total)."</font></p>";
      
    }
    ?>
</body>
</html>