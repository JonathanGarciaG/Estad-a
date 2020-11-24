<!DOCTYPE html>
<html>
<?php
setlocale(LC_TIME, "spanish");
?>
<head>
	<title>Acuse {{$informacion[0]->id}}</title>
</head>
<body>
<p><img src="logovic.png" width="25%" align="left"> <img src="banner_tam_acuse.jpg" width="30%" align="right"></p>
<br><br><br><br><br><br><br>

<p align="right"><font face="Verdana">Cd. Victoria de Tam. a {{ strftime("%B de %Y") }}</font><br>
No. de oficio DAC/AC/2020<br>
Folio: {{$informacion[0]->id}}-{{ date("Y", strtotime($informacion[0]->created_at)) }}<br>
Expediente: Depto. de Atención a la Ciudadanía<br>
Asunto: PETICIÓN</p>
<p align="left">{{$informacion[0]->nombre_director}} {{$informacion[0]->apellido_p_director}} {{$informacion[0]->apellido_m_director}}<br>
DIRECTOR(A) DE {{$informacion[0]->nombre_direccion}}<br>
PRESENTE</p>
<br><br>
<p>Por este conducto me permito remitir a Usted para su atención procedente a la petición que hiciera la C. {{$informacion[0]->p_nombre}} {{$informacion[0]->p_apellido_p}} {{$informacion[0]->p_apellido_m}}. TEL {{$informacion[0]->p_celular}} de COLONIA {{$informacion[0]->colonia}} en la que solicita apoyo con {{$informacion[0]->s_descripcion}} ({{$informacion[0]->codigo_p}}, calle {{$informacion[0]->p_calle_p}} entre calle {{$informacion[0]->p_calle_1}} y calle {{$informacion[0]->p_calle_2}}).</p>
<br>
<p>Conocedores de gran compromiso con Cd. Victoria que tiene la Lic. María del Pilar Gómez Leal, Presidenta Municipal, mucho agradeceré se dé seguimiento y respuesta a la brevedad posible.</p>
<br>
<p>Agradeciendo su amable atención, quedo de Usted.</p>
<br>
<p>ATENTAMENTE</p>
<br>
<p>LIC. ISMAEL ALANIS ZAVALA<br>
DIRECTOR DE ATENCION CIUDADANA<br>
c. c. p Archivo<br></p>
</font>
<br>
<br>
<img src="gobvic.png" width="18%" align="left">
</body>
</html>