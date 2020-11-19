<?php
    require_once('nusoap-0.9.5/lib/nusoap.php');

    $server = new nusoap_server();

    $server->configureWSDL("Student Manager", "urn:student_manager"); // Configure WSDL file

    // Register Complex Types
    $server->wsdl->addComplexType(
        'student',
        'complexType',
        'struct',
        'all',
        '',
        [
            "id" => ["name" => "id", "type" => "xsd:string"],
            "name" => ["name" => "name", "type" => "xsd:string"],
            "email" => ["name" => "email", "type" => "xsd:string"],
            "number" => ["name" => "number", "type" => "xsd:string"],
            "address" => ["name" => "address", "type" => "xsd:string"],
            "points" => ["name" => "points", "type" => "xsd:string"],
        ],
        [], // attributes
    );

    function get_student(string $s_id) 
    {
        require_once 'connection.php';
        $id = $mysqli->real_escape_string($s_id);
        $sql = "SELECT * FROM students WHERE id = $id LIMIT 1;";
        $result = mysqli_fetch_assoc($mysqli->query($sql));

        if(!$result) {
            return new soap_fault("SOAP-ENV:Client", "", "Could not find student record");
        }
        return $result;
    }

    $server->register(
        "get_student",
        ["admission_number" => "xsd:string"],
        ["return" => "tns:student"]
    );


    // Handle requests
    $server->service(file_get_contents("php://input"));

?>