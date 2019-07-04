<?php

    class HomeController extends Controller
    {
        public function __construct()
        {
            $this->HomeModel = $this->modelo('HomeModel');
            
        }
   
        public function index()
        {  
            $datos = $this->HomeModel->EnviarDatos();

            $this->vista('index', $datos);
        }
    }
?>