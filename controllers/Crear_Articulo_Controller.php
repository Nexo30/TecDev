<?php

class Crear_Articulo_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->resultadoLogin = "";
        $this->view->mensajeC = "";

    }

    public function render()
    {
        $this->view->render('Crear_Articulo/index');

    }

    public function ingresar_articulo()
    {
        //var_dump($this); //desplegar los detalles de una variable
        //echo 'ejecutando crear';
        $msg_imagen;
        $nom_img = "ImagenDefecto.svg";
        $Cod_Art = $_POST['Cod_Art'];
        $Cod_Cat = $_POST['Cod_Cat'];
        $Nombre = $_POST['Nombre'];
        $Marca = $_POST['Marca'];
        $Modelo = $_POST['Modelo'];
        $Descripcion = $_POST['Descripcion'];
        $Precio = $_POST['Precio'];
        $Stock = $_POST['Stock'];

//Si se quiere subir una imagen
        if (isset($_POST['crear'])) {
            //Recogemos el archivo enviado por el formulario
            $Imagen = $_FILES['Imagen']['name'];
            //Si el archivo contiene algo y es diferente de vacio
            if (isset($Imagen) && $Imagen != "") {
                //Obtenemos algunos datos necesarios sobre el archivo
                $tipo = $_FILES['Imagen']['type'];
                $tamano = $_FILES['Imagen']['size'];
                $temp = $_FILES['Imagen']['tmp_name'];
                //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                    $msg_imagen = '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                } else {
                    //Si la imagen es correcta en tamaño y tipo
                    //Se intenta subir al servidor
                    if (move_uploaded_file($temp, '/wamp64/www/tecdev/TecDev/public/imagenes/articulos/' . $Imagen)) {
                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod('/wamp64/www/tecdev/TecDev/public/imagenes/articulos/' . $Imagen, 0777);
                        //Mostramos el mensaje de que se ha subido co éxito
                        $msg_imagen = '<div><b>Se ha subido correctamente la imagen.</b></div>';
                        $nom_img = $_FILES['Imagen']['name'];
                        $msg_imagen = $nom_img;

                    } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        $msg_imagen = '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                        $nom_img = "imagenDefecto.svg";
                    }
                }
            }
        } else {
            $msg_imagen = '<div><b>Error en la imagen.No se envio la imagen por post</b></div>';
            $nom_img = "imagenDefecto.svg";
        }

        if ($this->model->ingresar_articulo(['Cod_Art' => $Cod_Art, 'Cod_Cat' => $Cod_Cat, 'Nombre' => $Nombre, 'Marca' => $Marca, 'Modelo' => $Modelo, 'Descripcion' => $Descripcion, 'Precio' => $Precio, 'Stock' => $Stock, 'Imagen' => $nom_img])) {
            $this->view->mensaje = "Articulo creado con exito";
            $this->view->render('Crear_Articulo/ingresar_articulo');
        } else {
            $this->view->mensaje = "Error al crear el articulo, intentelo de nuevo";
            $this->view->render('Crear_Articulo/ingresar_articulo');
        }
    }

}
