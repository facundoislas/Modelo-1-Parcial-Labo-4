<?php
//include_once "AccesoDatos.php";
require_once 'AccesoDatos.php';
class producto
{
    public $id;
    public $descripcion;
    public $tipo;
    public $precio;
    public $fechaDeVencimiento;
    public $rutaDeFoto;

    
    public function InsertarproductoParametros()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into productos (descripcion,tipo,precio, fechaDeVencimiento, rutaDeFoto)
                values(:descripcion,:tipo,:precio, :fechaDeVencimiento, :rutaDeFoto)");
            $consulta->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
            $consulta->bindValue(':precio',$this->precio, PDO::PARAM_STR);
            $consulta->bindValue(':fechaDeVencimiento', $this->fechaDeVencimiento, PDO::PARAM_STR);
            $consulta->bindValue(':rutaDeFoto', $this->rutaDeFoto, PDO::PARAM_STR);
            $consulta->execute();	
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
			//return $consulta->fetchAll(PDO::FETCH_CLASS, "producto");	
    }

    public static function TraerTodoLosProductos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from productos");
            $consulta->execute();	
            if($consulta->rowCount() == 0){
                return false;   
            }			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "producto");		
    }
    
    public static function TraerProductoID($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from productos where id = '$id'");
			$consulta->execute();
            $EmpAux= $consulta->fetchObject('producto');
            if($consulta->rowCount() == 0){
                return false;   
            }
			return $EmpAux;		
    }
    
    public static function TraerDescripcion($auxdescripcion) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from productos where descripcion = '$auxdescripcion'");
			$consulta->execute();
            $EmpAux= $consulta->fetchObject('producto');
            if($consulta->rowCount() == 0){
                return false;   
            }
            return $EmpAux;	
	}

   
    public static function BorrarProductoID($id)
    {
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
       $consulta =$objetoAccesoDato->RetornarConsulta("
           delete 
           from productos 				
           WHERE id=:id");	
       $consulta->bindValue(':id',$id, PDO::PARAM_INT);		
       $consulta->execute();
       return $consulta->rowCount();
    }

    public function ModificarProductoID($auxID)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE productos set precio=:precio,descripcion=:descripcion,tipo=:tipo, fechaDeVencimiento=:fechaDeVencimiento, rutaDeFoto=:rutaDeFoto WHERE id=$auxID");
            //$consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
            $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
            $consulta->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
            $consulta->bindValue(':rutaDeFoto', $this->rutaDeFoto, PDO::PARAM_STR);
            $consulta->bindValue(':fechaDeVencimiento', $this->fechaDeVencimiento, PDO::PARAM_STR);
            $consulta->execute();
            return $consulta->rowCount();
    }


}
?>