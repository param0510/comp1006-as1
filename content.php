<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration List</title>
    <style>
        td,th{
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>List of Registered people!</h1>
    <p>
        <a href="http://localhost/comp1006/assignment1">Click here to register!!!</a>
    </p>
    <table border = "4">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Year of Birth</th>
                <th>College</th>
                <th>Address</th>
                <th>City</th>
                <th>Province</th>
                <th>Postal Code</th>
                <th>Residency</th>
            </tr>
        </thead>
        <tbody>
            <?php
                try
                {
                    // $db=new PDO('mysql:host=127.0.0.1;dbname=php_assignment','root','');
                    include 'db_connection.php';
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM applicants INNER JOIN residenceTypes ON applicants.residenceId = residenceTypes.residenceId
                                                    INNER JOIN states ON applicants.stateId = states.stateId
                            ORDER BY studentId ";
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $applicants=$cmd->fetchAll();


                    foreach ($applicants as $applicant) {
                        echo '<tr>';
                        echo   '<td>' . $applicant['studentId'] . '</td>
                                <td> <img src="img/' . $applicant['photo'] . '" alt = "applicant_image" style="width:100px;"></td>
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
                    $db = null;
                }
                catch(Exception $e)
                {
                    echo '<h3>!!!!Error!!!!</h3> <h4> Message: '.$e->getMessage().'</h4>';
                    // exit();
                }
            ?>
        </tbody>
    </table>
</body>
</html>