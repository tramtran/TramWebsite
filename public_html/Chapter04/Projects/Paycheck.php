<!DOCTYPE html>
<html>
<head>
<title>Contact Me</title>
</head>
<body>
<?php
    
    function validateInput($data,$fieldName){
        global $errorCount;
        if(empty($data)){
            echo "\"$fieldName\" is a required field.<br />\n";
            ++$errorCount;
            $retval=0;
        }else{
            $data=trim($data);
            $data=stripslashes($data);
            if(is_numeric($data)){
                
                $retval=$data;
                return ($retval);
            }else{
                echo"<p>The field $fieldName must be a number greater than 0.</p>\n";
                $retval=0;
                ++$errorCount;
            }
        }
        return($retval);
    }
    
    function displayForm($hourWorked,$hourlyWage,$Result){
        ?>

<h2 style ="text_align:center">Pay Check</h2>
<form name="paycheck" action="Paycheck.php" method="post">
<p>Hours worked: <input type="number" name="hWorked" min="0" value="<?php echo $hourWorked;?>" /></p>
<p>Hourly wage: <input type="number" name="hWage" min="0"value="<?php echo $hourlyWage;?>"/></p>
<p><input type="reset" value="Clear" />&nbsp;&nbsp;<input type="submit" name="Submit" value="Calculate" /></p>
<p>Result:<input name="result" disabled value="<?php echo $Result; ?>" /></p>
</form>

<?php
    }
    $ShowForm=TRUE;
    $hWage=0;
    $hWorked=0;
    $result=0;
    if(isset($_POST['Submit'])){
        $hWage=validateInput($_POST['hWage'],"Hourly wage");
        $hWorked=validateInput($_POST['hWorked'],"Hours Worked");
        if($errorCount==0)
            $ShowForm=FALSE;
        else
            $ShowForm=TRUE;
    }
    if ($ShowForm==TRUE){
        if($errorCount>0)
            echo "<p>Please re-enter the form information below.</p>\n";
        displayForm($hWorked,$hWage,$result);
    }
    else{
        if($hWorked<=40){
            
            $result=$hWage*$hWorked;
        }else{
            $result=$hWage*40+($hWorked-40)*$hWage*1.5;
        }
        displayForm($hWorked,$hWage,$result);
    }
    ?>
</body>
</html>