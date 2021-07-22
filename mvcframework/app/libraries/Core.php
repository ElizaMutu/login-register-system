<?php
    //Core App Class
    class Core {
        protected $currentController = 'Pages'; //if there are no other controllers in the controller file, this page will be automatically loaded
        protected $currentMethod = 'index';//inside the Page controller it will load the index method
        protected $params = [];//empty array

        public function __construct() {
            $url = $this->getUrl();

            //Look in 'controllers' for first value, ucwords will capitalize first letter
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->currentController = ucwords($url[0]);//will set a new controller
                unset($url[0]);
            }

            //Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //Check for the second part of the URL
            if (isset($url[1])) {
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    //Unset 1 index
                    unset($url[1]);
                }
            }
            //Get parameters
            $this->params = $url ? array_values($url) : [];//checking if there are any params...if not, keep it empty

            //Call a callback with array of params
            call_user_func_array([$this->currentController,   $this->currentMethod], $this->params);
        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');//gets rid of the / at the end of the url

                $url = filter_var($url, FILTER_SANITIZE_URL);//filters variable as a string/number; not allowing characters that the url should not have

                $url = explode('/', $url);//breaking it into an array
                return $url;
            }
        }
    }