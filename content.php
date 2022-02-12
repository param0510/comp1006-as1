<!-- This page is used to display the data being stored in the database after all the necessary validation -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- The required meta tags were added!! -->
    <meta charset="UTF-8">
    <meta name="description" content="this page displays the list of people who have registration for the math olympiad">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Added the necessary favicon and title -->
    <link rel="shortcut icon" href="css/favicon/favicon_olympiad.ico" type="image/x-icon">
    <title>Registration List | Math Olympiad</title>
    <!-- Link to the bootstrap css files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Added some google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Timmana&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tenali+Ramakrishna&display=swap" rel="stylesheet">
    <!-- link to the local css file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="content">
    <div>
        <div>
            <h1>People who already registered!!</h1>
            <p>
                <!-- link to the registration form -->
                <a href="index.php" class="badge badge-pill badge-primary">Click here to register!!!</a>
            </p>
            <!-- Table displaying the data being stored in the database -->
            <table id="table" class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col"></th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Year of Birth</th>
                        <th scope="col">College</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Province</th>
                        <th scope="col">Postal Code</th>
                        <th scope="col">Residency Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // I used a try-catch block here too, to handle any errors involved with database connection.
                        try
                        {
                            // Connecting to the database
                            include 'db_connection.php';
                            // Error handling
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            // Sql query to collect all the data from the applicants table and linking it to the residenceTypes and states table by using their respective foreign keys..
                            // I used the order by command to sort the data on the basis of Student ID in ascending order
                            $sql = "SELECT * FROM applicants INNER JOIN residenceTypes ON applicants.residenceId = residenceTypes.residenceId
                                                            INNER JOIN states ON applicants.stateId = states.stateId
                                    ORDER BY studentId ";
                            // Preparing and executing the sql
                            $cmd = $db->prepare($sql);
                            $cmd->execute();
                            // Fetching all the data and displaying it using the foreach construct
                            $applicants=$cmd->fetchAll();
                            foreach ($applicants as $applicant) {
                                echo '<tr>';
                                echo   '<td class="stId" scope="row">' . $applicant['studentId'] . '</td>
                                        <td> <img src="img/' . $applicant['photo'] . '" class="img-thumbnail" alt = "applicant_image" ></td>
                                        <td>' . $applicant['firstName'] . '</td>
                                        <td>' . $applicant['lastName'] . '</td>
                                        <td>' . $applicant['yearOfBirth'] . '</td>
                                        <td>' . $applicant['collegeName'] . '</td>
                                        <td>' . $applicant['address'] . '</td>
                                        <td>' . $applicant['city'] . '</td>
                                        <td>' . $applicant['stateName'] . '</td>
                                        <td>' . $applicant['postalCode'] . '</td>
                                        <td>' . $applicant['type'] . '</td>';
                                echo '</tr>';
                            }
                            // Disconnecting from the database.
                            $db = null;
                        }
                        catch(Exception $e)
                        {
                            echo '<h3>!!!!Error!!!!</h3> <h4> Message: '.$e->getMessage().'</h4>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>