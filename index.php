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
    <h2>Get your School ID Card here.</h2>
    <p>
        <a href="http://localhost/comp1006/assignment1/content.php">Click here to see the list of Applicants</a>
    </p>
    <form action="saved.php" method="post">
        <fieldset>
            <label for="sin">Enter your SIN: </label>
            <input type="number" name="sin" id="sin"  min="2000000" max="9999999" required>
        </fieldset>
        <fieldset>
            <label for="fName">Enter your First Name: </label>
            <input type="text" name="fName" id="fName" required>

            <label for="lName">Enter your Last Name: </label>
            <input type="text" name="lName" id="lName" required>
        </fieldset>
        <fieldset>
            <label for="yob">Enter your Year of Birth: </label>
            <input type="number" name="yob" id="yob" min="1960" max="2004" required>
        </fieldset>

        <!-- New addition -->
        <fieldset>
            <label for="studentId">Enter your Student ID: </label>
            <input type="number" name="studentId" id="studentId" min="200000000" max="299999999" required>
        </fieldset>
        <fieldset>
            <label for="cName">Enter your College Name: </label>
            <input type="text" name="cName" id="cName" required>
        </fieldset>
        <fieldset>
            <label for="add">Enter your Address: </label>
            <input type="text" name="add" id="add" required>
        
            <label for="city">Enter your City: </label>
            <input type="text" name="city" id="city" required>
        
            <label for="stateId">Enter your Province: </label>
            <select name="stateId" id="stateId">
                <?php
                    $db = new PDO('mysql:host=127.0.0.1;dbname=php_assignment','root','');
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM states";
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $states = $cmd->fetchAll();
                    foreach ($states as $state ) {
                        echo '<option value="'.$state['stateId'].'">'.$state['stateName'].'</option>';
                    }
                    $db = null;
                ?>
            </select>
            
            <label for="pCode">Enter your Postal Code: </label>
            <input type="text" name="pCode" id="pCode" minlength="7" maxlength="7" required>
        </fieldset>
        <!-- ***** -->
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

        <!-- Try this later.... -->
        <!-- <fieldset>
            <label for="image">Add your image here: </label>
            <input type="file" name="image" id="image">
        </fieldset> -->


        <!-- <fieldset>
            <label for="income">Enter your Annual Income:</label>
            <input type="number" name="income" id="income"  min="10000" max="999999" required>
        </fieldset> -->
        <button>Submit</button>
    </form>
</body>
</html>