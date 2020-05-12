<?php 
 //Conexion con la base de datos.
 $conexion= new mysqli("localhost","root", "toor");
   
 if($conexion->connect_errno){
      echo "Fallo al conectar a MySQL:(". $conexion->connect_errno.")";
 }
 else{
 $conexion->select_db("login");
      
 //declaramos como variables a los campos de texto del formulario.
 $nombre=$_POST["usuario"];
 $password=$_POST["password"];

 //Consulta del usuario y el password
 $consulta="SELECT username,password FROM usuario 
 WHERE username='$nombre' and password='$password'";
 if($query= $conexion->query($consulta)){
 $row=$query->fetch_array(); 
 $nr =$query->num_rows; 
 //Si existe el usuario lo va a redireccionar a la pagina de Bienvenida.
 if($nr == 1){ 
   header ("Location:bienvenido.php"); 
 }
 //Si no existe lo va a enviar al login otra vez.
 else if($nr <= 0) { 
               header("Location:index.php"); 
 }  
 }
 else{
 echo $conexion->error;  
 }
}  
?>