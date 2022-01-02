<?php
    //Core App Class
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        //Declare our params for the $url position
        protected $params = [];

        //Write a function to test this: print_r($this->getUrl());
        public function __construct() {
            $url = $this->getUrl();

            //Look in 'controllers' for first value, ucwords will capitalize
            //first letter
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                //Will set a new controller
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }

            //Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            //Instantiate it
            $this->currentController = new $this->currentController;
            //Add a controller for url array position 2
            if (isset($url[1])) {
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }
            //Get parameters of the url array, if their aren't any, keep it empty
            $this->params = $url ? array_values($url) : [];

            //Call a callback with an array of params, use built in function:
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);


        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                //Allows you to filter variables as a string/number
                $url = filter_var($url, FILTER_SANITIZE_URL);
                //Breaking it into an array and returning to the browser starting at forward slash
                $url = explode('/', $url);
                return $url;
            }
        }
    }

    