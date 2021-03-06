<?php
//Si se quiere subir una imagen
if (isset($_POST['subir'])) {
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
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
        } else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($temp, 'imagenes/articulos' . $Imagen)) {
                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod('imagenes/articulos' . $Imagen, 0777);
                //Mostramos el mensaje de que se ha subido co éxito
                echo '<div><b>Se ha subido correctamente la imagen.</b></div>';

            } else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
        }
    }
}
