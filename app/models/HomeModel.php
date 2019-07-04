<?php
    require_once('CardServiceModel.php');

    class HomeModel
    {
         public function __Construct()
         {
            $card = new CardServiceModel();

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