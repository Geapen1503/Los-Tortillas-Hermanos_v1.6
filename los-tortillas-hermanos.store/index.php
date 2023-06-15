<?php
include_once 'controller/controller.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "lth");
$page = $_GET['p'] ?? null;

try {
    if($page != null) {
        switch ($page) {
            case 'home':
                showPage('view/home.php');
                break;
            case 'history':
                showPage('view/history.php');
                break;
            case 'values':
                showPage('view/value.php');
                break;
            case 'job':
                showPage('view/job.php');
                break;
            case 'login':
            case 'login/':
            case 'login/login':
                showPage('view/login.php');
                break;
            case 'register':
            case 'login/register':
                showPage('view/register.php');
                break;
            case 'logout':
                showPage('view/logout.php');
                break;
            case 'profile.php':
                showPage('view/profile.php.php');
                break;
            case 'methError':
                showPage('view/methError.php');
                break;
            case 'meth':
                showPage('view/meth.php');
                break;
            case 'cart':
                showPage('view/cart.php');
                break;
            case 'add-to-cart1':
                showPage('view/add-to-cart1.php');
                break;
            case 'add-to-cart2':
                showPage('view/add-to-cart2.php');
                break;
            case 'add-to-cart3':
                showPage('view/add-to-cart3.php');
                break;
            case 'profile':
                showPage('view/profile.php');
                break;
            default:
                showPage('view/error.php');
                break;
        }

    } else {
        showPage('view/home.php');
    }
} catch (Exception $e) {
    echo 'Erreur';
    header('Location: /error');
}