<!-- 12/30/21 Controller class in the libraries folder -->
<?php
//Load the model and the view
class Controller {
    public function model($model) {
        //Require model file
        require_once '../app/models/' . $model . '.php';
        //Instantiate the model-return new one
        return new $model();

    }
//view takes 2 params, the data array is passed from the database
    public function view($view, $data = []) {
        //Check to see if the view file actually exists with a php extension
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exist.");
        }

        }
    }


