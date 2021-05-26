<?php 

namespace FastFood;

class Plato{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__ . '/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'],$this->config['clave'],array(

            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        )); 
    }
    public function registrar($_params){
        $sql = "INSERT INTO `plato` (`NombrePlato`, `Precio`, `Descripcion`, `Imagen`, `Id_Categoria`) VALUES (:NombrePlato, :Precio, :Descripcion, :Imagen, :Id_Categoria)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":NombrePlato" => $_params['NombrePlato'],
            ":Precio" => $_params['Precio'], 
            ":Descripcion"=> $_params['Descripcion'], 
            ":Imagen" => $_params['Imagen'],
            ":Id_Categoria" => $_params['Id_Categoria']
        );

        if($resultado->execute($_array))
            return true;
        
        return false;
    }

    public function actualizar($_params){
        $sql = "UPDATE `plato` SET `NombrePlato`=:NombrePlato,`Precio`=:Precio,`Descripcion`=:Descripcion,`Imagen`=:Imagen, `Id_Categoria`=:Id_Categoria WHERE `Id_Plato`=:Id_Plato";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":NombrePlato" => $_params['NombrePlato'],
            ":Precio" => $_params['Precio'], 
            ":Descripcion"=> $_params['Descripcion'], 
            ":Imagen" => $_params['Imagen'],
            ":Id_Categoria" => $_params['Id_Categoria'],
            ":Id_Plato" => $_params['Id_Plato']
        );

        if($resultado->execute($_array))
            return true;
        
        return false;
    }

    public function eliminar($Id_Plato){
        $sql= "DELETE FROM `plato` WHERE `Id_Plato`=:Id_Plato";  
        $resultado = $this->cn->prepare($sql);     
        $_array = array(
            ":Id_Plato" => $Id_Plato
        );

        if($resultado->execute($_array))
            return true;
        
        return false; 
    }

    public function mostrar(){

        $sql="SELECT plato.Id_Plato,NombrePlato,Precio,Descripcion,nombre,Imagen 
        FROM plato 
        INNER JOIN categoria 
        on plato.Id_Categoria = categoria.Id_Categoria ORDER BY plato.Id_Categoria DESC";


      $resultado = $this->cn->prepare($sql);
        
      if($resultado->execute())
          return $resultado->fetchAll();
      
      return false;
        
    }

    public function mostrarPorId($Id_Plato){
        $sql="SELECT * FROM `plato` WHERE `Id_Plato`=:Id_Plato";

      $resultado = $this->cn->prepare($sql);
      $_array = array(
        ":Id_Plato" => $Id_Plato
        );

      if($resultado->execute($_array))
          return $resultado->fetch();
      
      return false;
    }
     
}
