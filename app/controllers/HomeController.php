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
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                
                $servicio = $this->HomeModel->ObtenerServicio($_POST['servicio']);
                $operadora = $this->HomeModel->ObtenerOperadoraMexico($_POST['operadora']);
                $precio = $this->HomeModel->ObtenerPecioOperadoraMexico($operadora->operadoraname,$servicio->id)->precioClient;
                // var_dump($servicio);
                // var_dump($operadora);
                // var_dump($precio);

                $datos = 
                [
                    'nombre' =>trim($_POST['nombre']),
                    'mail' =>trim($_POST['mail']),
                    'servicio' =>trim($servicio->name),
                    'operadora' =>trim($operadora->operadoraname),
                    'imeitext' =>trim($_POST['imeitext']),
                    'costo' => $precio
                ];

                $idoperadora = trim($operadora->id);
                $idServicio = trim($servicio->id);
                
                

                if((count(array_filter($datos)) == count(($datos))))
                {
                    // if($email)
                    //     {

                    if($this->HomeModel->GuardarSolucitudLiberacionMexico($idServicio,$datos['nombre'],$datos['mail'],$idoperadora,$datos['imeitext']))
                    {
                        $email = $this->HomeModel->enviarCorreo($datos['mail'],
                            $datos['nombre'], $datos['costo'],$datos['imeitext'],
                            $datos['servicio'],$datos['operadora'],$idServicio,$idoperadora);

                        if($email)
                        {
                            redireccionar('/HomeController/index');
                        }
                        else 
                        {
                            die('algo salio mal con el correo');
                        }
                    }
                    else 
                    {
                        die('algo salio mal al guardar en la base de datos');
                    }
                            

                }
                {
                    //die('Algo salio mal');
                }
            }
        }

        public function generarCompra()
        {

        }

        public function EnviarCorreo()
        {

        }
    }
?>