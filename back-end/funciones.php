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


/*
Funcion donde actualizamos datos del plato en el carrito ,$id que es del get y la cantidad que aun no se sabe
*/
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