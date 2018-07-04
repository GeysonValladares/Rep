<?php
include_once("usuario.php");
/*<--Creación de objetos-->*/
$objeto=new Objeto;
$crud= new CRUDUsuario;
/*<!--Fin Creación de objetos-->*/
$accion = $_POST['Accion'];


if($accion == "1")
{
    $id = "2";
    $usuario = $_POST['Nombre'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $estado = "1";

    $objeto->IdUsuario=$id;
    $objeto->Nombre=$usuario;
    $objeto->Email=$email;
    $objeto->Password=$password;
    $objeto->Estado=$estado;
    $objeto->Accion=$accion;
    $crud->RegistrarUsuario($objeto);
}
if($accion == "2")
{
    $Nombre = $_POST['Nombre'];
    $Password = $_POST['Password'];
    
    $crud->ConsultarLogin($Nombre,$Password);
}
?>