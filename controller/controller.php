
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
?>
<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'public/phpmailer/src/Exception.php';
require 'public/phpmailer/src/PHPMailer.php';
require 'public/phpmailer/src/SMTP.php';

require_once 'Model/ubicacion.php';
require_once 'Model/usuario.php';
require_once 'Public/phpqrcode/qrlib.php';
require_once 'config/config.php';
class Controller
{
 private $model;
 private $model2;
 private $model3;
 private $model4;
 private $model4_Ticket;
 private $modelo_pais;
 private $modelo_Estado;

 private $model__asistencia;
 private $model__Subcriptores;
 private $model__Subcriptores_ST;
 private $resp;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
        $this->model2 = new Ubicacion();
         $this->model3 = new Ubicacion();
         $this->model4 = new Usuario();

         $this->model4_Ticket = new Usuario();
         $this->modelo_pais= new Ubicacion();

         $this->model__asistencia = new Usuario();
         $this->modelo_Estado = new Ubicacion();
         $this->model__Subcriptores_ST = new Usuario();
    }    

    public function index(){

        //Le paso los datos a la vista

        
        
        
        $pais =new Ubicacion();
        $pais= $this->modelo_pais->ConsultarPais();
 
        $Estado =new Ubicacion();
        $Estado= $this->modelo_Estado->ConsultarEstados();

       

        require("view/Bienvenida.php");

    }

    public function Mainvista(){

        $pais =new Ubicacion();
        $pais= $this->modelo_pais->ConsultarPais();
 
        $Estado =new Ubicacion();
        $Estado= $this->modelo_Estado->ConsultarEstados();

        $Ticket = new Usuario();
        $Ticket = $this->model4_Ticket->Obtener_ticket();

        require("view/index.php");

    }


    public function VistaAnalitica(){

      
      
        require("view/Analytics.php");
    }

    public function VistaReporte(){
    
        require("view/Report.php");

    }

    
    public function VistaSettings(){

       
     

    }




    public function VistaLoggOut(){

        require("View/Login.php");

    }
      

         


    public function IngresarPerfil(){

        //require("view/panel/profile.php");
    }


    public function Guardar(){
      

        $dir ='Public/qr/';
      
        $usuario = new Usuario();
        
        $usuario->nombre = $_REQUEST['nombre'];
        $usuario->apellido = $_REQUEST['apellido'];
        $usuario->cedula = $_REQUEST['cedula'];
        $usuario->email = $_REQUEST['correo'];
      //  $usuario->fecha_nacimiento = $_REQUEST['fecha_na'];
        $usuario->Sexo = $_REQUEST['sexo'];
        $usuario->Intitucion = $_REQUEST['institucion'];
        $usuario->Facultad = $_REQUEST['Facultad'];
        $usuario->ocupacion = $_REQUEST['ocupacion'];
        $usuario->Tipo_Ticket = $_REQUEST['ticket'];
        $usuario->Pais = $_REQUEST['provincia'];
        $usuario->ciudad = $_REQUEST['distrito'];
        
        if($resp= $this->model__asistencia->asisitencia_Lits($usuario)){
            //MODIFICAR REGISTRO
           if($resp->Cedula =$usuario->cedula){
                $_SESSION["Cedula"] = "field-2";
                $_SESSION["div0"] = "<h3>  Cedula Registrada </h3>";
                
                header('Location: ?op=permitido&msg=EL USUARIO YA EXISTE--3&ING=false');  
            }
            /*
            if($resp->Correo =$usuario->email){
               
                $_SESSION["div1"] = "<h3>  Correo Registrado </h3>";
                 $_SESSION["Correo"] = "field-2";
                           
                 header('Location: ?op=permitido&msg=EL USUARIO YA EXISTE--2&ING=false');                
            }
            */
           

            header('Location: ?op=permitido&msg=EL USUARIO YA EXISTE--3&ING=false');  
      }else
      {
           
       
                if(!file_exists($dir))  
                        mkdir($dir);
                    $filename =$dir.$usuario->cedula.'.png';
                    $tamanio = 10;
                    $level = 'M';
                    $frameSize =4;
                    $contenido = $usuario->cedula;//$usuario->cedula;
                     QRcode::png($contenido , $filename, $level , $tamanio, $frameSize );
                                     $this->resp= $this->model->Registrar($usuario);
                 //QRcode::png('code data text');

                             
                 $mail = new PHPMailer(true);
                 $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                 $mail->isSMTP();                                            //Send using SMTP
                 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                 $mail->Username   = constant('CORREO_REMITENTE');                     //SMTP username
                 $mail->Password   = constant('CORREO_PASS');                               //SMTP password
                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                 $mail->Port       = 465;
     
                 //Recipients
                 $mail->setFrom(constant('CORREO_REMITENTE'), 'DS 7 CONGRESO');
                 $mail->addAddress($usuario->email ); 
                 //plantilla HTML
                 $mail->AddEmbeddedImage($filename,'milogo',$usuario->cedula.'.png');
                 $mensajeHTML='
                     <p align="center"> 
                     <img src="https://utp.ac.pa/documentos/2015/imagen/logo_utp_1_72.png" width="100px" height="100px" >
                     </p>
                     <p align="center">SUSCRIPCION EXITOSA</p>
                     <p align="center">Correo:'.$usuario->email.'</p>

                     <p align="center">Cedula :'.$usuario->cedula.'</p>
                    
                     <img  src="cid:milogo"   width="100px" height="100px"  align="center">
                     <p align="center">
                    
                     </p>';
                   //  cid:milogo
     
                 //Content
                 $mail->isHTML(true);                                  //Set email format to HTML
                 $mail->Subject = 'Suscripcion Creada Con exito';
                 $mail->Body    = $mensajeHTML;
                 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                 
                    $mail->send();
                    

                 echo '<meta http-equiv="refresh" content="0;url=?op=Index&ING=true&msg=Registro Correcto-75&ST=true">';
             //    header('Location: ?op=Index&ING=true&msg=Registro Correcto-7979&ST=true');
             
                    header('Location: ?op=Index&ING=true&msg=Registro Correcto-7979&ST=true');
                
              //   echo '<meta http-equiv="refresh" content="0;url=?op=permitido&ING=true">';
      

     //  
        }
        
    }


}


