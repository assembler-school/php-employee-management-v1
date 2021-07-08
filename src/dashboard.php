<?php
require_once('library/loginManager.php');
require_once('library/employeeManager.php');
require_once('library/sessionHelper.php');

if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['authUserId'])) {
    header('Location:../index.php');
}

$userId = $_SESSION['authUserId'];
$authUser = getUserById($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <title>Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5 px-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Employee Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employee.php">Employees</a>
                    </li>
                </ul>
            </div>
            <li class="nav-item d-flex dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $authUser['name'] ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">
                            <i class="bi bi-person me-2"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <form class="dropdown-item" action="library/loginController.php" method="post">
                            <input type="hidden" name="action" value="logout">
                            <i class="bi bi-box-arrow-left"></i>
                            <input class="bg-transparent border-0" type="submit" value="logout"></input>
                        </form>
                    </li>
                </ul>
            </li>
        </div>
    </nav>
    <div class="toast-container position-absolute top-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Required fields</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">

            </div>
        </div>
    </div>
    <div class="px-5">
        <div id="jsGrid"></div>
    </div>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>

    <script>
        $("#jsGrid").jsGrid({
            width: "100%",
            height: "auto",

            filtering: false,
            inserting: true,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 10,

            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "./library/employeeController.php",
                        dataType: "json",
                        data: filter,
                    });
                },
                insertItem: function(item) {
                    return $.ajax({
                        type: "POST",
                        url: "library/employeeController.php",
                        data: item,
                        dataType: "json",
                    });

                },
                deleteItem: function(item) {
                    return $.ajax({
                        type: "DELETE",
                        url: "./library/employeeController.php",
                        data: item,
                        success: function(data) {
                            console.log(data);
                            if (data = 'sessionTimeOut') {
                                window.location.reload();
                            }
                        }
                    });
                },

            },
            fields: [{
                    name: "id",
                    type: "text",
                    visible: false,
                    css: 'bordersAndBackground'
                },
                {
                    name: "name",
                    title: "Name",
                    type: "text",
                    width: 100,
                    validate: "required",
                    css: 'bordersAndBackground',
                    headercss: 'backgroundHeader'

                },
                {
                    name: "email",
                    title: "Email",
                    type: "text",
                    width: 150,
                    validate: [
                        "required",
                        {
                            message: "Please put a valid email address",
                            validator: function(value, item) {
                                return /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(value);
                            },
                        }
                    ],
                    css: 'bordersAndBackground',
                    headercss: 'backgroundHeader'

                },

                {
                    name: "age",
                    title: "Age",
                    type: "text",
                    width: 50,
                    validate: {
                        validator: function(value) {
                            if (value >= 18 && value < 80) {
                                return true;
                            }
                        },
                        message: function(value, item) {
                            return "The client age should be between 0 and 80. Entered age is \"" + value + "\" is out of specified range.";
                        },
                        param: [18, 80]
                    },
                    css: 'bordersAndBackground',
                    headercss: 'backgroundHeader'

                },
                {
                    name: 'streetAddress',
                    title: 'Address',
                    type: 'text',
                    width: '100',
                    headercss: 'backgroundHeader',
                    validate: 'required',
                    css: 'bordersAndBackground'
                },
                {
                    name: 'city',
                    title: 'City',
                    type: 'text',
                    width: '100',
                    validate: 'required',
                    headercss: 'backgroundHeader',
                    css: 'bordersAndBackground'
                },
                {
                    name: 'state',
                    title: 'State',
                    type: 'text',
                    width: '50',
                    headercss: 'backgroundHeader',
                    validate: 'required',
                    css: 'bordersAndBackground'
                },
                {
                    name: 'postalCode',
                    title: 'Postal Code',
                    type: 'text',
                    headercss: 'backgroundHeader',
                    width: '100',
                    validate: {
                        validator: function(value) {
                            if (value.length < 10 && value > 0) {
                                return true;
                            }
                        },
                        message: "Please enter a valid postal code",
                    },
                    css: 'bordersAndBackground'
                },
                {
                    name: 'phoneNumber',
                    title: 'Phone Number',
                    type: 'text',
                    headercss: 'backgroundHeader',
                    width: '100',
                    validate: {
                        validator: function(value, item) {
                            if (value.length < 20) {
                                return true;
                            }
                        },
                        message: "Please enter a valid phone number",
                    },
                    css: 'bordersAndBackground',
                },
                {
                    type: "control",
                    itemTemplate: function(value, item) {
                        var $result = $([]);
                        $result = $result.add(this._createDeleteButton(item));
                        return $result;
                    },
                    css: "bordersAndBackgroundEdit",
                    headercss: 'backgroundHeader'

                },
            ],

            rowClick: function(item) {
                window.location.href = "./employee.php?id=" + item.item.id;
            },
            onItemInvalid: function(args) {
                $(".toast-body").empty();
                // prints [{ field: "Name", message: "Enter client name" }]
                var messages = $.map(args.errors, function(error) {
                    return error.field.name + ": " + error.message;
                });

                $.each(messages, function(index, value) {
                    $(".toast-body")
                        .append(`<div class="alert alert-danger p-1" role="alert">*${value}</div>`)
                });
                $('.toast').toast('show');
                $(".toast").toast({
                    delay: 2000
                });

            },
            invalidNotify: function(args) {
                var messages = $.map(args.errors, function(error) {
                    return error.field.name + ": " + error.message;
                });
            }
        });
        //$("#jsGrid").jsGrid("fieldOption", "id", "visible", false);

        // $.ajax({
        //     type: "DELETE",
        //     url: "./library/employeeController.php",
        //     dataType: "html",
        //     success: function(data) {
        //         console.log(data);
        //     }
        // });
    </script>
</body>

</html>