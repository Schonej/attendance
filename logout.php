<?php 
//This includes the session_start() to resume the session on this page. It indentifies the session that needs to be destroyed. 
include_once 'includes/session.php';

//Session_destroy() destorys the session. Then the header() function redirects to the home page. 
    session_destroy();
    header('Location: index.php');
?>
