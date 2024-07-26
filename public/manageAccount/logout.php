<?php
//Without this line, the script wouldn't be able to access the session data that it needs to destroy.
session_start();

// Destroy the session
session_unset();
//This function frees all session variables. It clears the $_SESSION superglobal array but keeps the session itself alive.
session_destroy();
//This function destroys the session data on the server. After calling this function, the session is no longer active, and any data associated with the session is deleted. This effectively logs the user out.

// Redirect to home page
header('Location: ../home.php');
exit();
?>
