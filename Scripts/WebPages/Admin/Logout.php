<?php
  session_start(  );

  $appUsername =
     $HTTP_SESSION_VARS["authenticatedUser"];

  $loginMessage =
    "User \"$appUsername\" has logged out";

  session_register("loginMessage");

  session_unregister("authenticatedUser");
  
  
// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Finally, destroy the session.
session_destroy();

  // Relocate back to the login page
  header("Location: ../../../login2.php");
?>
