<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table{
			overflow: wrap;
		}
		
		th td{
			font-family: serif; font-size: 14pt;
		}
		img.izquierda {
		  float: left;
		  margin-right: 2em;
		}

		p.derecha {
		  text-align: right;
		}
	</style>
</head>
<body>
<p>
	<img src="{{ public_path('images/logo.jpg') }}" height="130px" width="120px" class="izquierda">
	<br><br>UNIVERSIDAD AUTONOMA "BENITO JUÁREZ" DE OAXACA<br>
	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIRECCIÓN DE SERVICIOS ESCOLARES<br>
	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DICTAMEN DE REVALIDACIÓN DE MATERIAS</b>
</p>
<p class="derecha">
	<b>DICTAMEN No. {{ $dictamen_registro->clave }}</b>
</p>
<p>
	<b>
	C. PRESIDENTE DEL H. CONSEJO TECNICO
	<br>
	DE LA ESCUELA DE CIENCIAS
	<br>
	DE LA "UABJO"
	<br>
	P R E S E N T E.
</b>
</p>

<p>

@if($alumno->sexo == "hombre")
{{"El"}}
@else
{{"La"}}
@endif

C.
{{$alumno->apellidos}} {{$alumno->nombres}}

con número de matrícula {{substr($alumno->curp,0,4)}}-{{substr($alumno->curp,4,6)}}
y control escolar sice: {{$alumno->clave}}

@if($alumno->sexo == "hombre")
{{"inscrito como alumno"}}
@else
{{"inscrita como alumna"}}
@endif

regular al {{ $dictamen_registro->semestre_alumno }} semestre del periodo escolar 

{{ $dictamen_registro->periodo_inicio}}-{{ $dictamen_registro->periodo_fin}}

en la Escuela de Ciencias
de la Universidad Autónoma "Benito Juarez" de Oaxaca, ha solicitado a esta dirección de Servicios Escolares le sean revalidadas la materias cursadas con anterioridad en 
oficio_universidad {{$universidad->nombre}}
y de acuerdo al certificado original de calificaciones que presenta se emite el siguiente dictamen:
</p>

<br>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" >
	<tr>
		<th>MATERIAS QUE CURSO Y APROBO<br>EN {{ strtoupper($universidad->nombre) }}</th>
		<th>CALIF.</th>
		<th>FECHA DE APROB.</th>
		<th>MATERIAS EQUIVALENTES<br>EN LA UNIVERSIDAD AUTONOMA BENITO JUÁREZ DE OAXACA DE<br>LA ESCUELA DE CIENCIAS. <br><br>{{ mb_strtoupper($uabjo_carrera->nombre,'utf-8') }}</th>
	</tr>
	@foreach($registros as $registro)
		<tr>
			<td align="center" style="width: 40%">
				{{ $registro->universidad_materia }}
				@if($registro->universidad_materia_tipo == "optativa")  
					{{ $registro->universidad_optativa }}
				@endif
			</td>
			<td align="center" style="width: 8%">{{ $registro->calificacion }}<br>{{ $registro->tipo_aprobacion }}</td>
			<td align="center" style="width: 12%">{{ $dictamen_registro->fecha_aprobacion }}</td>
			<td align="center" style="width: 40%">
				{{ $registro->uabjo_materia }}
				@if($registro->uabjo_materia_tipo == "optativa")  
					{{ $registro->uabjo_optativa }}
				@endif
			</td>
		</tr>
	@endforeach
</table>
<p>
	Estas materias figuran la {{ strtoupper($uabjo_carrera->nombre) }} aprovado por el H. Consejo Universitario con fundamento en los articulos 31, 60, 62, 63, 64 y 65 fraccion III de la Ley General de  Educacion y Art. 210 del Reglamento de la Ley Organica, por lo que la UNIVERSIDAD AUTONOMA "BENITO JUÁREZ" DE OAXACA,RECONOCE Y REVALIDA las materias que contiene el cuadro anterior, con el fin de que elsolicitante sea inscrito en el grado correspondiente.
</p>

<section   style="width:100%; border: 1px solid white; height: 220px; position: relative; margin-top: 30px;">
Oaxaca de JUÁREZ, Oax, a XX de MES del Año.
<p style="text-align: center;">
"CIENCIA,	ARTE,	LIBERTAD"
<br>
DIRECTOR DE SERVICIOS ESCOLARES
<br> {{ $dictamen_registro->director_escolares }}
<br>
<br>
SUB-DIRECTOR DE SERVICIOS ESCOLARES
<br> {{ $dictamen_registro->subdirector_escolares }}
</p>
El Cuadro Anterior ampara 

@switch(count($registros))
	@case (1)  
		una 
	@break
	@case (2)
		dos 
	@break
	@case (3)  
		tres 
	@break
	@case (4)
		cuatro 
	@break
	@case (5)  
		cinco 
	@break
	@case (6)
		seis 
	@break
	@case (7)  
		siete 
	@break
	@case (8)
		ocho 
	@break
	@case (9)  
		nueve 
	@break
	@case (10)
		dies 
	@break
	@case (11)  
		once 
	@break
	@case (12)
		doce 
	@break
	@case (13)  
		trece 
	@break
	@case (14)
		catorce 
	@break
	@case (15)  
		quince 
	@break
	@case (16)
		dieciséis 
	@break
	@case (17)
		diecisiete 
	@break
	@case (18)  
		dieciocho 
	@break
	@case (19)
		diecinueve 
	@break
	@case (20)  
		veinte 
	@break
	@case (21)
		veintiun 
	@break
@endswitch

materia(s).

</section>
<section   style="width:100%; border: 1px solid white; height: 180px; position: relative;  margin-top: 30px; padding: 8px;">
	<p style="margin-top: 0;">ACUERDO: SE APRUEBA EL DICTAMEN DE MATERIAS PRESENTADO POR LA DIRECCIÓN DE SERVICIOS ESCOLARES DE LA UNIVERSIDAD AUTONOMA "BENITO JUÁREZ" DE OAXACA.</p>
	
	<p style="margin: 0,0,8px,0;">
		Oaxaca de JUÁREZ, Oax., a 
		<u> 

			{{ date("d", strtotime($dictamen_registro->fecha_aprobacion)) }} de 
			@php ($mes = date("m", strtotime($dictamen_registro->fecha_aprobacion)))

@switch($mes)
    @case(1)
    	<u>{{"Enero"}}</u>
    @break

    @case(2)
    	<u>{{"Febrero"}}</u>
    @break
    @case(3)
    	<u>{{"Marzo"}}</u>
    @break

    @case(4)
    	<u>{{"Abril"}}</u>
    @break

    @case(5)
    	<u>{{"Mayo"}}</u>
    @break

    @case(6)
    	<u>{{"Junio"}}</u>
    @break
    @case(7)
    	<u>{{"Julio"}}</u>
    @break

    @case(8)
    	<u>{{"Agosto"}}</u>
    @break
    @case(9)
    	<u>{{"Septiembre"}}</u>
    @break

    @case(10)
    	<u>{{"Octubre"}}</u>
    @break
    @case(11)
    	<u>{{"Noviembre"}}</u>
    @break

    @case(12)
    	<u>{{"Diciembre"}}</u>
    @break

    @default

@endswitch
 
del  
{{ date("Y", strtotime($dictamen_registro->fecha_aprobacion)) }}





		</u>.
	</p>
	
	<p style="margin: 0,0,8px,0;">EL PRESIDENTE DEL H. CONSEJO TECNICO</p>
	
	<p style="margin: 0,0,8px,0;">
		<u>
			{{ $dictamen_registro->director_uabjo }}
		</u>
	</p>
</section>
<section   style="width:100%; border: 1px solid white; height: 100px; position: relative;  margin-top: 20px;">
	Original: DIRECTOR DE SERVICIOS ESCOLARES
	<br>
	copia: DIRECCIÓN DE LA ESCUELA O FACULTAD
	<br>
	copia: INTERESADO (A)
	<br>
	copia: MINUTARIO
	<br>
	ALP/{{ $dictamen_registro->secretaria_escolares }}
</section>
<!--
<p></p>

<p style="border: 2px solid black; padding: 5px; height: 100px;">
	ACUERDO: SE APRUEBA EL DICTAMEN DE MATERIAS PRESENTADO POR LA DIRECCIÓN DE SERVICIOS ESCOLARES DE LA UNIVERSIDAD AUTONOMA "BENITO JUÁREZ" DE OAXACA.
	<br>
	Oaxaca de JUÁREZ, Oax., a 24 de Octubre de 2019.
	<br>
	EL PRESIDENTE DEL H. CONSEJO TECNICO
	<br>
	RUBEN LOPEZ GONZALES
</p>
<p></p>
<p style="border: 1px solid black; height: 100px;">
	Original: DIRECTOR DE SERVICIOS ESCOLARES
	<br>
	copia: DIRECCIÓN DE LA ESCUELA O FACULTAD
	<br>
	copia: INTERESADO (A)
	<br>
	copia: MINUTARIO
	<br>
	ALP/iapa
</p> -->
<!--
	https://stackoverflow.com/questions/23760018/mpdf-font-size-not-working-for-long-text-in-a-table
-->
</body>
</html>