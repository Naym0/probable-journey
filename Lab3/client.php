<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    require_once('nusoap-0.9.5/lib/nusoap.php');
    $client = new nusoap_client("http://localhost/SOAP/server.php?wsdl");

    $student = null;
    $error = null;

    if (array_key_exists("search", $_POST)) {
    $response = $client->call("get_student", ["s_id" => $_POST['s_id']]);

    // Check for errors
    if (array_key_exists("faultstring", $response)) {
        $error = $response["faultstring"];
    } else {
        $student = $response;
    }
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> SOAP Assignment </title>
        <link rel="shortcut icon" type="image/png" href="images/geo.png">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">	

        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
        </style>
    </head>
    <br><br>

    <body>
        <form name="Reg" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
            <fieldset style = "text-align: left; font-size: 20px;">
            <legend align = "center">RETRIEVE DETAILS</legend><br>
            
            <div align = "center">
                Admission number:<br>
                <input type= "text" name="s_id" required>
                <br><br>
                <input type="hidden" name="search"/>
                <button class="button"> Search </button><br><br><br><br><br>

                <?php if (!empty($error)) : ?>
                    <div class="mb-5">
                    <p class="text-red-600">
                        <strong>Error!</strong> <?= $error ?>
                    </p>
                    </div>
                <?php endif; ?>

                <?php if ($student) : ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>NUMBER</th>
                            <th>ADDRESS</th>
                            <th>POINTS</th>
                        </tr>
                        <tr>
                            <td><?= $student["id"] ?></td>
                            <td><?= $student["name"] ?></td>
                            <td><?= $student["email"] ?></td>
                            <td><?= $student["number"] ?></td>
                            <td><?= $student["address"] ?></td>
                            <td><?= $student["points"] ?></td>
                        </tr>
                    </table>
                <?php endif; ?>
            </div>
        </form>
    </body>
</html>