
<?php

class Core
{
    protected $controladorActual = 'HomeController';
    protected $metodoActual = 'index';
    protected $parametros = [];

        // constructor
    public function __construct()
    {
        //print_r($this->getURL());
        $url = $this->getUrl();


        if(file_exists('../app/controllers/' .ucwords($url[0]).'.php'))
        {
            $this->controladorActual = ucwords($url[3]);

            //unset indice
            unset($url[3]);
        }

        //requerir el controlador
        require_once '../app/controllers/' . $this->controladorActual . '.php';
        $this->controladorActual = new $this->controladorActual;

        //checar la segunda parte de la url
        if(isset($url[4]))
        {
            if (method_exists($this->controladorActual, $url[4]))
            {
                //chequear el metodo
                $this->metodoActual = $url[4];
                unset($url[4]);
            }
        }

        // echo $this->metodoActual;
        //obtener parametros
        
        $this->parametros = $url ? array_values($url) : [];

        ///llamar callback con parametros array
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);


    }

    public function getUrl()
    {
       //echo $_GET['uri'];
       if (isset($_GET['uri']))
       {
            $url = rtrim($_GET['uri'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            //var_dump($url);
            return $url;

       }
    }


}

?>
