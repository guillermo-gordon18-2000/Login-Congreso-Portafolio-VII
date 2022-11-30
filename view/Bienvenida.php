<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Step Form</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/5f4c1bb038.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="Public/CSS/style.css">
</head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  window.onload = function(){
    
   
   
    if(<?php   if(isset($_GET['ST'])){ echo "true";}else{echo "false";}?>     ){  
        if(<?php if(isset($_GET['ST'])){$opcion=$_GET['ST']; echo $opcion; }else{echo "false";}  ?>)
        {    
Swal.fire({
  icon: 'success',
  title: 'REGISTRO',
  text: 'EXITOSO'
  
   //,  footer: '<a href="">-----</a>'
})


        }else{
            Swal.fire({
  icon: 'error',
  title: 'ASISTENCIA',
  text: 'USUARIO NO SUSCRITO',
  footer: '<a href="">-----</a>'
})


        }
    
 }



 }
</script>
<script>

var arrayIdDistrito = new Array();
var arrayNomDistrito = new Array();
var arrayIdProvincia = new Array();

var i=1;
// Inicializamos 3 arreglos con los datos de los Ids de las provincias y distritos; ademas, del nombre de los distritos
<?php
$n=0;

foreach ($Estado as $d)  {
    echo "arrayIdDistrito[$n]=$d->id_Estado;";
    echo "arrayNomDistrito[$n]='$d->Nombre_estado';";
    echo "arrayIdProvincia[$n]=$d->Pais;";
    $n++;
    }
 ?>
var n ="<?php echo $n; ?>"; //total de registros

   function SelectDistrito()
{
    var indice=0;
    var valor=0;
    //asignamos a la variable valor el valor de la lista de menú seleccionado
    valor=document.formulario.provincia.value;
    document.formulario.distrito.length=0; //Limpiamos la lista de menu distrito
    for (x=0;x<n;x++) {

        if (valor == arrayIdProvincia[x]  )
        {
        //asigna a la lista de menú sub_areas los nuevos valores segun la selección del menú areas
        document.formulario.distrito[indice]= new Option(arrayNomDistrito[x],arrayIdDistrito[x]);
        indice=indice+1;
        }
        }

  }	
</script>

<body>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>
    
    <body>


      <div class="container Form-image">
        
          
        
        <div style="display: flex; ">
          <img class="Img_utp" src="Public/img/utp.svg" alt="">
          <img class="Img_utp" src="https://congreso.utp.ac.pa/wp-content/uploads/2022/03/logo_iestec_web_color.png" style="width:40%;  margin-right: 80px; " alt="">
        </div>
        <img src="Public/img/undraw_shopping_re_3wst.svg" alt="">
      </div>


      <div class="container">

        <header><h1 >Registrate</h1></header>
        <div class="progress-bar" style="display: none;">

          <div class="step">                    <!---->
            <p>                                   <!---->
              <span class="material-symbols-outlined">
                person
                </span>                               <!---->
            </p>                                     <!---->
            <div class="bullet">                       <!---->
              <span class="span">1</span>                              <!---->
            </div>                                          <!---->
            <div class="check fas fa-check"></div>             <!---->
          </div>

          <div class="step">
            <p>
              <span class="material-symbols-outlined">
                home_pin
                </span>
            </p>
            <div class="bullet">
              <span>2</span>
            </div>
            <div class="check fas fa-check"></div>
          </div>
          <div class="step">
            <p>
              <span class="material-symbols-outlined">
                calendar_month
                </span>
            </p>
            <div class="bullet">
              <span>3</span>
            </div>
            <div class="check fas fa-check"></div>
          </div>
          <div class="step">
            <p>
              <span class="material-symbols-outlined">
                payments
                </span>
            </p>
            <div class="bullet">
              <span>4</span>
            </div>
            <div class="check fas fa-check"></div>
          </div>
          <div class="step">
            <p>
              <span class="material-symbols-outlined">
                request_page
                </span>
            </p>
            <div class="bullet">
              <span>5</span>
            </div>
            <div class="check fas fa-check"></div>
          </div>
        </div>

        <div class="form-outer">
        <form class="form-horizontal form-material" name="formulario" method="POST" action="./?op=permitido" enctype="multipart/form-data">

          
<!-- -->



<div class="page slide-page">

              <div class="title_6">
             <h2>BIENVENIDO </h2>  

              </div>
              <div class="container "style="width: 65%;">
        
          
        
      
        <img src="Public/img/undraw_shopping_re_3wst.svg" style="width: 100%;" alt="" >
      </div>
              
             
              
              <div class="field">
                <button href="?op=permitido" > SUSCRIBETE</button>
              </div>
            </div>


            <!--                       -->
            
          </form>
        </div>
      </div>
    
    
    
      <script src="Public/js/script.js"></script>
   
    </body>
    
    </html>
</body>


</html>
