<?php
class Pages extends Controller {
    public function __construct() {
       $this->userModel = $this->model('User');
    }
    
    public function index() {
     //   $this->view('pages/index');
     //12/31/21 Testing the new users added in the  DB
        $users = $this->userModel->getUsers();
        //Create an associative array object of $users
        $data = [
            'title' => 'Home Page',
            'users' => $users
        ];

        $this->view('pages/index', $data);
    }


    public function about() {
        $this->view('pages/about');
    }
}



