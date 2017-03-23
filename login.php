<?php
/**
 * Money Banks Login
 * User: geoffreytrenard
 * Date: 3/23/17
 * Time: 6:33 AM
 */
session_start();
// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');

// Require once the Data Model Classes
require_once( 'LoginDataModel.php' );
require_once('FxDataModel.php');

// Instantiate the objects in LoginDataModel
$loginDataModel = new LoginDataModel();
$fxUsers = $loginDataModel->getFxUsers();
$usersArray = $loginDataModel->getUsersArray();

// Create a users array
if (empty($_SESSION['fxUsers']))
    $_SESSION['fxUsers'] = array();

//Set username and password to empty stringsf
$username = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST) & !empty($_POST)) {
        $username = $_POST[$usersArray[LoginDataModel::USER_NAME]];
        $password = $_POST[$usersArray[LoginDataModel::PASS_WORD]];

        //Render fxCalc.php when form is valid
        include 'fxCalc.php';
    }
    else return ;
}





?>
<html>
<head>
    <title>Money Banks Login</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <style>
        label{
            padding-right: 10px;
        }
    </style>
</head>
<body>
<h1 align="center">Money Banks Login</h1>
<hr />
<br />
<form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <center>
        <label>Username</label><input name="<?php echo $usersArray[LoginDataModel::USER_NAME] ?>" value="" type="text" /><br /><br />
        <label>Password</label><input name="<?php echo $usersArray[LoginDataModel::PASS_WORD] ?>" value="" type="password" /><br /><br />
        <input type="submit" value="Login"/>
        <input type="reset"/>
    </center>
</form>
</body>
</html>