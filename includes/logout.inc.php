<?php

// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user back to the front page with no errors
header("Location: ../index.php?error=none");


// This code starts a session with session_start(), then unsets all session variables using session_unset() to clear any data associated with the session. After that, it destroys the session with session_destroy() to ensure it's completely terminated.

// Finally, the user is redirected back to the front page with no errors using the header() function.