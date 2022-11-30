<?php
@session_start();// Comienzo de la sesión

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
       
    if(<?php   if(isset($_GET['ING'])){ echo "true";}else{echo "false";}?>     ){  
        if(<?php if(isset($_GET['ING'])){$opcion=$_GET['ING']; echo $opcion; }else{echo "false";}  ?>)
        {    
Swal.fire({
  icon: 'success',
  title: 'SUSCRIPCION EXITOSA',
  text: 'EXITOSA'
  
   //,  footer: '<a href="">-----</a>'
})


        }else{
            Swal.fire({
  icon: 'error',
  title: 'ASISTENCIA',
  text: 'ERROR DE REGISTRO',
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
        <div class="progress-bar">

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
        <form class="form-horizontal form-material" name="formulario" method="POST" action="./?op=Registart_Subcritor" enctype="multipart/form-data">

          
<!-- -->



<div class="page slide-page">
              <div class="title">
                Informacion Basica:
              </div>
              <div class="field">
                <div class="label">
                  Primer Nombre
                </div>
                <!--            NAME    -->
                <!--                     -->
                <input name="nombre" id="nombre" type="text" placeholder="Digite su nombre">
              </div>
              <div class="field">
                <div class="label">
                  Segundo Nombre 
                </div>
                <input name="apellido" id="apellido" type="text" placeholder="Digite su Apellido">
              </div>
              <div class="<?php echo $_SESSION["Correo"]  ?>">
                <div class="label">
                  Cedula/Pasaporte <?php echo $_SESSION["div0"]  ?>
                </div>
                <input  name="cedula" id="cedula" type="text"  placeholder="X-XXXX-XXXX">
              </div>
              <div class=" <?php echo $_SESSION["Correo"]  ?>">
                <div class="label">
                  Correo  <?php echo $_SESSION["div1"]  ?>
                </div>
                <input  name="correo" id="correo" type="email" placeholder="Ejemplo@gmail.com">
              </div>
              <div class="field">
                <button  class="firstNext next">Siguiente</button>
              </div>
            </div> 


            <!--                       -->
            <div class="page">
              <div class="title">
                Localizacion
              </div>

              <div class="field">
                <div class="label">
                  Pais
                </div>
                <select name="provincia" id="provincia" onchange="SelectDistrito()"  class="form-control">
                                        <?php foreach ($pais as $p){ ?>
                                            
                                            <option value="<?php echo $p->id_Pais; ?>"> <?php echo $p->Pais_nombre; ?> </option>
                                        <?php } ?>      
                                            </select>
              </div>

              <div class="field">
                
              <div class="label">
                  Estado
                </div>
                
                <select name="distrito" id="distrito"  class="form-control">
                </select>
                        

              </div>

              

              <div class="field">
                <div class="label">
                  Institución / Entidad / Universidad
                </div>
                <input name="institucion" id="institucion" type="text">
              </div>

              <div class="field">
                <div class="label">
                  Unidad/Departamento/Facultad
                </div>
                <input name="Facultad" id="Facultad" type="text">
              </div>
                
              <div class="field btns">
                <button class="prev-1 prev">Anterior</button>
                <button class="next-1 next">Siguiente</button>
              </div>
            </div>

            <div class="page pag2">
              <div class="title">
                Informacion Basica:
              </div>
              <div class="field">
                <div class="label">
                  Fecha De nacimiento
                </div>
                <input name="fecha_na" id="fecha_na" type="date">
              </div>
              <div class="field">
                <div class="label">
                  Sexo
                </div>
                <select id="sexo" name="sexo">
                  <option>M</option>
                  <option>F</option>
                  
                </select>
              </div>
              <div class="field">
                <div class="label">
                 Ocupacion
                </div>
                <select id="ocupacion" name="ocupacion">
                  <option>Estudiante</option>
                  <option>Educador </option>
                  <option>Visitante</option>
                  </select>
              </div>
              
              <div class="field">
                <div class="label">
                INTERES
                </div>
                <select id="interes" name="interes">
                  <option>Ciencia e Ingeniería de Materiales, Ciencias Básicas y Espaciales</option>
                  <option>Biociencias, Biotecnología, Biomedicina y Agroindustrias</option>
                  <option>Robótica, Percepción e Inteligencia Artificial</option>
                  <option>Educación en Ingeniería y Ciencias Sociales</option>
                  <option>Infraestructura, Construcción y Edificaciones</option>
                  <option>Logística, Innovación y Ciencias Empresariales</option>  
                  <option>Sistemas Inteligentes y TIC</option>
                  <option>Otro(s)</option>
                </select>
              </div>

              <div class="field btns">
                <button class="prev-2 prev">Anterior</button>
                <button class="next-2 next">Siguiente</button>
              </div>
            </div>
            <div class="page pag3">
              <div class="title">
                Detalles del la incripcion
              </div>
              
              <div class="field">
                <div class="label">
                 Tipo de ticket
                </div>
                <select name="ticket" id="ticket">
                <?php foreach ($Ticket as $lt){?>
                  <option value="<?php echo $lt->ID_Ticket; ?>" ><?php echo $lt->Descripcion; ?></option>
              
                  <?php }?>
                </select>
              </div>

              <div class="field">
                <div class="label">
                  Tipo de pago
                </div>
               <select>
                  <option>Yappy</option>
                  
                  <option>VISA</option>
                  
                </select>
                <!-- 
 <input  type="radio"> 
                <input  type="radio"> 

                
-->
</div>
              <div class="field btns">
                <button class="prev-3 prev">Anterior</button>
                <button class="next-3 next">Siguiente</button>  <!--  next-3 next   -->
              </div>
            </div>

            <div class="page">
              <div class="title">
                Facturacion 
              </div>
              <div class="Cont label">
                <h3>Subtotal </h3>
                <h4 name="Precio" id="Precio">USD </h4>
             </div>
              <div class="Cont label">
                 <h3>  Payment processing commission 5%  </h3>
                 <h4>USD 15.00</h4>
              </div>

              <div class="Cont label">
                <h3> Payment processing commission </h3>
                <h4>USD 0.50 </h4>
             </div>

             <div class="Cont label top">
              <h2>Subtotal </h2>
              <h4>USD 315.50 </h4>
             </div>
              <!--  
              <div class="field">
                <div class="label">
                  Hola
                </div>
                <input type="password">
              </div>
              -->
              <div class="field btns">
                <button class="prev-4 prev">Anterior</button>
                <button class="submit">Registrarse</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    
    
    
      <script src="Public/js/script.js"></script>
   
    </body>
    
    </html>
</body>


</html>
