<!-- This is the main page which collects data from the user through a form. -->
<!-- I have added some css to it by using bootstrap and google fonts. -->
<!-- I have created a form for users to register for the math olympiad. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="this page contains the form for registration to math olympiad">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Added the necessary favicon and title -->
    <link rel="shortcut icon" href="css/favicon/favicon_olympiad.ico" type="image/x-icon">
    <title>Online Registration | Math Olympiad</title>
    <!-- Added link to the bootstrap css files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Added some google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mali:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Homenaje&display=swap" rel="stylesheet">
    <!-- link to the local css file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="index">
    <div>
        <div>
            <!-- I have added the necessary headings and the link to the page where the data being stored in the database is dispalayed. -->
            <h1 >Welcome to Online Registration for Olympiads</h1>
            <h2>Apply for Math Olympiad here!</h2>
            <p>
                <!-- link to the display page -->
                <a href="content.php" class="badge badge-pill badge-primary">Click here to see the list of Applicants !</a>
            </p>
            <!-- I have collected various forms of data using this form it also allows the users to upload a single photo -->
            <!-- Adding the photo to the database is the additional php functionality I learned from one of your projects as a form of independent learning. -->
            <form action="saved.php" method="post" enctype="multipart/form-data">
                <!-- As you can see this form collects various forms of data being text, number and also has a drop-down option available, with their necessary validation. -->
                <!-- I have used fieldset to differentiate between different type of data and to group together similar data. -->
                <fieldset class="p-2">
                    <label for="fName" class="col-2">First Name: </label>
                    <input type="text" name="fName" id="fName" required minlength="2" maxlength="50" placeholder="First name">
                    <label for="lName" class="col-1">Last Name: </label>
                    <input type="text" name="lName" id="lName" required minlength="2" maxlength="50" placeholder="Last name">
                </fieldset>
                <fieldset class="p-2">
                    <label for="yob" class="col-2">Year of Birth: </label>
                    <input type="number" name="yob" id="yob" min="1960" max="2004" required placeholder="Birth year">
                </fieldset>
                <fieldset class="p-2">
                    <label for="studentId" class="col-2">Student ID: </label>
                    <input type="number" name="studentId" id="studentId" min="200000000" max="299999999" required placeholder="Student ID">
                </fieldset>
                <fieldset class="p-2">
                    <label for="cName" class="col-2">College Name: </label>
                    <input type="text" name="cName" id="cName" required maxlength="100" minlength="5" placeholder="College name">
                </fieldset>
                <fieldset class="p-2">
                    <label for="add" class="col-2">Address: </label>
                    <input type="text" name="add" id="add" required maxlength="100" placeholder="Complete address">
                </fieldset>
                <fieldset class="p-2">
                    <label for="city" class="col-2">City: </label>
                    <input type="text" name="city" id="city" required maxlength="60" placeholder="City">
                    <!-- Here I display the various options available for the participating provinces/states in the olympiad -->
                    <!-- This data is being retrieved from the aws database and is pretty dynamic!!! -->
                    <label for="stateId" class="col-1">Province: </label>
                    <select name="stateId" id="stateId">
                        <?php
                            // I have included the php file which contains the necessary php code to connect to the database.
                            include 'db_connection.php';
                            // Error handling
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            // Sql query and set of commands to retrieve data from the database table states
                            $sql = "SELECT * FROM states";
                            $cmd = $db->prepare($sql);
                            $cmd->execute();
                            $states = $cmd->fetchAll();
                            // Displaying the available options using the foreach loop.
                            foreach ($states as $state ) 
                            {
                                echo '<option value="'.$state['stateId'].'">'.$state['stateName'].'</option>';
                            }
                            // disconnecting from the server.
                            $db = null;
                        ?>
                    </select>
                    <label for="pCode" class="col-1">Postal Code: </label>
                    <input type="text" name="pCode" id="pCode" minlength="7" maxlength="7" required placeholder="Postal code">
                </fieldset>
                <fieldset class="p-2">
                    <label for="residenceId" class="col-2">Residency status:</label>
                    <!-- I have done the same here for displaying the types of Residency available in the database -->
                    <select name="residenceId" id="residenceId">
                        <?php
                            include 'db_connection.php';
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            // Extracing data from the residenceTypes table from the database.
                            $sql = "SELECT * FROM residenceTypes";
                            $cmd = $db->prepare($sql);
                            $cmd->execute();
                            $residenceTypes = $cmd->fetchAll();
                            foreach ($residenceTypes as $residenceType ) 
                            {
                                echo '<option value="'.$residenceType['residenceId'].'">'. $residenceType['type']. '</option>';
                            }
                            $db = null;
                        ?>
                    </select>
                </fieldset>
                <!-- Tried this new functionality and it worked like a charm!!!! -->
                <!-- I learned it from your phpgaming project uploaded on github -->
                
                <fieldset class="p-2">
                    <label for="photo" class="col-2 ">Add your photograph here: </label>
                    <input type="file" name="photo" id="photo" accept=".png, .jpg,jpeg" required>
                </fieldset>
        
                <fieldset class="p-2 offset-2" >
                    <button class=" btn btn-dark p-1.5">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>