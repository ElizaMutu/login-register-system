<?php 
    //Load the model and the view
    class Controller {
        public function model($model) {
            //Require model file
            require_once '../app/models/' . $model . '.php';
            //Instantiate model
            return new $model();
        }

        //Load the view (checks for the file)
        public function view($view, $data = []) { //$data - dinamic data that we'll have from db, that we'll pass into the view
            if (file_exists('../app/views/' . $view . '.php')) { //check for the views file
            require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exist.");
            }
        }
    } 