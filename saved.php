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
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];

        $yob = $_POST['yob'];
        $studentId = $_POST['studentId'];
        $cName = $_POST['cName'];
        $add = $_POST['add'];
        $city = $_POST['city'];
        $stateId = $_POST['stateId'];
        $pCode = $_POST['pCode'];
        $residenceId = $_POST['residenceId'];

        //Trial of image insertion 
        $photo = null;
        
        // get the file name
        $photo = $_FILES['photo']['name'];

        // get temp location
        $tmp_name = $_FILES['photo']['tmp_name'];

        // verify file is an image

        // $type = mime_content_type($tmp_name);
        // if ($type != "image/png" && $type != "image/jpeg") {
        //     echo 'Please upload a .jpg or .png file<br />';
        //     $ok = false;
        // }
        // else {
            
            // file is valid so move to img/game-uploads using the session Id
            move_uploaded_file($tmp_name, "img/$photo");

        // }
        // }

        $sql = "INSERT INTO 
        applicants (studentId,photo,firstName,lastName,yearOfBirth,collegeName,address,city,stateId,postalCode,residenceId) 
        VALUES (:studentId,:photo,:fName,:lName,:yob,:cName,:address,:city,:stateId,:postalCode,:residenceId)";
        $cmd = $db->prepare($sql);

        $cmd->bindParam(':studentId',$studentId,PDO::PARAM_INT);
        $cmd->bindParam(':photo',$photo,PDO::PARAM_STR,100);
        $cmd->bindParam(':fName',$fName,PDO::PARAM_STR,50);
        $cmd->bindParam(':lName',$lName,PDO::PARAM_STR,50);
        $cmd->bindParam(':yob',$yob,PDO::PARAM_INT);
        $cmd->bindParam(':cName',$cName,PDO::PARAM_STR,100);
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