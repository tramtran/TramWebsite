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
        if($remain==0){
            $yearSign="Monkey";
        }else if($remain==1){
            $yearSign="Rooster";
        }else if($remain==2){
            $yearSign="Dog";
        }else if($remain==3){
            $yearSign="Pig";
        }else if($remain==4){
            $yearSign="Rat";
        }else if($remain==5){
            $yearSign="Ox";
        }else if($remain==6){
            $yearSign="Tiger";
        }else if($remain==7){
            $yearSign="Rabbit";
        }else if($remain==8){
            $yearSign="Dragon";
        }else if($remain==9){
            $yearSign="Snake";
        }else if($remain==10){
            $yearSign="Horse";
        }else{
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