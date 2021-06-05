<?php

namespace FastFood;

class Pago
{

    private $config;
    private $cn = null;

    public function __construct()
    {

        $this->config = parse_ini_file(__DIR__ . '/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }


    //---------------------------------------------

    public function registrarPago($_params)
    {
        $sql = "INSERT INTO `pago`(`IdPedido`,`Total`, `FechaPago`, `TipoPago`) 
        VALUES (:IdPedido,:Total,:FechaPago,:TipoPago)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":IdPedido" => $_params['IdPedido'],
            ":Total" => $_params['Total'],
            ":FechaPago" => $_params['FechaPago'],
            ":TipoPago" => $_params['TipoPago']
        );

        if ($resultado->execute($_array))
            return  true;

        return false;
    }

    
    //---------------------------------------------


    public function registrarDetallePago($_params)
    {
        $sql = "INSERT INTO `detallepago`(`FechaDetalle`, `TotalDetalle`, `Id_Pago`) 
        VALUES (:FechaDetalle,:TotalDetalle,:Id_Pago)";


        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":FechaDetalle" => $_params['FechaDetalle'],
            ":TotalDetalle" => $_params['TotalDetalle'],
            ":Id_Pago" => $_params['Id_Pago']
        );

        if ($resultado->execute($_array))
            return  true;

        return false;
    }




    
    //---------------------------------------------




    //este puede ser con id de cliente
//vamos a mostrar solo el tipo de pago
    public function mostrarPago()
    {
        $sql = "SELECT t.Id_Pago,t.IdPedido,t.Total,t.FechaPago,t.TipoPago FROM pago t WHERE t.Id_Pago = ( SELECT MAX( Id_Pago ) FROM pago)";


        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return  $resultado->fetchAll();

        return false;
    }



    public function mostrarDetallePago()
    {
        $sql = "SELECT t.Id_Detalle, t.FechaDetalle, t.TotalDetalle,t.Id_Pago FROM detallepago t WHERE t.Id_Detalle = ( SELECT MAX( Id_Detalle ) FROM detallepago)";


        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return  $resultado->fetchAll();

        return false;
    }


//mostrar detalle pago






    
    //este tambien puede ser
    public function mostrarDetallePedido()
    {
        $sql = "SELECT dp.IdDetPedido, p.NombrePlato,p.Imagen,p.Precio,dp.Cantidad,pedido.Total,
        (dp.PrecioUnit*dp.Cantidad) AS TotalP
        FROM plato p
        INNER JOIN detallepedido dp
        ON p.Id_Plato = dp.IdPlato
        INNER JOIN pedido
        on dp.IdPedido=pedido.Id_Pedido
        WHERE dp.IdPedido = ( SELECT MAX( IdPedido ) FROM detallepedido)";

        $resultado = $this->cn->prepare($sql);
        if ($resultado->execute())
            return  $resultado->fetchAll();

        return false;
    }




    public function mostrarPedido()
    {
        $sql = "SELECT t.Id_Pedido, t.Total, t.FechaPedido,t.Id_Cliente FROM pedido t WHERE t.Id_Pedido = ( SELECT MAX( Id_Pedido ) FROM pedido)";

        $resultado = $this->cn->prepare($sql);
        if ($resultado->execute())
            return  $resultado->fetchAll();

        return false;
    }






    public function mostrarCorreo(){
        $sql = "SELECT t.Id_Cliente,t.Nombre,t.Apellido,t.Celular,t.Direccion, t.Correo FROM cliente t WHERE t.Id_Cliente = ( SELECT MAX( Id_Cliente ) FROM cliente)";
        
        $resultado = $this->cn->prepare($sql);
        if ($resultado->execute())
        return  $resultado->fetchAll();

    return false;
    }

}
