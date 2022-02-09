<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved!</title>
</head>
<body>


    <?php
        $db=new PDO('mysql:host=127.0.0.1;dbname=php_assignment','root','');
        $sin = $_POST['sin'];
        $name = $_POST['name'];
        $yob = $_POST['yob'];
        $residenceId = $_POST['residenceId'];
        $income = $_POST['income'];

        $sql = "INSERT INTO residents (sinNumber,name,yearOfBirth,residenceId,annualIncome) 
                            VALUES (:sin,:name,:yob,:residenceId,:income)";
        $cmd = $db->prepare($sql);

        $cmd->bindParam(':sin',$sin,PDO::PARAM_INT);
        $cmd->bindParam(':name',$name,PDO::PARAM_STR,50);
        $cmd->bindParam(':yob',$yob,PDO::PARAM_INT);
        $cmd->bindParam(':residenceId',$residenceId,PDO::PARAM_INT);
        $cmd->bindParam(':income',$income,PDO::PARAM_INT);

        $cmd->execute();

        $db = null;
        
        echo "<h1>Your data was saved.</h1>";
        echo "<h2>Thank you!</h2>";
    ?>
</body>
</html>