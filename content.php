<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration List</title>
</head>
<body>
    <h1>List of Registered people!</h1>
    <p>
        <a href="http://localhost/comp1006/assignment1">Click here to register!!!</a>
    </p>
    <table>
        <thead>
            <tr>
                <th>Serial No</th>
                <th>SIN</th>
                <th>Full Name</th>
                <th>Year of Birth</th>
                <th>Residency</th>
                <th>Annual Income</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $db=new PDO('mysql:host=127.0.0.1;dbname=php_assignment','root','');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM residents INNER JOIN residenceTypes ON residents.residenceId = residenceTypes.residenceId";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                $residents=$cmd->fetchAll();

                foreach ($residents as $resident) {
                    echo '<tr>';
                    echo   '<td>' . $resident['serialNo'] . '</td>
                            <td>' . $resident['sinNumber'] . '</td>
                            <td>' . $resident['name'] . '</td>
                            <td>' . $resident['yearOfBirth'] . '</td>
                            <td>' . $resident['type'] . '</td>
                            <td>' . $resident['annualIncome'] . '</td>';
                    echo '</tr>';
                }
                $db = null;
            ?>
        </tbody>
    </table>
</body>
</html>