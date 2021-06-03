<?php
require '../vendor/autoload.php';

$plato = new FastFood\Plato;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['NombrePlato']))
            exit('Completar Nombre');
        
        if(empty($_POST['Descripcion']))
            exit('Completar Descripcion');

        if(empty($_POST['Categoria_Id']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['Categoria_Id']))
            exit('Seleccionar una Categoria válida');    

        
        $_params = array(
            'NombrePlato'=>$_POST['NombrePlato'],
            'Precio'=>$_POST['Precio'],
            'Descripcion'=>$_POST['Descripcion'],
            'Imagen'=> subirImagen(),
            'Id_Categoria'=>$_POST['Categoria_Id']
        );

        $rpt = $plato->registrar($_params);

        if($rpt)
            header('Location: platos/indexGestion.php');
        else
            print 'Error al registrar un plato';

    }


    if ($_POST['accion']==='Actualizar'){
        
        if(empty($_POST['NombrePlato']))
            exit('Completar Nombre');
        
        if(empty($_POST['Descripcion']))
            exit('Completar Descripcion');

        if(empty($_POST['Categoria_Id']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['Categoria_Id']))
            exit('Seleccionar una Categoria válida');    

        
        $_params = array(
            'NombrePlato'=>$_POST['NombrePlato'],
            'Precio'=>$_POST['Precio'],
            'Descripcion'=>$_POST['Descripcion'],
            'Id_Categoria'=>$_POST['Categoria_Id'],
            'Id_Plato'=> $_POST['id']
        );

        if(!empty($_POST['foto_temp']))
            $_params['Imagen'] = $_POST['foto_temp'];

        if(!empty($_FILES['Imagen']['name']))
            $_params['Imagen'] = subirImagen();
            
        $rpt = $plato->actualizar($_params);

        if($rpt)
        header('Location: platos/indexGestion.php');
        else
        print 'Error al actualizar un plato';

        
    }

}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['Id_Plato'];
    $rpt = $plato->eliminar($id);

        if($rpt)
            header('Location: platos/indexGestion.php');
        else
            print 'Error al eliminar un plato';


}


function subirImagen() {

    $carpeta = __DIR__.'/../upload/';

    $archivo = $carpeta.$_FILES['Imagen']['name'];

    move_uploaded_file($_FILES['Imagen']['tmp_name'],$archivo);

    return $_FILES['Imagen']['name'];


}
