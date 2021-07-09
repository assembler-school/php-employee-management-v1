<?php
include "./employeeManager.php";


switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        header("Content-Type: application/json");
        $jsonString = file_get_contents("../../resources/employees.json");
        if (isset($_GET["id"])) {
            echo getEmployee($_GET["id"]);
        } else {
            echo $jsonString;
        }
        break;
    case "POST":
        echo addEmployee($_POST);
        break;
    case "UPDATE":
        parse_str(file_get_contents("php://input"), $_UPDATE);
        updateEmployee($_UPDATE);
        break;
    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        deleteEmployee($_DELETE["id"]);
        break;
}
