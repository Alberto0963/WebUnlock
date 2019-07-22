<?php
    require_once('CardServiceModel.php');

    class HomeModel
    {
         public function __Construct()
         {
            $card = new CardServiceModel();
            $this->db = new Db();

         }

        public function ObtenerOperadorasMexico()
        {
            $this->db->query('SELECT * FROM operadoras WHERE IDpais= 1');
            $result = $this->db->registros();

            return $result;
        }

        public function ObtenerOperadoraMexico($id)
        {
            $this->db->query('SELECT * FROM operadoras WHERE id= :id && idPais = 1');
            $this->db->bind(':id', $id);
            $result = $this->db->registro();

            return $result;
        }

        public function ObtenerPecioOperadoraMexico($operadora,$tipoServicio)
        {
            $this->db->query('SELECT precioClient FROM serviciosPrecio WHERE IDpais = 1 && operadora = :operadora && IDServicio = :tipoServicio');
            $this->db->bind(':operadora', $operadora);
            $this->db->bind(':tipoServicio', $tipoServicio);
            $result = $this->db->registro();

            return $result;
        }

        public function enviarCorreo($destino, $nombreCliente, $costo,$imei,$servicio,$operadora,$idservicio,$idoperadora)
        {
           if(isset($destino) && !empty($destino)
                && isset($nombreCliente) && !empty($nombreCliente)
                && isset($costo) && !empty($costo)
                && isset($imei) && !empty($imei)
                && isset($servicio) && !empty($servicio)
                && isset($operadora) && !empty($operadora))
           {

                //echo($idservicio.$imei.$idoperadora);
                $folio = $this->ObtenerFolio($idservicio,$imei,$idoperadora)->folio;
                //var_dump($folio);
                $hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
                $hora->format('d-m-Y  G:i a');
                
                    // Pear Mail Library
                $from = 'Mail';
                $to = $destino;
                $subject = $servicio." ".$operadora;
                $body = "
                Hola ".$nombreCliente.",

                Gracias por solicitar la liberación de tu móvil con Codigos de Liberacion por IMEI Mexico (WebUnlock).\n

                Te enviaremos un correo con las instrucciones de liberación una vez hayamos obtenido la información del servidor de códigos correspondiente a tu terminal.
                En la mayoría de los casos, el tiempo de generación del código de desbloqueo para tu terminal es 1 a 12 horas laborables, pero ocasionalmente se pueden retrasar por causas ajenas.
                Entendemos que necesitas tener tu terminal liberado con máxima urgencia y por ello haremos todo lo que esté en nuestras manos para agilizar el proceso de liberación.
                Recuerda que tienes una ventana de 10 minutos para realizar cambios en el pedido o solicitar la cancelación. Revisa bien tu pedido y si detectas algún fallo en los datos que nos has proporcionado, simplemente contesta a este mismo correo, indicándonos las rectificaciones pertinentes. Pasada la ventana de 10 minutos, el pedido se procesa automáticamente y no es posible cancelarlo.
                Si tienes cualquier pregunta con respecto a tu solicitud, por favor, responde directamente a este correo desde la misma cuenta que utilizaste para realizar el pedido. De este modo, podremos atender tu solicitud con mayor velocidad e inmediatez.
                
                Estos son los detalles de tu SOLICITUD ".$folio."
                
                ".$nombreCliente."
                ".$hora->format('d-m-Y  G:i a')."

                - Coste Total: ".$costo." MXN
                - Servicio contratado: ".$servicio."
                - Operador: ".$operadora."
                - IMEI: ".$imei."
                - Correo de Aviso: ".$destino."
                - Tiempo Aproximado Entrega: 1 a 12 horas laborables
                
                Para agilizar el proceso comunicate por los siguientes medios indicando tu folio ".$folio."
                Facebook: https://www.facebook.com/CodigoLiberacionViaIMEI/
                WhatsApp: 871-172-6623";

                $headers = array(
                    'From' => $from,
                    'To' => $to,
                    'Subject' => $subject
                );

                $smtp = mail::factory('smtp', array(
                        'host' => 'ssl://smtp.gmail.com',
                        'port' => '465',
                        'auth' => true,
                        'username' => 'gallegos.h.alberto@gmail.com',
                        'password' => 'ksncnzvcssnwfgve'
                    ));

                $mail = $smtp->send($to, $headers, $body);
                


                if (PEAR::isError($mail)) {
                    return $mail->getMessage();
                } else {

                    return true;
                }
           }
           else 
           {
               return false;
           }
        }

        public function ObtenerFolio($servicio,$imei,$operadora)
        {
            $this->db->query('SELECT folio FROM serviciosVendido WHERE IDServicio = :servicio && IMEI = :IMEI && IDoperadora = :operadora');
            $this->db->bind(':servicio', $servicio);
            $this->db->bind(':IMEI', $imei);
            $this->db->bind(':operadora', $operadora);

            $result = $this->db->registro();
            
            return $result;
        }

        public function ObtenerServicios()
        {

            $this->db->query('SELECT * FROM servicios');
            $result = $this->db->registros();
            
            return $result;
        }
        public function ObtenerServicio($id)
        {

            $this->db->query('SELECT * FROM servicios WHERE id = :id');
            $this->db->bind(':id', $id);

            $result = $this->db->registro();
            
            return $result;
        }

        public function GuardarSolucitudLiberacionMexico($idServicio,$cliente,$correo,$idOperadora,$imei)
        {
            $this->db->query('INSERT INTO serviciosVendido(IDServicio,Cliente,correo,IDoperadora,IMEI) 
                            VALUES (:idServicio,:cliente,:correo,:IDoperadora,:imei)');
            
            $this->db->bind(':idServicio', $idServicio);
            $this->db->bind(':cliente', $cliente);
            $this->db->bind(':correo', $correo);
            $this->db->bind(':IDoperadora', $idOperadora);
            $this->db->bind(':imei', $imei);

            if($this->db->execute())
            {
                return true;
            }
            else 
            {
                return false;    
            }
        }


        public function EnviarDatos()
        {
            $this->db->query('SELECT * FROM ultimosServicios');

            $result = $this->db->registros();
            return $result;
        }


    }

?>