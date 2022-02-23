<!-- First skeleton made by Ashir for creating the main framework of the UI -->

<!-- PHP Session to log out the user and return to home page -->
<?php
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) 
    {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 60*60,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    unset($_SESSION['login']);
    session_destroy(); // destroy session
    header("location:index.php"); 
?>