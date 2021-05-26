<?php

namespace FastFood;

class Cliente
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
        $sql = "INSERT INTO `cliente`(`Nombre`, `Apellido`, `Celular`, `Direccion`, `Correo`) 
        VALUES (:Nombre,:Apellido,:Celular,:Direccion,:Correo)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":Nombre" => $_params['Nombre'],
            ":Apellido" => $_params['Apellido'],
            ":Celular" => $_params['Celular'],
            ":Direccion" => $_params['Direccion'],
            ":Correo" => $_params['Correo']
        );

        if ($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }
}
