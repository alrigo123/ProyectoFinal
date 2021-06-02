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


    public function registrar($_params)
    {
        $sql = "INSERT INTO `pago`(`IdDetPedido`,`Total`, `FechaPago`, `TipoPago`) 
        VALUES (:IdDetPedido,:Total,:FechaPago,:TipoPago)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":IdDetPedido" => $_params['IdDetPedido'],
            ":Total" => $_params['Total'],
            ":FechaPedido" => $_params['FechaPedido'],
            ":Id_Cliente" => $_params['Id_Cliente']
        );

        if ($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }

    public function registrarDetallePago($_params)
    {
        $sql = "INSERT INTO `detallepago`(`FechaDetalle`, `TotalDetalle`, `Id_pago`) 
        VALUES (:FechaDetalle,:TotalDetalle,:Id_pago)";


        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":FechaDetalle" => $_params['FechaDetalle'],
            ":TotalDetalle" => $_params['TotalDetalle'],
            ":Id_pago" => $_params['Id_pago']
        );

        if ($resultado->execute($_array))
            return  true;

        return false;
    }


    //este puede ser con id de cliente

    public function mostrarPago($_params)
    {
        $sql = "SELECT Id_pago, IdDetPedido, Total, FechaPago, TipoPago FROM pago where Id_pago = 4";


        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":Id_pago" => $_params['Id_pago'],
            ":IdDetPedido" => $_params['IdDetPedido'],
            ":Total" => $_params['Total'],
            ":FechaPago" => $_params['FechaPago'],
            ":TipoPago" => $_params['TipoPago']
        );

        if ($resultado->execute($_array))
            return  $resultado->fetch();

        return false;
    }


    //este tambien puede ser
    public function mostrarDetallePedido()
    {
        $sql = "SELECT p.NombrePlato,p.Imagen,p.Precio,dp.Cantidad,pedido.Total,
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
