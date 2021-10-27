<?php

class Crear_Articulo_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";

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
        $cod_art = $_POST['cod_art'];
        $cod_cat = $_POST['cod_cat'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $url_img = $datos['url_img'];

//Si se quiere subir una imagen
        if (isset($_POST['crear'])) {
            //Recogemos el archivo enviado por el formulario
            $archivo = $_FILES['archivo']['name'];
            //Si el archivo contiene algo y es diferente de vacio
            if (isset($archivo) && $archivo != "") {
                //Obtenemos algunos datos necesarios sobre el archivo
                $tipo = $_FILES['archivo']['type'];
                $tamano = $_FILES['archivo']['size'];
                $temp = $_FILES['archivo']['tmp_name'];
                //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                    $msg_imagen = '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                } else {
                    //Si la imagen es correcta en tamaño y tipo
                    //Se intenta subir al servidor
                    if (move_uploaded_file($temp, '/wamp64/www/tecdev/TecDev/public/imagenes/articulos/' . $archivo)) {
                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod('/wamp64/www/tecdev/TecDev/public/imagenes/articulos/' . $archivo, 0777);
                        //Mostramos el mensaje de que se ha subido co éxito
                        $msg_imagen = '<div><b>Se ha subido correctamente la imagen.</b></div>';
                        $nom_img = $_FILES['archivo']['name'];
                        $msg_imagen = $nom_img;
                    } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        $msg_imagen = '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                    }
                }
            }
        } else {
            $msg_imagen = '<div><b>Error en la imagen.No se envio la imagen por post</b></div>';
        }

        if ($this->model->ingresar_articulo(['cod_art' => $cod_art, 'cod_cat' => $cod_cat, 'nombre' => $nombre, 'marca' => $marca, 'modelo' => $modelo, 'descripcion' => $descripcion, 'precio' => $precio, 'stock' => $precio, 'url_img' => $nom_img])) {
            $this->view->mensaje = "Articulo creado con exito";
            $this->view->render('Crear_Articulo/ingresar_articulo');
        } else {
            $this->view->mensaje = "Error al crear el articulo, intentelo de nuevo";
            $this->view->render('Crear_Articulo/ingresar_articulo');
        }
    }

}
