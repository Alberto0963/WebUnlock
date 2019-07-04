<?php

    class HomeController extends Controller
    {
        public function __construct()
        {
            //$this->userModel = $this->modelo('userModel');
            
        }
   
        public function index()
        {  
           $this->vista('index');
        }
    }
?>