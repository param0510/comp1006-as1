<!-- As the name mentions this file saves the data, collected through the form, to the database using the PDO method. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- The required meta tags were added!! -->
    <meta charset="UTF-8">
    <meta name="description" content="this page saves the data received from the user to the database after necessary validation">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Added the necessary favicon and title -->
    <link rel="shortcut icon" href="css/favicon/favicon_saving.ico" type="image/x-icon">
    <title>Saving your data...</title>
    <!-- Added the link to the bootstrap css files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Used some google fonts here!! -->
    <link href="https://fonts.googleapis.com/css2?family=Mali:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Della+Respira&display=swap" rel="stylesheet">
    <!-- Linked my local css file to the page -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="saved">
    <div>
        <div>
            <?php
                // Collecting data posted into the form by the user
                // The names are quite descriptive...
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

                // This flag variable is used for validation and error handling
                $flag = true;

                // this file validates the data before its entry into the database..
                include 'validation.php';

                // Image insertion begins here...
                // I tried learning this additional php feature from one of your github repositories at - https://github.com/ifotn/comp1006-phpgaming-w21.git 
                // The code might look similar, but trust me I tried and tested it several times before actually getting it to work. 
                // I got confused with the php code because you had it integrated with login credentials, but I still managed to figure it out, phew!

                // Calling for session start
                // if (session_status() == PHP_SESSION_NONE) {
                //     session_start();
                // }
                // Creating a variable to store the name of the file to be uploaded to the server
                $photo = null;

                // To get the file name
                $photo = $_FILES['photo']['name'];

                // To get temp location
                $tmp_name = $_FILES['photo']['tmp_name'];

                // To verify the file is an image
                $type = mime_content_type($tmp_name);
                if ($type != "image/png" && $type != "image/jpeg") 
                {
                    // Displaying appropriate warning to the user!
                    echo    '<div class="alert alert-warning" role="alert">
                                <h5>!! Please upload a .jpg/jpeg or .png file only !!</h5>
                            </div>';
                    $flag = false;
                }
                else 
                {
                    // file is valid so move/upload it to img folder on the database
                    // $photo = session_id() . "-" . $photo;
                    move_uploaded_file($tmp_name, "img/$photo");
                    if (move_uploaded_file($tmp_name,"img/$photo")) {
                        echo "Uploaded";
                    } else {
                        echo "File not uploaded";
                    }
                }
                // This runs only if the data being inserted is valid and does not have any errors
                if($flag == true)
                {
                    // I used I try-catch block here incase there is any failure connecting to the database. 
                    try
                    {
                        // Including the the database connection file.
                        include 'db_connection.php';
                        // This query collects uploads data to the database
                        $sql = "INSERT INTO 
                        applicants (studentId,photo,firstName,lastName,yearOfBirth,collegeName,address,city,stateId,postalCode,residenceId) 
                        VALUES (:studentId,:photo,:fName,:lName,:yob,:cName,:address,:city,:stateId,:postalCode,:residenceId)";
                        // preparing the sql query
                        $cmd = $db->prepare($sql);
                        // binding the necesssary parameters with their corresponding variables
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
                        // Executing the command to upload the data successfully
                        $cmd->execute();
                
                        $db = null;
                        // Displaying an appropriate success message 
                        echo    '<div class="alert alert-success" role="alert">
                                    <h2>Your data was saved.</h2>
                                    <h3>Thank you!</h3>
                                </div>';
                    }
                    catch(Exception $e)
                    {
                        // Displaying error messages, in case of error connecting to the database.
                        echo    '<div class="alert alert-danger" role="alert">
                                    <h3>!!!!Error!!!!</h3>
                                    <h4>Sorry, your data could not be saved.<h4>
                                </div>
                                <div class="alert alert-info" role="alert">
                                    <h5> Message: '.$e->getMessage().'</h5>
                                </div>';
                        // Exiting the program so that the following statements are not executed
                        exit();
                    }
                    // This link is available only when the data is succesfully uploaded.
                    echo    '<p>
                                <a href="content.php" class="badge badge-pill badge-success">Click here to see the updated list !</a>
                            </p>';
                }
                else
                {
                    // This link is made available when the data inputed by the user is invalid!!
                    echo    '<p>
                                <a href="index.php" class="badge badge-pill badge-danger">Click here to go back..</a>
                            </p>';
                }
            ?>
        </div>
    </div>

</body>
</html>