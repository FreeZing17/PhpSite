<?php


class File extends Controller {

    public function send() {
        $file = $this->model('FileModel');
        if (isset($_POST['date'])) {
            $file->sendSingleFile();
            $_POST['date'] = null;
        }
        $this->view('file/send', $file->displayOptions());
    }

    public function all() {
        $files = $this->model('FileModel');

        $this->view('file/all', $files->displayAll());
    }

    public function received() {
        $files = $this->model('FileModel');

        $this->view('file/received', $files->displayReceived());
    }

    public function sent() {
        $files = $this->model('FileModel');

        $this->view('file/sent', $files->displaySent());
    }
}