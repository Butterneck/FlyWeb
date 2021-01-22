<?php

namespace controllers;

class RouteController {

    public static function protectedRoute(): void {
        if (!$_SESSION['admin'] || !$_SESSION['logged_in']) {
            header('location:./login.php');
            exit;
        }
    }

    public static function unprotectedRoute(): void {
        if ($_SESSION['admin']) {
            header('location:./adm_index.php');
        }
    }

    public static function unloggedRoute(): void {
        if ($_SESSION['logged_in'] && $_SESSION['admin']) {
            header('location:./adm_index.php');
            exit;
        } else if ($_SESSION['logged_in']) {
            header('location:./index.php');
            exit;
        }
    }

    public static function loggedRoute(): void {
        if (!$_SESSION['logged_in']) {
            
            // Store request for after-login redirect
            $_SESSION['redirect_uri'] = $_SERVER['REQUEST_URI'];

            header('location:./login.php');
            exit;
        }
    }

}