<?php

    //Clase para conectarse a la base de datos
    class BD
    {
        private $host = DB_HOST;
        private $usuario = DB_USER;
        private $pass = DB_PASS;
        private $dbName = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct()
        {
            // configurar conexion

            $dsn = 'mysql:host='. $this->host .';dbname=' .$this->dbName;

            $opciones = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //crear una instancia de pdo

            try
            {
                $this->dbh = new PDO($dsn, $this->usuario, $this->pass, $opciones);
                $this->dbh->exec('set names utf8');

            }
            catch(PDOException $e)
            {
                $this->error = $e->getMessage();
                echo $this->error;

            }

        }

        //preparamos la consulta
        public function query($sql)
        {
            $this->stmt = $this->dbh->prepare($sql);
            
        }

        //vinculamos la consulta con bind
        public function bind($parameters, $value, $type = null)
        {
            if(is_null($type))
            {
                switch(true)
                {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;

                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }

            $this->stmt->bindValue($parameters, $value, $type);

        }


        //ejecuta la consulta
        public function execute()
        {
            //$this->stmt->execute();
            return $this->stmt->execute();
        }

        //obtener los registros
        public function registros()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);

        }

        //obtener los registro
        public function registro()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);

        }

        //obtener contidad de filas con el metodo rowCount
        public function rowCount()
        {
            return $this->stmt->rowCount();

        }
    }
?>