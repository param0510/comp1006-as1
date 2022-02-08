<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Registration</title>
</head>
<body>
    <h1>Welcome to Online Registration</h1>
    <form action="saved.php" method="post">
        <fieldset>
            <label for="sin">Enter your SIN:</label>
            <input type="number" name="sin" id="sin">
        </fieldset>
        <fieldset>
            <label for="name">Enter your Name:</label>
            <input type="text" name="name" id="name">
        </fieldset>
        <fieldset>
            <label for="yob">Enter your Year of Birth:</label>
            <input type="number" name="yob" id="yob" min="1700" max="2003">
        </fieldset>
        <fieldset>
            <label for="residenceId">Choose your Residency:</label>
            <select name="residenceId" id="residenceId">
                <?php
                    $db= new PDO('mysql:host=127.0.0.1;dbname=php_assignment','root','');
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM residenceTypes";
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $residenceTypes = $cmd->fetchAll();
                    foreach ($residenceTypes as $residenceType ) {
                        echo '<option value="'.$residenceType['residenceId'].'">'. $residenceType['type']. '</option>';
                    }
                    $db = null;
                ?>
            </select>
        </fieldset>
        <fieldset>
            <label for="income">Enter your Annual Income:</label>
            <input type="number" name="income" id="income">
        </fieldset>
        <button>Submit</button>
    </form>
</body>
</html>