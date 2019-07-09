<?php

    class HomeController extends Controller
    {
        public function __construct()
        {
            $this->HomeModel = $this->modelo('HomeModel');

            $this->cardServ = $this->HomeModel->EnviarDatos();
            $this->oper = $this->HomeModel->ObtenerOperadorasMexico();
            $this->serv = $this->HomeModel->ObtenerServicios();
        }
        
        public function index()
        {  
            
            // $cardServ = $this->HomeModel->EnviarDatos();
            // $oper = $this->HomeModel->ObtenerOperadorasMexico();
            // $serv = $this->HomeModel->ObtenerServicios();
            //$this->HomeModel->enviarCorreo('alberto.gallegos.h@outlook.com','alberto');
            //$this->HomeModel->enviarCorreo($datos['mail'], $datos['nombre'], $datos['costo'],$datos['imeitext'],$datos['servicio'],$datos['operadora']);

            $datosCarga = 
            [
                'CardServ' => $this->cardServ,
                'oper' => $this->oper,
                'servicios' => $this->serv
            ];
            //var_dump($datosCarga);
            $this->vista('index', $datosCarga);
        }

        public function enviarVistaPrecios()
        {
            $this->vista('viewPrices');
        }

        public function enviarSolicitud()
        {
            //echo 'hjkhkjhkhkj';
            //var_dump($_POST);
            //echo('jhjkhkhj'.$datos->nombre);
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                var_dump($_POST);
                $datos = 
                [
                    'nombre' =>trim($_POST['nombre']),
                    'mail' =>trim($_POST['mail']),
                    'servicio' =>trim($_POST['servicio']),
                    'operadora' =>trim($_POST['operadora']),
                    'imeitext' =>trim($_POST['imeitext']),
                    'costo' =>'300'
                ];
                $email = $this->HomeModel->enviarCorreo($datos['mail'],
                $datos['nombre'], $datos['costo'],$datos['imeitext'],
                $datos['servicio'],$datos['operadora']);

               if($email)
                {
                    redireccionar('/HomeController/index');
                }
                else {
                    echo $email;
                }
            }
        }
    }
?>