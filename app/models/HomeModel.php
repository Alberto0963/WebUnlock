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
            $this->db->query('SELECT * FROM operadoras WHERE IDpais=1');
            $result = $this->db->registros();

            return $result;
        }

        public function enviarCorreo($destino, $nombreCliente, $costo,$imei,$servicio,$operadora)
        {
            // Pear Mail Library
            $from = 'Mail';
            $to = $destino;
            $subject = $servicio;
            $body = "
            Hola ".$nombreCliente.",

            Gracias por solicitar la liberación de tu móvil con Codigos de Liberacion por IMEI Mexico (WebUnlock).\n

            Te enviaremos un correo con las instrucciones de liberación una vez hayamos obtenido la información del servidor de códigos correspondiente a tu terminal.
            En la mayoría de los casos, el tiempo de generación del código de desbloqueo para tu terminal es 1 a 12 horas laborables, pero ocasionalmente se pueden retrasar por causas ajenas.
            Entendemos que necesitas tener tu terminal liberado con máxima urgencia y por ello haremos todo lo que esté en nuestras manos para agilizar el proceso de liberación.
            Recuerda que tienes una ventana de 10 minutos para realizar cambios en el pedido o solicitar la cancelación. Revisa bien tu pedido y si detectas algún fallo en los datos que nos has proporcionado, simplemente contesta a este mismo correo, indicándonos las rectificaciones pertinentes. Pasada la ventana de 10 minutos, el pedido se procesa automáticamente y no es posible cancelarlo.
            Si tienes cualquier pregunta con respecto a tu solicitud, por favor, responde directamente a este correo desde la misma cuenta que utilizaste para realizar el pedido. De este modo, podremos atender tu solicitud con mayor velocidad e inmediatez.
            
            Estos son los detalles de tu SOLICITUD 2602353
            
            ".$nombreCliente."
            18 jun. 18:23 CEST

            - Coste Total: ".$costo." MXN
            - Servicio contratado: ".$servicio."
            - Operador: ".$operadora."
            - IMEI: ".$imei."
            - Liberacion por IMEI
            - Correo de Aviso: ".$destino."
            - Tiempo Aproximado Entrega: 1 a 12 horas laborables";

            $headers = array(
                'From' => $from,
                'To' => $to,
                'Subject' => $subject
            );

            $smtp = Mail::factory('smtp', array(
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

        public function ObtenerServicios()
        {

            $this->db->query('SELECT * FROM servicios');
            $result = $this->db->registros();
            
            return $result;
        }



        public function EnviarDatos()
        {

            $card = array(
                'CardServiceModel' => array(
                    'id' => '1',
                    'service' => 'Liberacion AT&T',
                    'descripcion' => 'Eliminar el bloqueo de red de AT&T para usarlo en otras operadoras',
                    'imagen' => 'http://www.webunlock.local:8080/images/img_2.jpg'
                ),
                array(
                    'id' => '1',
                    'service' => 'Liberacion AT&T',
                    'descripcion' => 'Eliminar el bloqueo de red de AT&T para usarlo en otras operadoras',
                    'imagen' => 'http://www.webunlock.local:8080/images/img_1.jpg'
                ),
                array(
                    'id' => '1',
                    'service' => 'Liberacion AT&T',
                    'descripcion' => 'Eliminar el bloqueo de red de AT&T para usarlo en otras operadoras',
                    'imagen' => 'http://www.webunlock.local:8080/images/img_1.jpg'
                ),
                array(
                    'id' => '1',
                    'service' => 'Liberacion AT&T',
                    'descripcion' => 'Eliminar el bloqueo de red de AT&T para usarlo en otras operadoras',
                    'imagen' => 'http://www.webunlock.local:8080/images/img_1.jpg'
                )

                );

            return $card;
        }


    }

?>