<?php



class User extends Controller {
    public function reg() {
        $data = [];
        if(isset($_POST['email'])) {
            $user = $this->model('UserModel');
            $user->setData($_POST['email'], $_POST['login'], $_POST['pass']);

            $isValid = $user->validForm();
            if ($isValid == "Верно") {
                $_SESSION['messageErr'] = null;
                $user->addUser();
            }
            else
                $_SESSION['messageErr'] = $isValid;
        }
        $this->view('home/index', $data);
    }

    public function dashboard() {

        $user = $this->model('UserModel');

        if(isset($_POST['exit_btn'])) {
            $user->logOut();
            exit();
        }


        $this->view('user/home', $user->getUser());
    }

    public function auth() {

        $data = [];
        if(isset($_POST['email'])) {
            $user = $this->model('UserModel');
            $data['message'] = $user->auth($_POST['email'], $_POST['pass']);
        }

        $this->view('user/auth', $data);
    }
}