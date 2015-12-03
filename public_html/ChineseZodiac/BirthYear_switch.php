<!DOCTYPE html>
<html>
<head>
<title>Chinese Zodiac using if else</title>
</head>
<body>
<?php
    function validateInput($data,$fieldName){
        global $errorCount;
        if(empty($data)){
            echo "\"$fieldName\" is a required number field.<br />\n";
            ++$errorCount;
            $retval="";
        }else{
            $retval=trim($data);
            $retval=stripslashes($retval);
            if(is_numeric($data)){
                $data=round($data);
                $retval=$data;
            }else{
                echo "<p>The field $fieldName must be a number";
                ++$errorCount;
                $retval="";
            }
        }
        
        return($retval);
    }
    function getYearSign($year){
        $yearSign="";
        $remain=$year%12;
        switch($remain){
            case 0:
                $yearSign="Monkey";
                break;
            case 1:
                $yearSign="Rooster";
                break;
            case 2:
            $yearSign="Dog";
                break;
            case 3:
            $yearSign="Pig";
                break;
            case 4:
            $yearSign="Rat";
                break;
            case 5:
            $yearSign="Ox";
                break;
            case 6:
            $yearSign="Tiger";
                break;
            case 7:
            $yearSign="Rabbit";
                break;
            case 8:
            $yearSign="Dragon";
                break;
            case 9:
            $yearSign="Snake";
                break;
            case 10:
            $yearSign="Horse";
                break;
            default:
            $yearSign="Goat";
        }
        return $yearSign;
    }
    function displayForm($Sender,$Email,$Subject,$Message){
        ?>
<h2 style ="text_align:center">THE CHINESE ZODIAC</h2>
<h3 style ="text_align:center">Using IF ELSE</h3>
<form name="BirthYear" action="BirthYear_ifelse.php" method="post">
<p>Year of Birth: <input type="number" name="Year" value="<?php echo $YearOfBirth; ?>" /></p>
<p><input type="reset" value="Clear Form" />&nbsp;&nbsp;<input type="submit" name="Submit" value"Show Me My Sign" /></p>
</form>

<?php
    }
    $ShowForm=TRUE;
    $errorCount=0;
    $YearOfBirth=0;
    if(isset($_POST['Submit'])){
        $YearOfBirth=validateInput($_POST['Year'],"Year of Birth");
        if($errorCount==0)
            $ShowForm=FALSE;
        else
            $ShowForm=TRUE;
    }
    if ($ShowForm==TRUE){
        if($errorCount>0)
            echo "<p>Please re-enter the form information below.</p>\n";
        displayForm($Sender,$Email,$Subject,$Message);
    }
    else{
        $yearSign=getYearSign($YearOfBirth);
        echo "<pre>You were born under the sign of the ". strtolower($yearSign).".\n\n";
        echo "<img src='".$yearSign.".jpg'/>";
        $File= "statistics/".$YearOfBirth.".txt";
        if(file_exists($File)){
            $Count=file_get_contents($File);
            ++$Count;
        }else{
            $Count=1;
        }
        if (file_put_contents($File,$Count))
            echo "<p>You are person $Count to enter $YearOfBirth\n</pre>";
    }
    ?>
</body>
</html>