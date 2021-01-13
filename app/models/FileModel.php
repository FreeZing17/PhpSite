<?php
require 'DB.php';


class FileModel {
    private $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function sendSingleFile() {


        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $filename = rand(1000, 10000) . "-" . $_FILES["file"]["name"];
            $tname = $_FILES["file"]["tmp_name"];
            $uploads_dir = 'public/media';
            move_uploaded_file($tname, $uploads_dir . '/' . $filename);
            $sender = $this->getName();
            $recipient = $_POST["filename"];

            $conn = mysqli_connect('localhost','root','root','fileload');
            $sql = "INSERT into files(title, media, sender, recipient) VALUES('$title','$filename','$sender', '$recipient')";
            if(mysqli_query($conn,$sql)){

                echo '<script language="javascript">';
                echo 'alert("файл успешно отправлен")';
                echo '</script>';
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("ошибка при загрузке")';
                echo '</script>';
            }
        }
    }

    public function displayOptions() {
        $result = $this->_db->query("SELECT * FROM `users` ORDER BY `id` DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function displayAll() {
        $result = $this->_db->query("SELECT * FROM `files` ORDER BY `id` DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function displayReceived() {
        $login = $this->getName();
        $result = $this->_db->query("SELECT * FROM `files` WHERE `recipient`='$login' ORDER BY  `id` DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getName() {
        $email = $_COOKIE['login'];
        $result = $this->_db->query("SELECT `login` FROM `users` WHERE `email`='$email' LIMIT 1");
        return implode($result->fetch(PDO::FETCH_ASSOC));
    }

    public function displaySent() {
        $login = $this->getName();
        $result = $this->_db->query("SELECT * FROM `files` WHERE `sender`='$login' ORDER BY  `id` DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}