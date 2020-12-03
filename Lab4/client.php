<?php
    if (isset($_POST['s_id']) && $_POST['s_id']!="") {
        $s_id = $_POST['s_id'];
        $url = "http://localhost/REST/API.php?s_id=".$s_id;
        //http://localhost/REST/API.php?s_id=1
        
        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($client);
        $result = json_decode($response);
    }
    else{
        echo "No Such record";
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> REST Assignment </title>
        <link rel="shortcut icon" type="image/png" href="images/geo.png">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">	
        <button onclick="document.location='index.php'">Back to Registration</button>
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

            body {
            background-image: url('images/bg.jpg');
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

                <?php if (!empty($result)) : ?>
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
                            <td><?= $result->id ?></td>
                            <td><?= $result->name ?></td>
                            <td><?= $result->email ?></td>
                            <td><?= $result->number ?></td>
                            <td><?= $result->address ?></td>
                            <td><?= $result->points ?></td>
                        </tr>
                    </table>
                <?php endif; ?>
                <?php if (empty($result))  echo "No Record" ?>
            </div>
        </form>
    </body>
</html>