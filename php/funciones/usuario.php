<?php
class CRUDUsuario{
    private $servidor='localhost';
    private $usuario='root';
    private $password='';
    private $basedatos='latam';
    
    
    private function ConectarBD(){
        $conexion=mysqli_connect($this->servidor, $this->usuario, $this->password, $this->basedatos) or die ("Error al conectar con la base de datos");
        return $conexion;
    }
    
    private function CerrarConexion($conexion){
        mysqli_close($conexion);
    }
    
    public function RegistrarUsuario($objeto){
        $conexion=$this->ConectarBD();
        $insertar="INSERT INTO usuario VALUES('$objeto->IdUsuario','$objeto->Nombre','$objeto->Email','$objeto->Password','$objeto->Estado')";
        mysqli_query($conexion,$insertar) or die("Error al registrar");
        echo "Registro agregado correctamente";
    }
    
    public function ConsultarLogin($Nombre,$Password){
        $conexion=$this->ConectarBD();
        $consulta="SELECT * FROM usuario WHERE Nombre='$Nombre' AND Password='$Password'";
        
        $results=mysqli_query($conexion,$consulta) or die("Error al ingresar al sistema");
        $row=mysqli_num_rows($results, MYSQLI_ASSOC);
        $active=$row['active'];
        $count=mysqli_num_rows($results);
        //echo "Registro agregado correctamente";
        if($count==1){
            session_register("myusername");
            $_SESSION['username']=$Nombre;
            header("location: help.php");
        }else{
            echo "Usuario no registrado en el sistema";
        }
    }
}

class Objeto{}
?>