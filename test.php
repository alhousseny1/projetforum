
<?php
session_start();
$r=session_id();

/* SOME PIECE OF CODE TO AUTHENTICATE THE USER, MOSTLY SQL QUERY... */

/* now displaying the session id..... */
echo "the session id id: ".$r;
echo " and the session has been registered for: ".$_SESSION['username'];


/* now destroying the session id */

if(isset($_SESSION['username']))
{
    $_SESSION=array();
    unset($_SESSION);
    session_destroy();
    echo "session destroyed...";
}
?>