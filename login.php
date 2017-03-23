<?php
/**
 * Money Banks Login
 * User: geoffreytrenard
 * Date: 3/23/17
 * Time: 6:33 AM
 */

// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

// Create a users array
if (empty($_SESSION['fxUsers']))
    $_SESSION['fxUsers'] = array();

// Create a table of users
$users = array();
$users['gtrenard'] =
    array('username' => 'gtrenard', 'password' => 'abc123');
$users['mgraziano'] =
    array('username' => 'mgraziano', 'password' => '123abc');
$users['tester'] =
    array('username' => 'tester', 'password' => 'xyz789');


require_once( 'LoginDataModel.php' );
require_once('FxDataModel.php');
$loginDataModel = new LoginDataModel();
$fxUsers = $loginDataModel->getFxUsers();
$usersArray = $loginDataModel->getUsersArray();

$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST[$iniArray[FxDataModel::USER_NAME]]);
    $password = test_input($_POST[$iniArray[FxDataModel::PASS_WORD]]);
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        //Render fxCalc.php when form is valid
        include 'fxCalc.php';
    }
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
        <label>Username</label><input name="username" value="" type="text" /><br /><br />
        <label>Password</label><input name="password" value="" type="password" /><br /><br />
        <input type="submit" value="Login"/>
        <input type="reset"/>
    </center>
</form>
</body>
</html>