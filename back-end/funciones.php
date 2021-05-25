<?php 

function agregarPlato($resultado,$id,$cantidad=1){
    
    $_SESSION['carrito'][$id] = array(
        'Id_Plato' => $resultado['Id_Plato'],
        'NombrePlato' => $resultado['NombrePlato'],
        'Imagen' => $resultado['Imagen'],
        'Precio' => $resultado['Precio'],
        'cantidad' => $cantidad
    );
    }

function actualizarPlato($id,$cantidad= FALSE){

    if($cantidad){

         $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    }else{
        $_SESSION['carrito'][$id]['cantidad'] += 1;
    }
    
   
    }


function calcularTotal(){

    $total =0;
    if(isset($_SESSION['carrito'])){
        foreach ($_SESSION['carrito'] as $indice =>$value){
            $total += $value['Precio'] * $value['cantidad'];
        }
    }
    return $total;
    
    }
function cantidadPlatos(){
    $cantidad =0;
    if(isset($_SESSION['carrito'])){
        foreach ($_SESSION['carrito'] as $indice =>$value){
            $cantidad++;
        }
    }
    return $cantidad;
    
    }

?>