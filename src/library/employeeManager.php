<?php

function maxIdInArray($array)
{
    $object = array_reduce($array, function ($a, $b) {
        return $a ? ($a["id"] > $b["id"] ? $a : $b) : $b;
    });
    return $object["id"];
}

function addEmployee(array $newEmployee)
{
    $jsonString = file_get_contents("../../resources/employees.json");
    $employees = json_decode($jsonString, true);
    $newId = 1 + maxIdInArray($employees);
    $newEmployee["id"] = $newId;
    array_push($employees, $newEmployee);
    file_put_contents("../../resources/employees.json", json_encode($employees));
    http_response_code(201);
    return json_encode($newEmployee);
}


function deleteEmployee(string $id)
{
    $jsonString = file_get_contents("../../resources/employees.json");
    $employees = json_decode($jsonString, true);
    $found = false;
    foreach ($employees as $key => $employee) {
        if ($employee["id"] == $id) {
            $found = true;

            break;
        }
    }
    if ($found) {
        unset($employees[$key]);
        $employees = array_values($employees);
        file_put_contents("../../resources/employees.json", json_encode($employees));
        http_response_code(200);
    } else {
        http_response_code(400);
    }
}


function updateEmployee(array $updateEmployee)
{
    $jsonString = file_get_contents("../../resources/employees.json");
    $employees = json_decode($jsonString, true);
    $updatedEmployees = array_map(function ($employee) use ($updateEmployee){
        return $employee['id'] == $updateEmployee['updatedEmployee']['id'] ? $updateEmployee['updatedEmployee'] : $employee;
    },$employees);
    file_put_contents("../../resources/employees.json", json_encode($updatedEmployees));
    http_response_code(201);
}

function getEmployee($id)
{
    $jsonString = file_get_contents("../../resources/employees.json");
    $employees = json_decode($jsonString);
    $found = false;
    foreach ($employees as $key => $value) {
        if ($value->id == $id) {
            $employee = $value;
            $found = true;
            break;
        }
    }
    if ($found) {
        return json_encode($employee);
        http_response_code(200);
    } else {
        http_response_code(404);
    }
}


// function removeAvatar($id)
// {
// // TODO implement it
// }


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }
