<?php
class Auth {
    public static function check() {
        return isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] == true;
    }

    public static function checkUsername() {
        return isset($_COOKIE['username']) ? $_COOKIE['username'] : false;
    }

    public static function createCookieEmployee($username,$bool) {
        if($bool){
            setcookie('logged_in', true, time() + (86400 * 30), "/");
            setcookie('username', $username, time() + (86400 * 30), "/");
            setcookie('level',2, time() + (86400 * 30), "/");
        }
    }
    public static function createCookieInspector($username,$bool) {
        if($bool){
            setcookie('logged_in', true, time() + (86400 * 30), "/");
            setcookie('username', $username, time() + (86400 * 30), "/");
            setcookie('level',3, time() + (86400 * 30), "/");
        }
    }
    public static function createCookieAdmin($username,$bool) {
        if($bool){
            setcookie('logged_in', true, time() + (86400 * 30), "/");
            setcookie('username', $username, time() + (86400 * 30), "/");
            setcookie('level',4, time() + (86400 * 30), "/");
        }
    }
    public static function createCookieClient($username,$bool) {
        if($bool){
            setcookie('logged_in', true, time() + (86400 * 30), "/");
            setcookie('username', $username, time() + (86400 * 30), "/");
            setcookie('level',1, time() + (86400 * 30), "/");
        }
    }
    public static function checkType() {
        if(self::check() && isset($_COOKIE['level'])){
            return $_COOKIE['level'];
        } else {
            return 0;
        }
    }
    public static function requireLogin() {
        if(!self::check() || !isset($_COOKIE['level'])){
            header("Location: ./authentication-login1.php");
            exit();
        }
    }
    public static function requireLoginClient() {
        if(!self::check() || !isset($_COOKIE['level']) ||!($_COOKIE['level'] == 1)){
            header("Location: ./authentication-login1.php");
            exit();
        }
    }
    public static function requireLoginAdmin() {
        if(!self::check() || !isset($_COOKIE['level']) ||!($_COOKIE['level'] == 4)){
            header("Location: ./adminlogin.php");
            exit();
        }
    }
    public static function requireLoginInspector() {
        if(!self::check() || !isset($_COOKIE['level']) ||!($_COOKIE['level'] == 3)){
            header("Location: ./inspectorlogin1.php");
            exit();
        }
    }
    public static function requireLoginEmployee() {
        if(!self::check() || !isset($_COOKIE['level']) ||!($_COOKIE['level'] == 2)){
            header("Location: ./employeelogin.php");
            exit();
        }
    }

    public static function LoadUserPage(){
        if(self::check() && isset($_COOKIE['level'])){
            if($_COOKIE['level'] == 1) {
                return;
            }
            else if($_COOKIE['level'] == 2) {
                    header('location: employeepage.php');
            } else if($_COOKIE['level'] == 3) {
                header('location: inspectorpage.php');
            } else if($_COOKIE['level'] == 4) {
                header('location: adminpanel.php');
            }
            exit();
                
            
        }
    }
    public static function logout() {
        setcookie('logged_in', '', time() - 3600, '/');
        setcookie('username', '', time() - 3600, '/');
        setcookie('level',1, time() - 3600, "/");
    }
}
