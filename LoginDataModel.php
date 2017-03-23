<?php

/**
 * Money Banks Calculator
 * User: geoffreytrenard
 * Date: 3/23/17
 * Time: 6:35 AM
 */
define('USER_INI_FILE', 'fxUsers.ini'); // Define ini file to fxCalc as a constant
define('LOGIN_INI_FILE', 'fxLogin.ini');

class LoginDataModel
{

    // declare these variable as constants
    const USER_NAME = 'username';
    const PASS_WORD = 'password';
    const FX_USER_FILE = 'fx.user.file';

    // Private Data Members
    private $fxUsers;
    private $usersArray;


    public function __construct(){
        $this->usersArray = parse_ini_file(USER_INI_FILE);

        print_r($this->usersArray);
    }

    // Public method that return the associated array.
    public function getUsersArray(){
        return $this->usersArray;
    }

    // Public method to return a array of Country codes
    public function getFxUsers(){
        return $this->fxUsers;
    }

    public function validateUser( $username, $password )
    {
        return array_key_exists( $username, $this->usersArray ) &&
            ( $this->usersArray[ $username ] == $password );
    }

}