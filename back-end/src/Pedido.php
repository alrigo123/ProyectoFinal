<?php

namespace FastFood;

class Pedido
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
        $sql = "INSERT INTO `pedido`(`Total`, `FechaPedido`, `Id_Cliente`) 
        VALUES (:Total,:FechaPedido,:Id_Cliente)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":Total" => $_params['Total'],
            ":FechaPedido" => $_params['FechaPedido'],
            ":Id_Cliente" => $_params['Id_Cliente']

        );

        if ($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }

    public function registrarDetalle($_params)
    {
        $sql = "INSERT INTO `detallepedido`(`IdPlato`, `IdPedido`, `PrecioUnit`, `Cantidad`) 
        VALUES (:IdPlato,:IdPedido,:PrecioUnit,:Cantidad)";


        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":IdPlato" => $_params['IdPlato'],
            ":IdPedido" => $_params['IdPedido'],
            ":PrecioUnit" => $_params['PrecioUnit'],
            ":Cantidad" => $_params['Cantidad']
        );

        if ($resultado->execute($_array))
            return  true;

        return false;
    }

    public function mostrar()
    {
        $sql = "SELECT p.Id_Pedido, Nombre, Apellido, Correo, Direccion, Total, FechaPedido FROM pedido p 
        INNER JOIN cliente c ON p.Id_Cliente = c.Id_Cliente ORDER BY p.Id_Cliente DESC";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return  $resultado->fetchAll();

        return false;
    }
    public function mostrarUltimos()
    {
        $sql = "SELECT p.Id_Pedido, Nombre, Apellido, Correo, Direccion, Total, FechaPedido FROM pedido p 
        INNER JOIN cliente c ON p.Id_Cliente = c.Id_Cliente ORDER BY p.Id_Cliente DESC LIMIT 10";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return  $resultado->fetchAll();

        return false;
    }



    //este puede ser

    public function mostrarPorId($id)
    {
        $sql = "SELECT p.Id_Pedido, Nombre, Apellido, Correo, Direccion, Total, FechaPedido FROM pedido p 
        INNER JOIN cliente c ON p.Id_Cliente = c.Id_Cliente WHERE p.Id_Pedido = :Id_Pedido";


        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':Id_Pedido' => $id
        );

        if ($resultado->execute($_array))
            return  $resultado->fetch();

        return false;
    }


    //este tambien puede ser
    public function mostrarDetallePorIdPedido($id)
    {
        $sql = "SELECT 
        dp.IdDetPedido,pl.NombrePlato,dp.PrecioUnit,dp.Cantidad,pl.Imagen
        FROM detallepedido dp
        INNER JOIN plato pl ON pl.Id_Plato= dp.IdPlato
        WHERE dp.IdPedido = :Id_Plato";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':Id_Plato' => $id
        );

        if ($resultado->execute($_array))
            return  $resultado->fetchAll();

        return false;
    }
}
