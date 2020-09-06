<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  Dompdf\Dompdf;
use App\Empleados;


class formularioController extends Controller
{
public $name;
public $email;
public $delegacion;

public function getAll(){
    try {
      $id=$_REQUEST['number'];
      $id2=$_REQUEST['text'];
        $endpoint = "http://212.225.255.130:8010/ws/accesotec/$id/$id2";
        
        
$xml = file_get_contents($endpoint, false);
$xml = simplexml_load_string($xml);
//print_r($xml->Registro);
$nombre = $xml->Registro['Nombre'];
$email = $xml->Registro['Email'];
$delegacion =$xml->Registro['Delegacion'];


$this->name=$nombre;
$this->email=$email;
$this->delegacion=$delegacion;

//$empleado->setName($nombre);
//$empleado->setEmail($email);
//$empleado->setDelegacion($delegacion);
} catch (Exception $e) {
	// Este bloque de código sólo se ejecuta si se ha producido una 
	// excepción al intentar ejecutar el bloque previo.
	echo "Se ha introducido un usuario y contraseña incorrectos por favor vuelva al login";
	
} 
  
}


     
    
}




?>
<link href="./css/jquery.signaturepad.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="./js/numeric-1.2.6.min.js"></script> 
<script src="./js/bezier.js"></script>
<script src="./js/jquery.signaturepad.js"></script> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
<script src="./js/json2.min.js"></script>
<link href="./css/app_style.css" rel="stylesheet">





<br>
<br>
<br>
<br>
<?php

function testfun()
{
        
           
        $id=13242;
        $endpoint = "http://212.225.255.130:8010/ws/accesotec/$id";
        
        
  $xml = file_get_contents($endpoint, false);
  $xml = simplexml_load_string($xml);
  //print_r($xml->Registro);
  $nombre = $xml->Registro['Nombre'];
  $email = $xml->Registro['Email'];
  $delegacion =$xml->Registro['Delegacion'];
  
          $dompdf = new  Dompdf();
             
           
          $dompdf ->loadHtml('<TABLE>
          
          <TR>
          <TD>Name:</TD>
          <TD>'.$nombre.'</TD>
          </TR>
          <TR>
          <TD>Email:</TD>
          <TD>'.$email.'</TD>
          </TR>
          <TR>
          <TD>Delegacion:</TD>
          <TD>'.$delegacion.'</TD>
          </TR>
          <TR>
          <TD>Firma:</TD>
          <TD></TD>
          </TR>
          </TABLE>');
          // (Opcional) Configure el tamaño y la orientación del papel 
          $dompdf -> setPaper ( 'A4' , 'landscape' );
          
          // Renderiza el HTML como PDF 
          $dompdf -> render ();
          
          // 
           $dompdf -> stream ();
           
          
}

if(array_key_exists('test',$_POST)){
   testfun();
}

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Empleado</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <label for="full_name_id" class="control-label">Nombre</label>
                                <input id="name" name="name" type="text" value="<?php
                                                                                try{
                                                                                $id=$_REQUEST['number'];
                                                                                $endpoint = "http://212.225.255.130:8010/ws/accesotec/$id";


                                                                                $xml = file_get_contents($endpoint, false);
                                                                                $xml = simplexml_load_string($xml);
                                                                                $name = $xml->Registro['Nombre'];
                                                                                echo $name;
                                                                                }catch(Exception $e){

                                                                                }
                                                                                ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <label for="full_email_id" class="control-label">Email</label>
                                <input id="email" name="email" type="text" value="<?php 
                                try{
                                $id=$_REQUEST['number'];
                                $endpoint = "http://212.225.255.130:8010/ws/accesotec/$id";
        
        
                                $xml = file_get_contents($endpoint, false);
                                $xml = simplexml_load_string($xml);
                                $email = $xml->Registro['Email'];
                                echo $email;
                                }catch(Exception $e){

                                }
                                ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <label for="delegacion" class="control-label">Delegacion</label>
                                <input id="delegacion" name="delegacion" type="text" value="<?php
                                try{ 
                                $id=$_REQUEST['number'];
                                $endpoint = "http://212.225.255.130:8010/ws/accesotec/$id";
        
        
                                $xml = file_get_contents($endpoint, false);
                                $xml = simplexml_load_string($xml);
                                $delegacion = $xml->Registro['Delegacion'];
                                echo $delegacion;
                                }catch(Exception $e){
                                    
                                }
                                ?>" class="form-control">
                            </div>
                        </div>
                        
		
                        
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="signArea" class="col-md-12 text-center" >
	                        <h2 class="tag-info">Firme Aqui</h2>
	                        <div class="sig sigWrapper" style="height:auto;">
	                            <div class="typed"></div>
	                            <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
	                        </div>
                        </div>
                        <button id="btnSaveSign" class="btn btn-primary btn-lg">Guardar Firma</button>
		
		<div class="sign-container">
		<?php
		$image_list = glob("./doc_signs/*.png");
		foreach($image_list as $image){
		
		?>
		<img src="<?php echo $image; ?>" class="sign-preview"/>
		<?php
		}
		?>
		</div>
		
		
		<script>
			$(document).ready(function() {
				$('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
			});
			
			$("#btnSaveSign").click(function(e){
				html2canvas([document.getElementById('sign-pad')], {
					onrendered: function (canvas) {
						var canvas_img_data = canvas.toDataURL('image/png');
						var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
						//ajax call to save image inside folder
						$.ajax({
							url: 'actionpdf.php',
							data: { img_data:img_data },
							type: 'post',
							dataType: 'json',
							success: function (response) {
							   window.location.reload();
							}
						});
					}
				});
			});
		  </script> 



<form method="post">
<div class="col-md-12 text-center">
<input type="submit" name="test" class="btn btn-primary btn-lg" value="Generar Pdf" onclick="" />
</div>
</fom>
