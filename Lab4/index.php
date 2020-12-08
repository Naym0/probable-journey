<!DOCTYPE html>
<html>
    <head>
        <title> REST Assignment </title>
        <link rel="shortcut icon" type="image/png" href="images/geo.png">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">	
        <button onclick="document.location='client.php'">Search Student</button>
    </head>
    
    <style>
        body {
        background-image: url('images/bg.jpg');
        }
    </style>

    <br><br>

    <body>
        <form name="Reg" method="POST" action="insert.php">
            <fieldset style = "text-align: left; font-size: 20px;">
            <legend align = "center">REGISTER DETAILS</legend><br>
            
            <div align = "center">
                Admission number:<br>
                <input type= "text" name="id" required>
                <br><br>

                Name:<br>
                <input type= "text" name="name" required>
                <br><br>

                Email:<br>
                <input type="text" name="email" required>
                <br><br>

                Number:<br>
                <input type="text" name="number" required >
                <br><br>
                    
                Address:<br>
                <input type= "text" name="address" required>
                <br><br>

                Course:<br>
                <input type= "text" name="course" required>
                <br><br>
                
                Points:<br>
                <input type= "text" name="points" required>
                <br><br>
                
                <button class="button" name="register"> Submit </button>
            </div>
        </form>
    </body>
</html>

