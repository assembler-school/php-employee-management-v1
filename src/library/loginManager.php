<?php

function validateLoginData($launchUser, $launchPassword, $logedUser, $logedPassword)
{
        switch (true) {
                case ($launchUser == $logedUser && password_verify($launchPassword, $logedPassword)):
                        return "Logged";
                        break;
                case (($launchUser != $logedUser) && !password_verify($launchPassword, $logedPassword)):
                        return "Wrong name and password";
                        break;
                case (!($launchUser == $logedUser)):
                        return "Wrong name";
                        break;
                case (!password_verify($launchPassword, $logedPassword)):
                        return "Wrong password";
                        break;
                default:
                        break;
        }
}

function startSession()
{
        $_SESSION["login_time"] = time();
        echo "To dashboard";
        header("Location:../dashboard.php");
}

function destroySession()
{
        session_unset();
        setcookie(session_name(), "", time() - 3600);
        session_destroy();
        echo "To index";
        header("Location:../../index.php");
}
