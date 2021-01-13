<?php
require 'DB.php';

class UserModel {
    private $email;
    private $login;
    private $pass;

    private $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function setData($email, $login, $pass) {
        $this->email = $email;
        $this->login = $login;
        $this->pass = $pass;
    }

    public function validForm() {
        if(strlen($this->email) < 3)
            return "Email слишком короткий";
        else if(strlen($this->login) < 3)
            return "Логин слишком короткий";
        else if(strlen($this->pass) < 3)
            return "Пароль не менее 3 символов";
        else {
            $conn = mysqli_connect('localhost', 'root', 'root', 'fileload');

            if (mysqli_connect_errno()) {
                printf("Соединение не удалось: %s\n", mysqli_connect_error());
                exit();
            }

            $emailQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$this->email'");
            $loginQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$this->login'");

            $rowCntEmail = mysqli_num_rows($emailQuery);
            $rowCntLogin = mysqli_num_rows($loginQuery);
            if($rowCntEmail !== 0) {
                return "Пользователь с таким email уже существует";
            }
            else if($rowCntLogin !== 0) {
                return "Пользователь с таким логином уже существует";
            }
            else {
                return "Верно";
            }
        }
    }

    public function addUser() {
        $sql = 'INSERT INTO users(email, login, pass) VALUES(:email, :login, :pass)';
        $query = $this->_db->prepare($sql);

        $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $query->execute(['email' => $this->email, 'login' => $this->login, 'pass' => $pass]);

        $this->setAuth($this->email);
    }

    public function getUser() {
        $email = $_COOKIE['login'];
        $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function logOut() {
        setcookie('login', $this->email, time() - 3600, '/');
        unset($_COOKIE['login']);
        header('Location: /user/auth');
    }

    public function auth($email, $pass) {
        $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if($user['email'] == '')
            return 'Пользователя с таким email не существует';
        else if(password_verify($pass, $user['pass'])) {
            $this->setAuth($email);
        }
        else
            return 'Пароли не совпадают';
    }

    public function setAuth($email) {
        setcookie('login', $email, time() + 3600, '/');
        header('Location: /home/index');
    }

}