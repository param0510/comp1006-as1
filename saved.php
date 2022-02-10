<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving your data...</title>
</head>
<body>


    <?php
        $db=new PDO('mysql:host=127.0.0.1;dbname=php_assignment','root','');
        $sin = $_POST['sin'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];

        $yob = $_POST['yob'];
        $studentId = $_POST['studentId'];
        $add = $_POST['add'];
        $city = $_POST['city'];
        $stateId = $_POST['stateId'];
        $pCode = $_POST['pCode'];
        $residenceId = $_POST['residenceId'];
        // $income = $_POST['income'];

        $sql = "INSERT INTO 
        applicants (sinNumber,firstName,lastName,yearOfBirth,studentId,address,city,stateId,postalCode,residenceId) 
        VALUES (:sin,:fName,:lName,:yob,:studentId,:address,:city,:stateId,:postalCode,:residenceId)";
        $cmd = $db->prepare($sql);

        $cmd->bindParam(':sin',$sin,PDO::PARAM_INT);
        $cmd->bindParam(':fName',$fName,PDO::PARAM_STR,50);
        $cmd->bindParam(':lName',$lName,PDO::PARAM_STR,50);
        $cmd->bindParam(':yob',$yob,PDO::PARAM_INT);
        $cmd->bindParam(':studentId',$studentId,PDO::PARAM_INT);
        $cmd->bindParam(':address',$add,PDO::PARAM_STR,100);
        $cmd->bindParam(':city',$city,PDO::PARAM_STR,60);
        $cmd->bindParam(':stateId',$stateId,PDO::PARAM_INT);
        $cmd->bindParam(':postalCode',$pCode,PDO::PARAM_STR,7);
        $cmd->bindParam(':residenceId',$residenceId,PDO::PARAM_INT);

        $cmd->execute();

        $db = null;
        
        echo "<h1>Your data was saved.</h1>";
        echo "<h2>Thank you!</h2>";
    ?>
    <p>
        <a href="http://localhost/comp1006/assignment1/content.php" >Click here to see the updated list</a>
    </p>
</body>
</html>