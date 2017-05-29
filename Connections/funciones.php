<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


//*************************************************** 
//***************************************************
//***************************************************

function ObtenerImagenUsuario($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT img_usu FROM usuario WHERe USUARIO= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['img_usu']; 
	mysql_free_result($ConsultaFuncion);
}

//***************************************************
//***************************************************
//***************************************************



//***************************************************
//***************************************************
//***************************************************

function ObtenerFormacionUsuario($identificador,$identificador2)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_dos_consultas = sprintf("SELECT * FROM usuario_has_formacion WHERE usuario_has_formacion.usuario_USUARIO = %s and usuario_has_formacion.formacion_IDF = %s", GetSQLValueString($identificador, "text"),GetSQLValueString($identificador2, "int"));
$dos_consultas = mysql_query($query_dos_consultas, $LukivenProyecto) or die(mysql_error());
$row_dos_consultas = mysql_fetch_assoc($dos_consultas);
$totalRows_dos_consultas = mysql_num_rows($dos_consultas);	
if($totalRows_dos_consultas>0){ 
		return 'checked'; 
		mysql_free_result($ConsultaFuncion);
	}
	else{
		return 'hola'; 
		mysql_free_result($ConsultaFuncion);
	}
	
	
}




//***************************************************
//***************************************************
//***************************************************

function ObtenerProcesosSistemas($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario.NOMBRE) FROM usuario inner join departamento on usuario.Departamento_IDDE = departamento.IDDE  WHERE departamento.IDDE = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario.NOMBRE)']; 
	mysql_free_result($ConsultaFuncion);
}
function ObtenerNombreUsuario($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT usuario.NOMBRE from usuario WHERE usuario = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['NOMBRE']; 
	mysql_free_result($ConsultaFuncion);
}

function ObtenerApellidoUsuario($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT APELLIDO from usuario WHERE usuario = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['APELLIDO']; 
	mysql_free_result($ConsultaFuncion);
}

function ObtenersiEsAuditor($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT usuario.UA_LID FROM usuario WHERE usuario.USUARIO = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['UA_LID']; 
	mysql_free_result($ConsultaFuncion);
}

//ELSE IF 
function ObtenersiEsAuditor2($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario_has_informe_aud.usuario_USUARIO) FROM usuario_has_informe_aud WHERE usuario_has_informe_aud.tipo='Interno' and usuario_has_informe_aud.usuario_USUARIO = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario_has_informe_aud.usuario_USUARIO)']; 
	mysql_free_result($ConsultaFuncion);
}

function ObtenersiEsAuditor3($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario_has_informe_aud.usuario_USUARIO) FROM usuario_has_informe_aud WHERE usuario_has_informe_aud.tipo='Interno' and usuario_has_informe_aud.usuario_USUARIO = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario_has_informe_aud.usuario_USUARIO)']; 
	mysql_free_result($ConsultaFuncion);
}

//valor comparativo
function ObtenerMitadProcesos()
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(proceso.nombre_pro) from proceso");
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(proceso.nombre_pro)']; 
	mysql_free_result($ConsultaFuncion);
}

function ObtenerCantidadobservador($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario_has_informe_aud.usuario_USUARIO) from usuario_has_informe_aud WHERE usuario_has_informe_aud.tipo = 'observador' and usuario_has_informe_aud.usuario_USUARIO = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario_has_informe_aud.usuario_USUARIO)']; 
	mysql_free_result($ConsultaFuncion);
}
function CursodeAuditor($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario_has_formacion.usuario_USUARIO) from usuario_has_formacion inner join formacion inner join usuario on formacion.IDF = usuario_has_formacion.formacion_IDF and usuario_has_formacion.usuario_USUARIO = usuario.USUARIO WHERE formacion.Nombre = 'Auditor Interno' and usuario_has_formacion.usuario_USUARIO  = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario_has_formacion.usuario_USUARIO)']; 
	mysql_free_result($ConsultaFuncion);
}

function ParticipacionEnAuditoriaEspecifica($identificador1,$identificador2)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT count(usuario_has_informe_aud.usuario_USUARIO) from usuario_has_informe_aud inner join informe_aud on usuario_has_informe_aud.informe_aud_idinforme_au = informe_aud.idinforme_au WHERE usuario_has_informe_aud.usuario_USUARIO = %s and usuario_has_informe_aud.informe_aud_idinforme_au = %s", GetSQLValueString($identificador1, "text"),GetSQLValueString($identificador2, "int"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['count(usuario_has_informe_aud.usuario_USUARIO)']; 
	mysql_free_result($ConsultaFuncion);
}

function AuditorLiderEnAuditoriaEspecifica($identificador,$identificador2)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * from informe_aud WHERE informe_aud.idinforme_au = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	$variable = $row_ConsultaFuncion['Lid_aud'];
		if($variable == $identificador2){
			return 'uno';
			mysql_free_result($ConsultaFuncion); 
		}
	else{
		return 'cero';
			mysql_free_result($ConsultaFuncion);
	}
	
}

function Clausula_informe_especifico($identificador1,$identificador2)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(clausulas.Nombre) FROM clausulas INNER JOIN clausulas_has_informe_aud on clausulas.IDCC = clausulas_has_informe_aud.Clausulas_IDCC WHERE clausulas_has_informe_aud.Clausulas_IDCC = %s and clausulas_has_informe_aud.informe_aud_idinforme_au = %s", GetSQLValueString($identificador1, "int"),GetSQLValueString($identificador2, "int"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(clausulas.Nombre)']; 
	mysql_free_result($ConsultaFuncion);
}

function Seguimiento($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(informe_aud.idinforme_au) from informe_aud inner join clausulas_has_informe_aud on informe_aud.idinforme_au = clausulas_has_informe_aud.informe_aud_idinforme_au WHERE clausulas_has_informe_aud.informe_aud_idinforme_au  = %s and clausulas_has_informe_aud.sol_acc = 1 ", GetSQLValueString($identificador, "int"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(informe_aud.idinforme_au)']; 
	mysql_free_result($ConsultaFuncion);
}

function CorreoElectronico($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario.EMAIL) from usuario WHERE usuario.EMAIL= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario.EMAIL)']; 
	mysql_free_result($ConsultaFuncion);
}

function Usuario_repetido($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario.USUARIO) from usuario WHERE usuario.USUARIO= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario.USUARIO)']; 
	mysql_free_result($ConsultaFuncion);
}

function cedularepetido($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario.CEDULA) from usuario WHERE usuario.CEDULA= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario.CEDULA)']; 
	mysql_free_result($ConsultaFuncion);
}

function Validar_Usuario($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT CONDICION from usuario WHERE usuario.USUARIO= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['CONDICION']; 
	mysql_free_result($ConsultaFuncion);
}


function chekduplicidad($codigoformato,$numrevision)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * from control_de_documentos WHERE control_de_documentos.codigo_formato = %s and control_de_documentos.num_revision=%s",GetSQLValueString($codigoformato,"text"),GetSQLValueString($numrevision,"int"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	if ($totalRows_ConsultaFuncion>=1) {
		# code...
		return "false";
	}elseif ($totalRows_ConsultaFuncion==0) {
		# code...
		return "true";
	}
	
	mysql_free_result($ConsultaFuncion);
}


function checkFormacioin($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * from formacion WHERE formacion.IDF = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['formacioncol']; 
	mysql_free_result($ConsultaFuncion);
}

function NombreCargo($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * FROM cargo WHERE idcargo = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['formacioncol']; 
	mysql_free_result($ConsultaFuncion);
}
function NombresCargo($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT nom_car FROM cargo WHERE idcargo = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['nom_car']; 
	mysql_free_result($ConsultaFuncion);
}

function CantidadFormacion($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario_has_formacion.formacion_IDF) from usuario_has_formacion WHERE usuario_has_formacion.formacion_IDF = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario_has_formacion.formacion_IDF)']; 
	mysql_free_result($ConsultaFuncion);
}
function NombreProceso($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * from departamento  inner join proceso on departamento.IDDE = proceso.departamento_IDDE WHERE proceso.IDP= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['nombre_pro']; 
	mysql_free_result($ConsultaFuncion);
}

function NombreDepartamento($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * from departamento  inner join proceso on  departamento.IDDE = proceso.departamento_IDDE WHERE proceso.IDP= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['nombre']; 
	mysql_free_result($ConsultaFuncion);
}
function tipoproceso($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * from departamento  inner join proceso on  departamento.IDDE = proceso.departamento_IDDE WHERE proceso.IDP= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['tipo']; 
	mysql_free_result($ConsultaFuncion);
}

function Programa_Auditoria()
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * FROM programa_auditoria");
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['nom_arc']; 
	mysql_free_result($ConsultaFuncion);
}
function Plan_Auditoria()
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * FROM plan_de_auditoria");
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['nomb_plan']; 
	mysql_free_result($ConsultaFuncion);
}

function CantidadObservacion($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(clausulas_has_informe_aud.IDCI) from clausulas_has_informe_aud WHERE clausulas_has_informe_aud.ESTADO = 'observacion' and clausulas_has_informe_aud.informe_aud_idinforme_au= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(clausulas_has_informe_aud.IDCI)']; 
	mysql_free_result($ConsultaFuncion);
}
function CantidadObservacionCerradas($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(clausulas_has_informe_aud.IDCI) from clausulas_has_informe_aud WHERE clausulas_has_informe_aud.ESTADO = 'observacion' and clausulas_has_informe_aud.informe_aud_idinforme_au= %s and not clausulas_has_informe_aud.eficaz_o_no='' ",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(clausulas_has_informe_aud.IDCI)']; 
	mysql_free_result($ConsultaFuncion);
}
function CantidadObservacionabiertas($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(clausulas_has_informe_aud.IDCI) from clausulas_has_informe_aud WHERE clausulas_has_informe_aud.ESTADO = 'observacion' and clausulas_has_informe_aud.informe_aud_idinforme_au= %s and  clausulas_has_informe_aud.eficaz_o_no is NULL",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(clausulas_has_informe_aud.IDCI)']; 
	mysql_free_result($ConsultaFuncion);
}


function CantidadClausulasEvaluadas($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_claausulas_eva = sprintf("SELECT * from clausulas_has_informe_aud INNER JOIN informe_aud INNER JOIN plan_de_auditoria_proceso on clausulas_has_informe_aud.informe_aud_idinforme_au=informe_aud.idinforme_au and informe_aud.id_proceso_plan_informe=plan_de_auditoria_proceso.id_pdap WHERE clausulas_has_informe_aud.informe_aud_idinforme_au=%s",GetSQLValueString($identificador,"text"));
	$claausulas_eva = mysql_query($query_claausulas_eva,$LukivenProyecto) or die(mysql_error());
	$row_claausulas_eva = mysql_fetch_assoc($claausulas_eva);
	$totalRows_claausulas_eva = mysql_num_rows($claausulas_eva);
	
	$clausulasEVAexplode=explode(",", $row_claausulas_eva['requisito_pdap']);
	$cantidadCE=count($clausulasEVAexplode);
	


	return $cantidadCE; 
	mysql_free_result($claausulas_eva);
}

function idInformeToidProgram($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_idinftoidpro = sprintf("SELECT * from plan_de_auditoria INNER JOIN informe_aud INNER JOIN plan_de_auditoria_proceso on plan_de_auditoria.id_plan=plan_de_auditoria_proceso.id_pda_pdap and informe_aud.id_proceso_plan_informe=plan_de_auditoria_proceso.id_pdap WHERE informe_aud.idinforme_au=%s",GetSQLValueString($identificador,"text"));
	$idinftoidpro = mysql_query($query_idinftoidpro,$LukivenProyecto) or die(mysql_error());
	$row_idinftoidpro = mysql_fetch_assoc($idinftoidpro);
	$totalRows_idinftoidpro = mysql_num_rows($idinftoidpro);
	return $row_idinftoidpro['programa_plan']; 
	mysql_free_result($idinftoidpro);
}


function ActualizarEficaciaAnual($pa_ID,$semestre,$pa_ID_completo)
{
	echo "<script>console.log('pa_ID::".$pa_ID."::$semestre::".$semestre."::pa1::".$pa_ID_completo[0]."::pa2".$pa_ID_completo[1]."');</script>";

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_conside = "SELECT * FROM indice_de_eficacia where indice_de_eficacia.id_programa=$pa_ID and indice_de_eficacia.proceso_id=0 ";
$conside = mysql_query($query_limit_conside, $LukivenProyecto) or die(mysql_error());
$assoc_conside=mysql_fetch_assoc($conside);
$filasIndice=mysql_num_rows($conside);

if ($filasIndice>0) {
	# code...


$cla_eva=$assoc_conside['clausulas_eval'];
$cla_cum=$assoc_conside['clausulas_cump'];
$va_obtenido=$assoc_conside['valor_obtenido'];
$va_esperado=$assoc_conside['valor_esperado'];

echo "<script>console.log('cla_eva:".$cla_eva."/cla_cum:".$cla_cum."/va_obtenido:".$va_obtenido."/va_esperado:".$va_esperado."');</script>";
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_consiea = "SELECT * FROM eficacia_anual where eficacia_anual.id_programm_ea=$pa_ID  and eficacia_anual.semestre='$semestre'  ";
$consiea = mysql_query($query_limit_consiea, $LukivenProyecto) or die(mysql_error());
$filas_consiea=mysql_num_rows($consiea);
echo "<script>console.log('filas:".$filas_consiea."')</script>";
if ($filas_consiea>0) {
	# code...
	if ($semestre=="I semestre") {
		mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_updateea1 = "UPDATE  eficacia_anual set semestre='$semestre',clausulas_eva_ea=$cla_eva,clausulas_cum_ea=$cla_cum,valor_obtenido_ea=$va_obtenido,valor_esperado_ea=$va_esperado where eficacia_anual.id_programm_ea=$pa_ID and eficacia_anual.semestre='I semestre'   ";
$updateea1 = mysql_query($query_limit_updateea1, $LukivenProyecto) or die(mysql_error());
		# code...
	}elseif ($semestre=="II semestre") {
		mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_updateea2 = "UPDATE  eficacia_anual set semestre='$semestre',clausulas_eva_ea=$cla_eva,clausulas_cum_ea=$cla_cum,valor_obtenido_ea=$va_obtenido,valor_esperado_ea=$va_esperado where eficacia_anual.id_programm_ea=$pa_ID and eficacia_anual.semestre='II semestre'   ";
$updateea2 = mysql_query($query_limit_updateea2, $LukivenProyecto) or die(mysql_error());


//pedimos los datos del primer trimestre para ingresarlos een el total 

$paIsemestre=$pa_ID_completo[1];
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_consiea_fU = "SELECT * FROM eficacia_anual where eficacia_anual.id_programm_ea=$paIsemestre  and eficacia_anual.semestre='I semestre'  ";
$consiea_fU = mysql_query($query_limit_consiea_fU, $LukivenProyecto) or die(mysql_error());
$assoc_consiea_fU=mysql_fetch_assoc($consiea_fU);

$cla_eva2=$assoc_consiea_fU['clausulas_eva_ea'];
$cla_cum2=$assoc_consiea_fU['clausulas_cum_ea'];
$va_obtenido2=$assoc_consiea_fU['valor_obtenido_ea'];
$va_esperado2=$assoc_consiea_fU['valor_esperado_ea'];

$cla_evaT=$cla_eva+$cla_eva2;
$cla_cumT=$cla_cum+$cla_cum2;
$va_obtenidoT=($va_obtenido+$va_obtenido2)/2;
$va_esperadoT=($va_esperado+$va_esperado2)/2;


mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_updateea2 = "UPDATE  eficacia_anual set semestre='Medicion de la eficacia',clausulas_eva_ea=$cla_evaT,clausulas_cum_ea=$cla_cumT,valor_obtenido_ea=$va_obtenidoT,valor_esperado_ea=$va_esperadoT where eficacia_anual.id_programm_ea=$pa_ID and eficacia_anual.semestre='Medicion de la eficacia'   ";
$updateea2 = mysql_query($query_limit_updateea2, $LukivenProyecto) or die(mysql_error());

	}
}elseif ($filas_consiea==0) {
	# code...
	if ($semestre=="I semestre") {
			echo "<script>console.log('PUM');</script>";

		mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_insertea1 = "INSERT INTO  eficacia_anual(semestre,id_programm_ea,clausulas_eva_ea,clausulas_cum_ea,valor_obtenido_ea,valor_esperado_ea) values('$semestre',$pa_ID,$cla_eva,$cla_cum,$va_obtenido,$va_esperado)";
$insertea1 = mysql_query($query_limit_insertea1, $LukivenProyecto) or die(mysql_error());
		# code...
	echo "<script>console.log('PUM2');</script>";

	}elseif ($semestre=="II semestre") {
		mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_insertea2 = "INSERT INTO  eficacia_anual(semestre,id_programm_ea,clausulas_eva_ea,clausulas_cum_ea,valor_obtenido_ea,valor_esperado_ea) values('$semestre',$pa_ID,$cla_eva,$cla_cum,$va_obtenido,$va_esperado) ";
$insertea2 = mysql_query($query_limit_insertea2, $LukivenProyecto) or die(mysql_error());


//pedimos los datos del primer trimestre para ingresarlos een el total 
$paIsemestre=$pa_ID_completo[1];
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_consiea_f = "SELECT * FROM eficacia_anual where eficacia_anual.id_programm_ea=$paIsemestre  and eficacia_anual.semestre='I semestre'  ";
$consiea_f = mysql_query($query_limit_consiea_f, $LukivenProyecto) or die(mysql_error());
$assoc_consiea_f=mysql_fetch_assoc($consiea_f);



$cla_eva2=$assoc_consiea_f['clausulas_eva_ea'];
$cla_cum2=$assoc_consiea_f['clausulas_cum_ea'];
$va_obtenido2=$assoc_consiea_f['valor_obtenido_ea'];
$va_esperado2=$assoc_consiea_f['valor_esperado_ea'];

$cla_evaT=$cla_eva+$cla_eva2;
$cla_cumT=$cla_cum+$cla_cum2;
$va_obtenidoT=($va_obtenido+$va_obtenido2)/2;
$va_esperadoT=($va_esperado+$va_esperado2)/2;


		mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_limit_insertea3 = "INSERT INTO  eficacia_anual(semestre,id_programm_ea,clausulas_eva_ea,clausulas_cum_ea,valor_obtenido_ea,valor_esperado_ea) values('Medicion de la eficacia',$pa_ID,$cla_evaT,$cla_cumT,$va_obtenidoT,$va_esperadoT) ";
$insertea3 = mysql_query($query_limit_insertea3, $LukivenProyecto) or die(mysql_error());
	}
}

}









}

function ClausulasAEvaluar($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	//$query_claausulas_eva = sprintf("SELECT * from clausulas_has_informe_aud INNER JOIN informe_aud INNER JOIN plan_de_auditoria_proceso on clausulas_has_informe_aud.informe_aud_idinforme_au=informe_aud.idinforme_au and informe_aud.id_proceso_plan_informe=plan_de_auditoria_proceso.id_pdap WHERE clausulas_has_informe_aud.informe_aud_idinforme_au=%s",GetSQLValueString($identificador,"text"));
	$query_claausulas_eva = sprintf("SELECT * from informe_aud INNER JOIN plan_de_auditoria_proceso on informe_aud.id_proceso_plan_informe=plan_de_auditoria_proceso.id_pdap WHERE informe_aud.idinforme_au=%s",GetSQLValueString($identificador,"text"));
	$claausulas_eva = mysql_query($query_claausulas_eva,$LukivenProyecto) or die(mysql_error());
	$row_claausulas_eva = mysql_fetch_assoc($claausulas_eva);
	$totalRows_claausulas_eva = mysql_num_rows($claausulas_eva);
	
	$clausulasEVAexplode=explode(",", $row_claausulas_eva['requisito_pdap']);
	
	


	return $clausulasEVAexplode; 
	mysql_free_result($claausulas_eva);
}

function CantidadClausulascumplidas($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_claausulas_cump = sprintf("SELECT * from clausulas_has_informe_aud WHERE clausulas_has_informe_aud.informe_aud_idinforme_au= %s and clausulas_has_informe_aud.ESTADO='CONFORMIDAD'",GetSQLValueString($identificador,"text"));
	$claausulas_cump = mysql_query($query_claausulas_cump,$LukivenProyecto) or die(mysql_error());
	$row_claausulas_cump = mysql_fetch_assoc($claausulas_cump);
	$totalRows_claausulas_cump = mysql_num_rows($claausulas_cump);
	
	return $totalRows_claausulas_cump; 
	mysql_free_result($claausulas_cump);
}


function CantidadNC($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(clausulas_has_informe_aud.IDCI) from clausulas_has_informe_aud WHERE clausulas_has_informe_aud.ESTADO = 'NO CONFORMIDAD' and clausulas_has_informe_aud.informe_aud_idinforme_au= %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(clausulas_has_informe_aud.IDCI)']; 
	mysql_free_result($ConsultaFuncion);
}

function CantidadNCcerradas($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(clausulas_has_informe_aud.IDCI) from clausulas_has_informe_aud WHERE clausulas_has_informe_aud.ESTADO = 'NO CONFORMIDAD' and clausulas_has_informe_aud.informe_aud_idinforme_au= %s and not clausulas_has_informe_aud.eficaz_o_no='' ",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(clausulas_has_informe_aud.IDCI)']; 
	mysql_free_result($ConsultaFuncion);
}
function CantidadNCabiertas($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(clausulas_has_informe_aud.IDCI) from clausulas_has_informe_aud WHERE clausulas_has_informe_aud.ESTADO = 'NO CONFORMIDAD' and clausulas_has_informe_aud.informe_aud_idinforme_au= %s and  clausulas_has_informe_aud.eficaz_o_no is NULL ",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(clausulas_has_informe_aud.IDCI)']; 
	mysql_free_result($ConsultaFuncion);
}

function NombreProcesoPorAuditoria($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * from informe_aud inner join proceso on informe_aud.proceso_IDP = proceso.IDP WHERE informe_aud.idinforme_au = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['nombre_pro']; 
	mysql_free_result($ConsultaFuncion);
}

function NombreLiderAuditor($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * from informe_aud inner join proceso on informe_aud.proceso_IDP = proceso.IDP WHERE informe_aud.idinforme_au = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['Lid_aud']; 
	mysql_free_result($ConsultaFuncion);
}
function Eliminar_Proceso3($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(informe_aud.proceso_IDP) from informe_aud WHERE informe_aud.proceso_IDP = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(informe_aud.proceso_IDP)']; 
	mysql_free_result($ConsultaFuncion);
}

function Eliminar_Proceso2($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(usuario.cargo_idcargo) from usuario WHERE usuario.cargo_idcargo = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario.cargo_idcargo)']; 
	mysql_free_result($ConsultaFuncion);
}

function Eliminar_Clausula($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(clausulas_has_informe_aud.IDCI) FROM clausulas_has_informe_aud WHERE clausulas_has_informe_aud.Clausulas_IDCC = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(usuario.cargo_idcargo)']; 
	mysql_free_result($ConsultaFuncion);
}

function Eliminar_Clausula_informe_razones($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(acciones.clausulas_has_informe_aud_IDCI) from acciones WHERE acciones.clausulas_has_informe_aud_IDCI = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(acciones.clausulas_has_informe_aud_IDCI)']; 
	mysql_free_result($ConsultaFuncion);
}

function NivelDeUsuarios($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT TIPOUSU from usuario WHERE usuario.USUARIO = %s",GetSQLValueString($identificador,"text"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['TIPOUSU']; 
	mysql_free_result($ConsultaFuncion);
}
//----------------------------------CARLOS GARCIA

function Prevenir_duplicidad_de_clausulas($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT IDC from clausulas ");
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$result="false";
while ($row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion)) {
	if ($row_ConsultaFuncion['IDC']==$identificador) {
		$result="true";
	}
}

	
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $result; 
	mysql_free_result($ConsultaFuncion);
}

function Prevenir_duplicidad_de_clausulas_editar($identificador,$identificador2)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT IDC from clausulas ");
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$result="false";
while ($row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion)) {
	if ($row_ConsultaFuncion['IDC']==$identificador) {//nuevo
		$result="true";

		if ($identificador==$identificador2) {
			$result="false";
		}
	}
}

	
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $result; 
	mysql_free_result($ConsultaFuncion);
}

function cantidad_de_clausulas_repetidas($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT COUNT(IDC) FROM `clausulas` WHERE IDC=$identificador ");
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
		
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['COUNT(IDC)']; 
	mysql_free_result($ConsultaFuncion);
}

//  ELiminar ultimo seguimiento Ingresado 
        if ((isset($_GET['comando'])) && (isset($_GET['comentarios'])) && $_GET['comando']=="EliminarComentarioSeguimiento") {

        	$coment=explode("-", $_GET['comentarios']);
        $cantidad=count($coment)-5;
        		//$parrafo="";
        		$n_seguimiento="";
        	for ($oi=0; $oi <$cantidad ; $oi++) { 
        		//$parrafo.=$coment[$oi]."\n";
      	$n_seguimiento.=$coment[$oi]."-";
        	}

        global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_Eliminar_ult_seguimient = sprintf("UPDATE  acciones set seguimiento=%s WHERE IDAC=%s" ,GetSQLValueString($n_seguimiento,"text"),GetSQLValueString($_GET['IDAC'],"int"));
	$Eliminar_ult_seguimient = mysql_query($query_Eliminar_ult_seguimient,$LukivenProyecto) or die(mysql_error());
	$row_Eliminar_ult_seguimient = mysql_fetch_assoc($Eliminar_ult_seguimient);

			header("location:".$_GET['enlace']);
        }
// fin de eliminar ultimo seguimiento ingresado 
function ObtenerNomMes($mesNum)
{	
	$MESES= array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
	# code...
	for ($i=1; $i <=12 ; $i++) { 
		# code...
	if ($mesNum==$i) {
		# code...
		$NomMes=$MESES[$i-1];
	}
	}

	return $NomMes;
}

function VerificarClausulas($b_Clausulas_Informe)
{
	

	//verificar si todas las clausulas fueron auditadas 



mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Clausulas_Informe = sprintf("SELECT * FROM clausulas inner join clausulas_has_informe_aud inner join informe_aud inner join proceso on clausulas.IDCC = clausulas_has_informe_aud.Clausulas_IDCC and clausulas_has_informe_aud.informe_aud_idinforme_au = informe_aud.idinforme_au and proceso.IDP = informe_aud.proceso_IDP WHERE clausulas_has_informe_aud.informe_aud_idinforme_au  = %s" , GetSQLValueString($b_Clausulas_Informe, "int"));
$Clausulas_Informe = mysql_query($query_Clausulas_Informe, $LukivenProyecto) or die(mysql_error());
//$row_Clausulas_Informe = mysql_fetch_assoc($Clausulas_Informe);
$totalRows_Clausulas_Informe = mysql_num_rows($Clausulas_Informe);



mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_clausulas_all = "SELECT * FROM clausulas" ;
$clausulas_all = mysql_query($query_clausulas_all, $LukivenProyecto) or die(mysql_error());
$row_clausulas_all = mysql_fetch_assoc($clausulas_all);
$totalRows_clausulas_all = mysql_num_rows($clausulas_all);


 /*
$conta=0;

while ( $row_Clausulas_Informe = mysql_fetch_assoc($Clausulas_Informe)) {
	$conta++;
	$cla_acumulada[$conta]=$row_Clausulas_Informe['IDC'];

  # code...
  //echo "clausula:".$row_Clausulas_Informe['IDC']."deesc:".$row_Clausulas_Informe['HALLAZGO'];
}
*/

if ($totalRows_Clausulas_Informe==$totalRows_clausulas_all) {

	# code...
}


//verificar si todas las clausulas fueron auditadas fin
}


function verificarSolicitudes($a_Obs_no_con)
{

  global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Obs_no_con = sprintf("SELECT * FROM informe_aud inner join clausulas_has_informe_aud inner join clausulas on informe_aud.idinforme_au = clausulas_has_informe_aud.informe_aud_idinforme_au and clausulas_has_informe_aud.Clausulas_IDCC = clausulas.IDCC WHERE clausulas_has_informe_aud.sol_acc = 1  and clausulas_has_informe_aud.informe_aud_idinforme_au = %s", GetSQLValueString($a_Obs_no_con, "int"));
$Obs_no_con = mysql_query($query_Obs_no_con, $LukivenProyecto) or die(mysql_error());
$row_Obs_no_con = mysql_fetch_assoc($Obs_no_con);
$totalRows_Obs_no_con = mysql_num_rows($Obs_no_con);

if ($totalRows_Obs_no_con>0) {
	return "si";
}else
{
	return "no";
}
}
																						

function verificacion_de_nombre_proceso($nombre_pro)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_v_d_n_p = sprintf("SELECT * FROM proceso WHERE nombre_pro=%s", GetSQLValueString($nombre_pro, "text"));
$v_d_n_p = mysql_query($query_v_d_n_p, $LukivenProyecto) or die(mysql_error());
$row_v_d_n_p = mysql_fetch_assoc($v_d_n_p);
$totalRows_v_d_n_p = mysql_num_rows($v_d_n_p);

if ($totalRows_v_d_n_p>0) {
	return "si";
}else
{
	return "no";
}
}
function verificacion_de_nombre_proceso_Edicion($nombre_pro_n,$nombre_pro_v)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_v_d_n_p = sprintf("SELECT * FROM proceso WHERE nombre_pro=%s", GetSQLValueString($nombre_pro_n, "text"));
$v_d_n_p = mysql_query($query_v_d_n_p, $LukivenProyecto) or die(mysql_error());
$row_v_d_n_p = mysql_fetch_assoc($v_d_n_p);
$totalRows_v_d_n_p = mysql_num_rows($v_d_n_p);

if ($totalRows_v_d_n_p>0) {
	if ($row_v_d_n_p['nombre_pro']==$nombre_pro_v) {
		return "no";
	}else{

	return "si";
	}


}else
{
	return "no";
}
}

function NombreProcesoViejo($id)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * FROM proceso WHERE proceso.IDP=%s",GetSQLValueString($id, "int"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['nombre_pro']; 
	mysql_free_result($ConsultaFuncion);
}

function verificarGerenteAsignado($USUARIO)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_v_g_a = sprintf("SELECT * FROM departamento WHERE gerente=%s", GetSQLValueString($USUARIO, "text"));
$v_g_a = mysql_query($query_v_g_a, $LukivenProyecto) or die(mysql_error());
$row_v_g_a = mysql_fetch_assoc($v_g_a);
$totalRows_v_g_a = mysql_num_rows($v_g_a);

if ($totalRows_v_g_a>0) {
	return "si";

}else
{
	return "no";
}
}

function verificaGerenteAsigEdit($USUARIO_n,$USUARIO_v)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_v_g_a = sprintf("SELECT * FROM departamento WHERE gerente=%s", GetSQLValueString($USUARIO_n, "text"));
$v_g_a = mysql_query($query_v_g_a, $LukivenProyecto) or die(mysql_error());
$row_v_g_a = mysql_fetch_assoc($v_g_a);
$totalRows_v_g_a = mysql_num_rows($v_g_a);

if ($totalRows_v_g_a>0) {
	if ($USUARIO_v==$row_v_g_a['gerente']) {
		return "no";
	}else{

	return "si";
	}
	

}else
{
	return "no";
}
}

function checkarGerenteActual($id)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_checkar_gerente = sprintf("SELECT * FROM departamento WHERE IDDE=%s",GetSQLValueString($id, "int"));
	$checkar_gerente = mysql_query($query_checkar_gerente,$LukivenProyecto) or die(mysql_error());
	$row_checkar_gerente = mysql_fetch_assoc($checkar_gerente);
	$totalRows_checkar_gerente = mysql_num_rows($checkar_gerente);
	
	return $row_checkar_gerente['gerente']; 
	mysql_free_result($checkar_gerente);
}

function ObtenerAuditoriaFechaInicio($id)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_idAuditoria = sprintf("SELECT * FROM programa_auditoria WHERE pa_ID=%s",GetSQLValueString($id, "int"));
	$idAuditoria = mysql_query($query_idAuditoria,$LukivenProyecto) or die(mysql_error());
	$row_idAuditoria = mysql_fetch_assoc($idAuditoria);
	$totalRows_idAuditoria = mysql_num_rows($idAuditoria);
	
	return $row_idAuditoria['fecha_auditoria_inicio']; 
	mysql_free_result($idAuditoria);
}
function I_D_P_CentreProceso_ProcesoClausula($id)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_I_D_P_C = sprintf("SELECT * FROM proceso INNER JOIN proceso_clausula on proceso.IDP=proceso_clausula.proceso_IDP WHERE proceso.IDP=%s",GetSQLValueString($id, "int"));
	$I_D_P_C = mysql_query($query_I_D_P_C,$LukivenProyecto) or die(mysql_error());
	$row_I_D_P_C = mysql_fetch_assoc($I_D_P_C);
	$totalRows_I_D_P_C = mysql_num_rows($I_D_P_C);
	
	return $row_I_D_P_C['ID_P_C']; 
	mysql_free_result($I_D_P_C);
}
function decir($sms)
{	
	echo "<script> alert('".$sms."');</script>";
}




function verificarExistenciaen_PAP($IDP,$idpro)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
//$query_Ver_PAP = sprintf("SELECT * FROM programa_auditoria_proceso,proceso_clausula WHERE programa_auditoria_proceso.pap_IDPC=proceso_clausula.ID_P_C and proceso_clausula.proceso_IDP=%s", GetSQLValueString($IDP, "int"));
$query_Ver_PAP = sprintf("SELECT * from programa_auditoria,programa_auditoria_proceso,proceso_clausula,proceso WHERE programa_auditoria.pa_ID=programa_auditoria_proceso.pap_fecha_aud AND programa_auditoria_proceso.pap_IDPC=proceso_clausula.ID_P_C AND proceso_clausula.proceso_IDP=proceso.IDP and programa_auditoria.pa_ID=%s AND proceso.IDP=%s", GetSQLValueString($idpro, "int"),GetSQLValueString($IDP, "int"));
$Ver_PAP = mysql_query($query_Ver_PAP, $LukivenProyecto) or die(mysql_error());
$row_Ver_PAP = mysql_fetch_assoc($Ver_PAP);
$totalRows_Ver_PAP = mysql_num_rows($Ver_PAP);

if ($totalRows_Ver_PAP>0) {
	return "si";

}else
{
	return "no";
}
}

function verificarExistenciaen_DetallesAP($IDP,$idpro)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
//$query_Ver_PAP = sprintf("SELECT * FROM programa_auditoria_proceso,proceso_clausula WHERE programa_auditoria_proceso.pap_IDPC=proceso_clausula.ID_P_C and proceso_clausula.proceso_IDP=%s", GetSQLValueString($IDP, "int"));
$query_Ver_PAP = sprintf("SELECT * FROM plan_de_auditoria_proceso INNER JOIN proceso on plan_de_auditoria_proceso.proceso_pdap=proceso.nombre_pro WHERE plan_de_auditoria_proceso.id_pda_pdap=%s and proceso.IDP=%s", GetSQLValueString($idpro, "int"),GetSQLValueString($IDP, "int"));
$Ver_PAP = mysql_query($query_Ver_PAP, $LukivenProyecto) or die(mysql_error());
$row_Ver_PAP = mysql_fetch_assoc($Ver_PAP);
$totalRows_Ver_PAP = mysql_num_rows($Ver_PAP);

if ($totalRows_Ver_PAP>0) {
	return "si";

}else
{
	return "no";
}
}



function verificarEstado_PAP($pap_ID)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_V_E_PAP = sprintf("SELECT * FROM programa_auditoria_proceso WHERE  pap_ID=%s", GetSQLValueString($pap_ID, "int"));
$V_E_PAP = mysql_query($query_V_E_PAP, $LukivenProyecto) or die(mysql_error());
$row_V_E_PAP = mysql_fetch_assoc($V_E_PAP);
$totalRows_V_E_PAP = mysql_num_rows($V_E_PAP);

if ($row_V_E_PAP['estado_PAP']==1  or $row_V_E_PAP['estado_PAP']==2 ) {
	return "si";//esta creado  por lo tanto estara replanificado

}else
{
	return "no";
}
}


function fechas_replanf($pap_ID)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Replan = sprintf("SELECT * FROM replanificacion WHERE  PAP_ID=%s", GetSQLValueString($pap_ID, "int"));
$Replan = mysql_query($query_Replan, $LukivenProyecto) or die(mysql_error());
//$row_Replan = mysql_fetch_assoc($Replan);
//$totalRows_Replan = mysql_num_rows($Replan);

return $Replan;

}

function fechas_ejecutada_PAP($pap_ID)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_ejecut_fecha = sprintf("SELECT * FROM programa_auditoria_proceso WHERE  pap_ID=%s", GetSQLValueString($pap_ID, "int"));
$ejecut_fecha = mysql_query($query_ejecut_fecha, $LukivenProyecto) or die(mysql_error());
//$row_Replan = mysql_fetch_assoc($Replan);
//$totalRows_Replan = mysql_num_rows($Replan);

return $ejecut_fecha;

}



function verificarExistencia_plan_prog($programa_plan)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_V_e_p_prog = sprintf("SELECT * FROM plan_de_auditoria WHERE programa_plan=%s", GetSQLValueString($programa_plan, "int"));
$V_e_p_prog = mysql_query($query_V_e_p_prog, $LukivenProyecto) or die(mysql_error());
$row_V_e_p_prog = mysql_fetch_assoc($V_e_p_prog);
$totalRows_V_e_p_prog = mysql_num_rows($V_e_p_prog);

if ($totalRows_V_e_p_prog>0) {
	return "si";

}else
{
	return "no";
}
}



function CreandoPlanDesdeProg($ID_prog)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	# code...
	//insertamos la relacion en la tabla principal del plan 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_insert_plan_prog = sprintf("INSERT INTO plan_de_auditoria (programa_plan) values (%s)",GetSQLValueString($ID_prog, "int"));
$insert_plan_prog = mysql_query($query_insert_plan_prog, $LukivenProyecto) or die(mysql_error());
//mysql_free_result($insert_plan_prog);

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);

//consultamos todo lo relacionado con el programa para ingresarlo al plan
$query_proc_del_plan = "SELECT * FROM departamento,proceso,proceso_clausula,programa_auditoria ,plan_de_auditoria,programa_auditoria_proceso WHERE programa_auditoria_proceso.pap_IDPC=proceso_clausula.ID_P_C AND proceso_clausula.proceso_IDP=proceso.IDP AND proceso.departamento_IDDE=departamento.IDDE AND programa_auditoria.pa_ID=programa_auditoria_proceso.pap_fecha_aud AND plan_de_auditoria.programa_plan=programa_auditoria.pa_ID AND programa_auditoria.pa_ID=$ID_prog";
$proc_del_plan = mysql_query($query_proc_del_plan, $LukivenProyecto) or die(mysql_error());
//$row_proc_del_plan = mysql_fetch_assoc($proc_del_plan);
$totalRows_proc_del_plan = mysql_num_rows($proc_del_plan);

//ingresamos los procesos al plan 
while ( $row_proc_del_plan = mysql_fetch_assoc($proc_del_plan)) {
//ingresamos los procesos al plan 

	$id_pda_pdap=$row_proc_del_plan['id_plan'];
	$fecha_pdap=$row_proc_del_plan['fecha_p_ejec'];
	$proceso_pdap=$row_proc_del_plan['nombre_pro'];
	$requisito_pdap=$row_proc_del_plan['clausulas_IDC'];
	$responsableProceso_pdap=$row_proc_del_plan['responsable_proc'];

	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_insert_plan_prog = sprintf("INSERT INTO plan_de_auditoria_proceso (id_pda_pdap,fecha_pdap,proceso_pdap,requisito_pdap,auditados_pdap) values (%s,%s,%s,%s,%s)",GetSQLValueString($id_pda_pdap, "int"),GetSQLValueString($fecha_pdap, "text"),GetSQLValueString($proceso_pdap, "text"),GetSQLValueString($requisito_pdap, "text"),GetSQLValueString($responsableProceso_pdap, "text"));
$insert_plan_prog = mysql_query($query_insert_plan_prog, $LukivenProyecto) or die(mysql_error());
//mysql_free_result($insert_plan_prog);


	# code...
}

//ver la relacion entre plan y programa para ingresarla en la tabla maestra
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_IDES_plan_prog = sprintf("SELECT * FROM plan_de_auditoria where programa_plan=%s",GetSQLValueString($ID_prog, "int"));
$IDES_plan_prog = mysql_query($query_IDES_plan_prog, $LukivenProyecto) or die(mysql_error());
$row_IDES_plan_prog = mysql_fetch_assoc($IDES_plan_prog);

//insertamos el id del plan y programa en la tabla auditor 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_insert_plan_prog = sprintf("UPDATE  auditorias  set plan_id=%s  where programa=%s",GetSQLValueString($row_IDES_plan_prog['id_plan'], "int"),GetSQLValueString($ID_prog, "int"));
$insert_plan_prog = mysql_query($query_insert_plan_prog, $LukivenProyecto) or die(mysql_error());


return "Insertado correctamente";
}


function verIdenerplan($Idderplan)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_idDer_plan = sprintf("SELECT * FROM plan_de_auditoria WHERE  programa_plan=%s", GetSQLValueString($Idderplan, "int"));
$idDer_plan = mysql_query($query_idDer_plan, $LukivenProyecto) or die(mysql_error());
$row_idDer_plan = mysql_fetch_assoc($idDer_plan);
//$totalRows_Replan = mysql_num_rows($Replan);

return $row_idDer_plan['id_plan'];

}




function consultarNombreapellidoporUsuarioEnProceso($USUARIO)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Nombre_apellido = sprintf("SELECT * FROM usuario WHERE  USUARIO=%s", GetSQLValueString($USUARIO, "text"));
$Nombre_apellido = mysql_query($query_Nombre_apellido, $LukivenProyecto) or die(mysql_error());
$row_Nombre_apellido = mysql_fetch_assoc($Nombre_apellido);
//$totalRNombre_apellido = mysql_num_roNombre_apellido);

return $row_Nombre_apellido;

}

function actualizarfechaejc($ID_prog)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	
	

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);

//consultamos todo lo relacionado con el programa para ingresarlo al plan
$query_proc_del_plan = "SELECT * FROM departamento,proceso,proceso_clausula,programa_auditoria ,plan_de_auditoria,programa_auditoria_proceso WHERE programa_auditoria_proceso.pap_IDPC=proceso_clausula.ID_P_C AND proceso_clausula.proceso_IDP=proceso.IDP AND proceso.departamento_IDDE=departamento.IDDE AND programa_auditoria.pa_ID=programa_auditoria_proceso.pap_fecha_aud AND plan_de_auditoria.programa_plan=programa_auditoria.pa_ID AND programa_auditoria.pa_ID=$ID_prog";
$proc_del_plan = mysql_query($query_proc_del_plan, $LukivenProyecto) or die(mysql_error());
$row_proc_del_plan_a = mysql_fetch_assoc($proc_del_plan);//ya consultado
//$totalRows_proc_del_plan = mysql_num_rows($proc_del_plan);


///------------------
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);

//consultamos todo lo relacionado con el programa para ingresarlo al plan
$query_proc_del_plan2 = "SELECT * FROM departamento,proceso,proceso_clausula,programa_auditoria ,plan_de_auditoria,programa_auditoria_proceso WHERE programa_auditoria_proceso.pap_IDPC=proceso_clausula.ID_P_C AND proceso_clausula.proceso_IDP=proceso.IDP AND proceso.departamento_IDDE=departamento.IDDE AND programa_auditoria.pa_ID=programa_auditoria_proceso.pap_fecha_aud AND plan_de_auditoria.programa_plan=programa_auditoria.pa_ID AND programa_auditoria.pa_ID=$ID_prog";
$proc_del_plan2 = mysql_query($query_proc_del_plan2, $LukivenProyecto) or die(mysql_error());

//--------------------

//consultar procesos cargados en plan de auditoria proceso  para omitirlos
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Cons_proc_plan = sprintf("SELECT * FROM plan_de_auditoria_proceso WHERE  id_pda_pdap=%s", GetSQLValueString($row_proc_del_plan_a['id_plan'], "int"));
$Cons_proc_plan = mysql_query($query_Cons_proc_plan, $LukivenProyecto) or die(mysql_error());

$tvCon=0;
while ( $row_proc_del_plan = mysql_fetch_assoc($proc_del_plan2)) {
	$tvCon++;
	# code...
$A_tv_nombre[$tvCon]=$row_proc_del_plan['nombre_pro'];
$A_tv_fecha[$tvCon]=$row_proc_del_plan['fecha_p_ejec'];

}
$tnCon=0;
while ( $Plan_Auditoria=mysql_fetch_assoc($Cons_proc_plan)) {
	# code...
		$tnCon++;
	# code...
$A_tn_nombre[$tnCon]=$Plan_Auditoria['proceso_pdap'];
$A_tn_fecha[$tnCon]=$Plan_Auditoria['fecha_pdap'];
$A_tn_id_pdap[$tnCon]=$Plan_Auditoria['id_pdap'];
}
mysql_free_result($Cons_proc_plan);
mysql_free_result($proc_del_plan);

for ($tv=1; $tv <=$tvCon ; $tv++) { 

	for ($tn=1; $tn <=$tnCon ; $tn++) { 
		# code...
		if ($A_tv_nombre[$tv]==$A_tn_nombre[$tn]  ) {
//echo "tv::".$A_tv_nombre[$tv]." TN::".$A_tn_nombre[$tn]." -";
			# code...
			//echo "tvcon:".$tvCon." tnCon:".$tnCon;
 			//global $database_LukivenProyecto, $LukivenProyecto;
			mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
			$query_Actualizar_fecha[$tv] = sprintf("UPDATE  plan_de_auditoria_proceso  set fecha_pdap=%s WHERE id_pdap=%s", GetSQLValueString($A_tv_fecha[$tv], "text"), GetSQLValueString($A_tn_id_pdap[$tn], "int"));
			$Actualizar_fecha[$tv] = mysql_query($query_Actualizar_fecha[$tv], $LukivenProyecto) or die(mysql_error());
			
		}
	}
	# code...
}





}

function UpdatePlanDesdeProg($ID_prog)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	# code...
	

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);

//consultamos todo lo relacionado con el programa para ingresarlo al plan
$query_proc_del_plan = "SELECT * FROM departamento,proceso,proceso_clausula,programa_auditoria ,plan_de_auditoria,programa_auditoria_proceso WHERE programa_auditoria_proceso.pap_IDPC=proceso_clausula.ID_P_C AND proceso_clausula.proceso_IDP=proceso.IDP AND proceso.departamento_IDDE=departamento.IDDE AND programa_auditoria.pa_ID=programa_auditoria_proceso.pap_fecha_aud AND plan_de_auditoria.programa_plan=programa_auditoria.pa_ID AND programa_auditoria.pa_ID=$ID_prog";
$proc_del_plan = mysql_query($query_proc_del_plan, $LukivenProyecto) or die(mysql_error());
$row_proc_del_plan_a = mysql_fetch_assoc($proc_del_plan);
$totalRows_proc_del_plan = mysql_num_rows($proc_del_plan);

//---------------------2 por si acaso
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);

//consultamos todo lo relacionado con el programa para ingresarlo al plan
$query_proc_del_plan2 = "SELECT * FROM departamento,proceso,proceso_clausula,programa_auditoria ,plan_de_auditoria,programa_auditoria_proceso WHERE programa_auditoria_proceso.pap_IDPC=proceso_clausula.ID_P_C AND proceso_clausula.proceso_IDP=proceso.IDP AND proceso.departamento_IDDE=departamento.IDDE AND programa_auditoria.pa_ID=programa_auditoria_proceso.pap_fecha_aud AND plan_de_auditoria.programa_plan=programa_auditoria.pa_ID AND programa_auditoria.pa_ID=$ID_prog";
$proc_del_plan2 = mysql_query($query_proc_del_plan2, $LukivenProyecto) or die(mysql_error());
//------------------

//consultar procesos cargados en plan de auditoria proceso  para omitirlos
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Cons_proc_plan = sprintf("SELECT * FROM plan_de_auditoria_proceso WHERE  id_pda_pdap=%s", GetSQLValueString($row_proc_del_plan_a['id_plan'], "int"));
$Cons_proc_plan = mysql_query($query_Cons_proc_plan, $LukivenProyecto) or die(mysql_error());
//$row_Cons_proc_plan = mysql_fetch_assoc($Cons_proc_plan);

$Num=0;
while ( $row_Cons_proc_plan = mysql_fetch_assoc($Cons_proc_plan)) {
	# code...
	$arrayDelPlan[$Num]=$row_Cons_proc_plan['proceso_pdap'];
	$Num++;
}


$procede=3;
while ( $row_proc_del_plan = mysql_fetch_assoc($proc_del_plan2)) {
$procede=0;

for ($kkk=0; $kkk <count($arrayDelPlan) ; $kkk++) { 
	# code...
	if ($arrayDelPlan[$kkk]==$row_proc_del_plan['nombre_pro']) {
		# code...

 	$procede++;
	}
}


	if ( $procede==0) {
	
		# code...
	
//ingresamos los procesos al plan 
	
	$id_pda_pdap=$row_proc_del_plan['id_plan'];
	$fecha_pdap=$row_proc_del_plan['fecha_p_ejec'];
	$proceso_pdap=$row_proc_del_plan['nombre_pro'];
	$requisito_pdap=$row_proc_del_plan['clausulas_IDC'];
	$responsableProceso_pdap=$row_proc_del_plan['responsable_proc'];

	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_insert_plan_prog = sprintf("INSERT INTO plan_de_auditoria_proceso (id_pda_pdap,fecha_pdap,proceso_pdap,requisito_pdap,auditados_pdap) values (%s,%s,%s,%s,%s)",GetSQLValueString($id_pda_pdap, "int"),GetSQLValueString($fecha_pdap, "text"),GetSQLValueString($proceso_pdap, "text"),GetSQLValueString($requisito_pdap, "text"),GetSQLValueString($responsableProceso_pdap, "text"));
$insert_plan_prog = mysql_query($query_insert_plan_prog, $LukivenProyecto) or die(mysql_error());
//mysql_free_result($insert_plan_prog);

	}
	






	# code...
}

	if ($procede==0) {
		# code...
return "Insertado correctamente";
	}else{
		return "Nada se modifico";
	}

}

function VerUsuario($USUARIO)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Nombre_apellido = sprintf("SELECT * FROM usuario WHERE  USUARIO=%s", GetSQLValueString($USUARIO, "text"));
$Nombre_apellido = mysql_query($query_Nombre_apellido, $LukivenProyecto) or die(mysql_error());
$row_Nombre_apellido = mysql_fetch_assoc($Nombre_apellido);
//$totalRNombre_apellido = mysql_num_roNombre_apellido);

return $row_Nombre_apellido['NOMBRE']." ".$row_Nombre_apellido['APELLIDO'];

}


function SolicitarAuditor_L_I_O($ValorUsuario)
{
	global $database_LukivenProyecto, $LukivenProyecto;

	if ($ValorUsuario==1) {
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_procesos = "SELECT * FROM usuario WHERE TIPOUSU Between 1 and 2";
$procesos = mysql_query($query_procesos, $LukivenProyecto) or die(mysql_error());
	}elseif ($ValorUsuario==2) {
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_procesos = "SELECT * FROM usuario WHERE TIPOUSU Between 1 and 3";
$procesos = mysql_query($query_procesos, $LukivenProyecto) or die(mysql_error());
	}elseif ($ValorUsuario==3) {
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_procesos = "SELECT * FROM usuario WHERE TIPOUSU=4";
$procesos = mysql_query($query_procesos, $LukivenProyecto) or die(mysql_error());
	}

	return $procesos;
	# code...
}
function TraerADelPlan($id_pdap)
{
	# code...

	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_T_A_D_P = "SELECT * FROM auditores_plan WHERE id_plan=$id_pdap;";
$T_A_D_P = mysql_query($query_T_A_D_P, $LukivenProyecto) or die(mysql_error());
//$Assoc_T_A_D_P=mysql_fetch_assoc($T_A_D_P);
return $T_A_D_P;

}


function N_Y_A_DeUsuario($USUARIO)
{
	# code...

	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_NYA_usuario = "SELECT * FROM usuario WHERE USUARIO='$USUARIO' ";
$NYA_usuario = mysql_query($query_NYA_usuario, $LukivenProyecto) or die(mysql_error());
$Assoc_NYA_usuario=mysql_fetch_assoc($NYA_usuario);
return $Assoc_NYA_usuario['NOMBRE']." ".$Assoc_NYA_usuario['APELLIDO'];

}



function CargarProcesosAsignados($USUARIO)
{
	# code...

	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_c_id_plan = "SELECT * FROM auditores_plan WHERE usuario_plan='$USUARIO'  ";
$c_id_plan = mysql_query($query_c_id_plan, $LukivenProyecto) or die(mysql_error());
//$Assoc_c_id_plan=mysql_fetch_assoc($c_id_plan);






return $c_id_plan;

}

function IgresarAuditorss($tipoUsuario,$usuario,$idPLan)
{
	# code...

	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_T_A_D_P = sprintf("INSERT INTO auditores_plan (id_plan,usuario_plan,tipo_usuario_plan) values (%s,%s,%s)",GetSQLValueString($idPLan, "int"),GetSQLValueString($usuario,"text"),GetSQLValueString($tipoUsuario, "int"));
$T_A_D_P = mysql_query($query_T_A_D_P, $LukivenProyecto) or die(mysql_error());




}


//function LLevarAuditores_ProcesosAuser_I($idproc,$idInform)//ESTOOOOOOOOOOOOOOOO
function LLevarAuditores_ProcesosAuser_I($idproc)
{	
		global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Check_InfExist = "SELECT * FROM  informe_aud WHERE id_proceso_plan_informe=$idproc;";
$Check_InfExist = mysql_query($query_Check_InfExist, $LukivenProyecto) or die(mysql_error());
$assoc_Check_InfExist=mysql_fetch_assoc($Check_InfExist);
$Num_Check_InfExist=mysql_num_rows($Check_InfExist); 

if ($Num_Check_InfExist>0) {
	# code...
$idInform=$assoc_Check_InfExist['idinforme_au'];


	//global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_id_m_plan = "SELECT * FROM  auditores_plan WHERE id_plan=$idproc;";
$id_m_plan = mysql_query($query_id_m_plan, $LukivenProyecto) or die(mysql_error());

$Aud="";
$Aud_tipo="";
while ($Assoc_id_m_plan=mysql_fetch_assoc($id_m_plan)) {
	$Aud[]=$Assoc_id_m_plan['usuario_plan'];
$Aud_tipo[]=$Assoc_id_m_plan['tipo_usuario_plan'];
}


//	echo "<script>console.log(' por acad-".$idInform."');</script>";
//seleccionamos los usuarios en el informe para actualizar los datos 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_usuarios_en_inf = "SELECT * FROM  usuario_has_informe_aud WHERE informe_aud_idinforme_au=$idInform;";
$usuarios_en_inf = mysql_query($query_usuarios_en_inf, $LukivenProyecto) or die(mysql_error());
$row_usuarios_en_inf=mysql_num_rows($usuarios_en_inf);
$suma_de_alteraciones=0;

if ($row_usuarios_en_inf>0) {
	# code...

	$usu_info="";
	while ($Q_usuarios_en_inf=mysql_fetch_assoc($usuarios_en_inf)) {
		$usu_info[]=$Q_usuarios_en_inf['usuario_USUARIO'];
		$usu_info_tipo[]=$Q_usuarios_en_inf['tipo'];
	}



	//comparamos entre los usuarios del proceso en auditores con los usuarios en usuario_has_informe para ingresar los no incluidos en usuario_has_informe
	for ($a_p=0; $a_p <count($Aud) ; $a_p++) { 
		$existe="no";
		# code...
		for ($u_I=0; $u_I <count($usu_info) ; $u_I++) { 
			# code...
			if ($Aud_tipo[$a_p]==2) {
				$TextTipo='interno';
			}elseif ($Aud_tipo[$a_p]==3) {
				$TextTipo='observador';
			}
				if ($Aud_tipo[$a_p]!=1) {
					# code...
			if ($Aud[$a_p]==$usu_info[$u_I] && $TextTipo==$usu_info_tipo[$u_I]) {
					
					$existe="si";


			}
				}

													  }
		if ($existe=="no" && $Aud_tipo[$a_p]!=1) {//si no existe ingresalo 


if ($Aud_tipo[$a_p]==2) {
				$TextTipo='interno';
			}elseif ($Aud_tipo[$a_p]==3) {
				$TextTipo='observador';
			}

			


			mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_T_A_D_P = sprintf("INSERT INTO usuario_has_informe_aud (usuario_USUARIO,informe_aud_idinforme_au,tipo) values (%s,%s,%s)",GetSQLValueString($Aud[$a_p], "text"),GetSQLValueString($idInform,"int"),GetSQLValueString($TextTipo, "text"));
$T_A_D_P = mysql_query($query_T_A_D_P, $LukivenProyecto) or die(mysql_error());
			# code...
$suma_de_alteraciones++;

		}
	}

return "Alterados::".$suma_de_alteraciones;
}else
{
	for ($a_p=0; $a_p <count($Aud) ; $a_p++) { 
		if ( $Aud_tipo[$a_p]!=1  ) {//


if ($Aud_tipo[$a_p]==2) {
				$TextTipo='interno';
			}elseif ($Aud_tipo[$a_p]==3) {
				$TextTipo='observador';
			}




			mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_T_A_D_P = sprintf("INSERT INTO usuario_has_informe_aud (usuario_USUARIO,informe_aud_idinforme_au,tipo) values (%s,%s,%s)",GetSQLValueString($Aud[$a_p], "text"),GetSQLValueString($idInform,"int"),GetSQLValueString($TextTipo, "text"));
$T_A_D_P = mysql_query($query_T_A_D_P, $LukivenProyecto) or die(mysql_error());
			# code...
$suma_de_alteraciones++;

		}
	}
	return "Ingresados::".$suma_de_alteraciones;
}
}else{
	return "No existe informe aún";
}

}


function idDeMiPlan($idprog)
{
	# code...

	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_id_m_plan = "SELECT * FROM  plan_de_auditoria WHERE programa_plan=$idprog;";
$id_m_plan = mysql_query($query_id_m_plan, $LukivenProyecto) or die(mysql_error());
$Assoc_id_m_plan=mysql_fetch_assoc($id_m_plan);
return $Assoc_id_m_plan['id_plan'];

}
function idDeMiProgDesdIdPlan($id_plan)
{
	# code...

	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_id_M_P_D_I_P = "SELECT * FROM  plan_de_auditoria WHERE id_plan=$id_plan;";
$id_M_P_D_I_P = mysql_query($query_id_M_P_D_I_P, $LukivenProyecto) or die(mysql_error());
$Assoc_id_M_P_D_I_P=mysql_fetch_assoc($id_M_P_D_I_P);
return $Assoc_id_M_P_D_I_P['programa_plan'];

}

function idDeMiPlan2($programa_plan)
{
	# code...
$hostname_LukivenProyecto = "localhost";
$database_LukivenProyecto = "proyectopendriver";
$username_LukivenProyecto = "root";
$password_LukivenProyecto = "";
$LukivenProyecto = mysql_pconnect($hostname_LukivenProyecto, $username_LukivenProyecto, $password_LukivenProyecto) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_set_charset('utf8');
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_id_M_P_D_I_P2 = "SELECT * FROM  plan_de_auditoria WHERE programa_plan=$programa_plan;";
$id_M_P_D_I_P2 = mysql_query($query_id_M_P_D_I_P2, $LukivenProyecto) or die(mysql_error());
$Assoc_id_M_P_D_I_P2=mysql_fetch_assoc($id_M_P_D_I_P2);
return $Assoc_id_M_P_D_I_P2['id_plan'];

}


//checamos su existencia 
function checkarMatrize($ID)
{

	error_reporting(E_ALL ^ E_DEPRECATED);
	# code...

	$hostname_LukivenProyecto = "localhost";
$database_LukivenProyecto = "proyectopendriver";
$username_LukivenProyecto = "root";
$password_LukivenProyecto = "";

$LukivenProyecto = mysql_pconnect($hostname_LukivenProyecto, $username_LukivenProyecto, $password_LukivenProyecto) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_set_charset('utf8');

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);

$query_cM = "SELECT * FROM  matriz_riesgo WHERE id_plan=$ID;";
$cM = mysql_query($query_cM, $LukivenProyecto) or die(mysql_error());
$Assoc_cM=mysql_fetch_assoc($cM);
$Nfilas=mysql_num_rows($cM);
return ($Nfilas>0);

}

//checamos su existencia 
function checkarMatriz()
{
	error_reporting(E_ALL ^ E_DEPRECATED);
	# code...

	$hostname_LukivenProyecto = "localhost";
$database_LukivenProyecto = "proyectopendriver";
$username_LukivenProyecto = "root";
$password_LukivenProyecto = "";
$LukivenProyecto = mysql_pconnect($hostname_LukivenProyecto, $username_LukivenProyecto, $password_LukivenProyecto) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_set_charset('utf8');
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$id=$_GET['id'];
$query_cM = "SELECT * FROM  matriz_riesgo WHERE id_plan=$id;";
$cM = mysql_query($query_cM, $LukivenProyecto) or die(mysql_error());
$Assoc_cM=mysql_fetch_assoc($cM);
$Nfilas=mysql_num_rows($cM);
return ($Nfilas>0);

}

//insertando la matriz del plan 
if ((isset($_POST['comand_func'])) &&  $_POST['comand_func']=="insertar_Matriz_plan" ) {




$result=checkarMatriz();

if ($result==true) {//
	
	ModificarMatriz();
	# code...
}else { if ($result==false) {
	InsertarMatriz();

}

}
}

 function InsertarMatriz()
{
	# code...
error_reporting(E_ALL ^ E_DEPRECATED);

 //global $database_LukivenProyecto, $LukivenProyecto;
//se recrean las variables de conexion por que estas variables en funciones.php no existen .
$hostname_LukivenProyecto = "localhost";
$database_LukivenProyecto = "proyectopendriver";
$username_LukivenProyecto = "root";
$password_LukivenProyecto = "";
$LukivenProyecto = mysql_pconnect($hostname_LukivenProyecto, $username_LukivenProyecto, $password_LukivenProyecto) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_set_charset('utf8');

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M1 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(1,"int"),
	GetSQLValueString($_POST['Riesg1'], "text"),
	GetSQLValueString($_POST['Probabilidad1'], "text"),
	GetSQLValueString($_POST['Impacto1'],"text"),
	GetSQLValueString($_POST['nivel_riesgo1_v'], "text"),
	GetSQLValueString($_POST['medida_control1_v'],"text"),
	GetSQLValueString($_POST['responsable1_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M1 = mysql_query($query_Insert_M1, $LukivenProyecto) or die(mysql_error());
	

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M2 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(2,"int"),
	GetSQLValueString($_POST['Riesg2'], "text"),
	GetSQLValueString($_POST['Probabilidad2'], "text"),
	GetSQLValueString($_POST['Impacto2'],"text"),
	GetSQLValueString($_POST['nivel_riesgo2_v'], "text"),
	GetSQLValueString($_POST['medida_control2_v'],"text"),
	GetSQLValueString($_POST['responsable2_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M2 = mysql_query($query_Insert_M2, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M3 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(3,"int"),
	GetSQLValueString($_POST['Riesg3'], "text"),
	GetSQLValueString($_POST['Probabilidad3'], "text"),
	GetSQLValueString($_POST['Impacto3'],"text"),
	GetSQLValueString($_POST['nivel_riesgo3_v'], "text"),
	GetSQLValueString($_POST['medida_control3_v'],"text"),
	GetSQLValueString($_POST['responsable3_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M3 = mysql_query($query_Insert_M3, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M4 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(4,"int"),
	GetSQLValueString($_POST['Riesg4'], "text"),
	GetSQLValueString($_POST['Probabilidad4'], "text"),
	GetSQLValueString($_POST['Impacto4'],"text"),
	GetSQLValueString($_POST['nivel_riesgo4_v'], "text"),
	GetSQLValueString($_POST['medida_control4_v'],"text"),
	GetSQLValueString($_POST['responsable4_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M4 = mysql_query($query_Insert_M4, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M5 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(5,"int"),
	GetSQLValueString($_POST['Riesg5'], "text"),
	GetSQLValueString($_POST['Probabilidad5'], "text"),
	GetSQLValueString($_POST['Impacto5'],"text"),
	GetSQLValueString($_POST['nivel_riesgo5_v'], "text"),
	GetSQLValueString($_POST['medida_control5_v'],"text"),
	GetSQLValueString($_POST['responsable5_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M5 = mysql_query($query_Insert_M5, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M6 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(6,"int"),
	GetSQLValueString($_POST['Riesg6'], "text"),
	GetSQLValueString($_POST['Probabilidad6'], "text"),
	GetSQLValueString($_POST['Impacto6'],"text"),
	GetSQLValueString($_POST['nivel_riesgo6_v'], "text"),
	GetSQLValueString($_POST['medida_control6_v'],"text"),
	GetSQLValueString($_POST['responsable6_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M6 = mysql_query($query_Insert_M6, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M7 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(7,"int"),
	GetSQLValueString($_POST['Riesg7'], "text"),
	GetSQLValueString($_POST['Probabilidad7'], "text"),
	GetSQLValueString($_POST['Impacto7'],"text"),
	GetSQLValueString($_POST['nivel_riesgo7_v'], "text"),
	GetSQLValueString($_POST['medida_control7_v'],"text"),
	GetSQLValueString($_POST['responsable7_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M7 = mysql_query($query_Insert_M7, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M8 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(8,"int"),
	GetSQLValueString($_POST['Riesg8'], "text"),
	GetSQLValueString($_POST['Probabilidad8'], "text"),
	GetSQLValueString($_POST['Impacto8'],"text"),
	GetSQLValueString($_POST['nivel_riesgo8_v'], "text"),
	GetSQLValueString($_POST['medida_control8_v'],"text"),
	GetSQLValueString($_POST['responsable8_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M8 = mysql_query($query_Insert_M8, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M9 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(9,"int"),
	GetSQLValueString($_POST['Riesg9'], "text"),
	GetSQLValueString($_POST['Probabilidad9'], "text"),
	GetSQLValueString($_POST['Impacto9'],"text"),
	GetSQLValueString($_POST['nivel_riesgo9_v'], "text"),
	GetSQLValueString($_POST['medida_control9_v'],"text"),
	GetSQLValueString($_POST['responsable9_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M9 = mysql_query($query_Insert_M9, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M10 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(10,"int"),
	GetSQLValueString($_POST['Riesg10'], "text"),
	GetSQLValueString($_POST['Probabilidad10'], "text"),
	GetSQLValueString($_POST['Impacto10'],"text"),
	GetSQLValueString($_POST['nivel_riesgo10_v'], "text"),
	GetSQLValueString($_POST['medida_control10_v'],"text"),
	GetSQLValueString($_POST['responsable10_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M10 = mysql_query($query_Insert_M10, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M11 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(11,"int"),
	GetSQLValueString($_POST['Riesg11'], "text"),
	GetSQLValueString($_POST['Probabilidad11'], "text"),
	GetSQLValueString($_POST['Impacto11'],"text"),
	GetSQLValueString($_POST['nivel_riesgo11_v'], "text"),
	GetSQLValueString($_POST['medida_control11_v'],"text"),
	GetSQLValueString($_POST['responsable11_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M11 = mysql_query($query_Insert_M11, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M12 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(12,"int"),
	GetSQLValueString($_POST['Riesg12'], "text"),
	GetSQLValueString($_POST['Probabilidad12'], "text"),
	GetSQLValueString($_POST['Impacto12'],"text"),
	GetSQLValueString($_POST['nivel_riesgo12_v'], "text"),
	GetSQLValueString($_POST['medida_control12_v'],"text"),
	GetSQLValueString($_POST['responsable12_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M12 = mysql_query($query_Insert_M12, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M13 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(13,"int"),
	GetSQLValueString($_POST['Riesg13'], "text"),
	GetSQLValueString($_POST['Probabilidad13'], "text"),
	GetSQLValueString($_POST['Impacto13'],"text"),
	GetSQLValueString($_POST['nivel_riesgo13_v'], "text"),
	GetSQLValueString($_POST['medida_control13_v'],"text"),
	GetSQLValueString($_POST['responsable13_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M13 = mysql_query($query_Insert_M13, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M14 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(14,"int"),
	GetSQLValueString($_POST['Riesg14'], "text"),
	GetSQLValueString($_POST['Probabilidad14'], "text"),
	GetSQLValueString($_POST['Impacto14'],"text"),
	GetSQLValueString($_POST['nivel_riesgo14_v'], "text"),
	GetSQLValueString($_POST['medida_control14_v'],"text"),
	GetSQLValueString($_POST['responsable14_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M14 = mysql_query($query_Insert_M14, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M15 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(15,"int"),
	GetSQLValueString($_POST['Riesg15'], "text"),
	GetSQLValueString($_POST['Probabilidad15'], "text"),
	GetSQLValueString($_POST['Impacto15'],"text"),
	GetSQLValueString($_POST['nivel_riesgo15_v'], "text"),
	GetSQLValueString($_POST['medida_control15_v'],"text"),
	GetSQLValueString($_POST['responsable15_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M15 = mysql_query($query_Insert_M15, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M16 = sprintf("INSERT INTO matriz_riesgo (id_plan,n_fila_M,riesgo_M,probabilidad_M,impacto_M,nivel_riesgo_M,medida_control_M,responsable_M,aprobada_M) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(16,"int"),
	GetSQLValueString($_POST['Riesg16'], "text"),
	GetSQLValueString($_POST['Probabilidad16'], "text"),
	GetSQLValueString($_POST['Impacto16'],"text"),
	GetSQLValueString($_POST['nivel_riesgo16_v'], "text"),
	GetSQLValueString($_POST['medida_control16_v'],"text"),
	GetSQLValueString($_POST['responsable16_v'], "text"),
	GetSQLValueString(1, "int"));
$Insert_M16 = mysql_query($query_Insert_M16, $LukivenProyecto) or die(mysql_error());
	

	//header("location:../matriz_riesgo.php?id=".idDeMiPlan2($_GET['id']));

 if ((isset($_GET['fffr'])) && $_GET['fffr']=="aNP") {

header("location:../asig_aud_no_plan.php?id=".$_GET['id']);

 }else{

header("location:../plan_auditoria.php?id=".$_GET['id']);
 }

}


function ModificarMatriz()
{
	# code...
error_reporting(E_ALL ^ E_DEPRECATED);

 //global $database_LukivenProyecto, $LukivenProyecto;
//se recrean las variables de conexion por que estas variables en funciones.php no existen .
$hostname_LukivenProyecto = "localhost";
$database_LukivenProyecto = "proyectopendriver";
$username_LukivenProyecto = "root";
$password_LukivenProyecto = "";
$LukivenProyecto = mysql_pconnect($hostname_LukivenProyecto, $username_LukivenProyecto, $password_LukivenProyecto) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_set_charset('utf8');

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);

$query_Insert_M1 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg1'], "text"),
	GetSQLValueString($_POST['Probabilidad1'], "text"),
	GetSQLValueString($_POST['Impacto1'],"text"),
	GetSQLValueString($_POST['nivel_riesgo1_v'], "text"),
	GetSQLValueString($_POST['medida_control1_v'],"text"),
	GetSQLValueString($_POST['responsable1_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(1,"int"));
$Insert_M1 = mysql_query($query_Insert_M1, $LukivenProyecto) or die(mysql_error());
	

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M2 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg2'], "text"),
	GetSQLValueString($_POST['Probabilidad2'], "text"),
	GetSQLValueString($_POST['Impacto2'],"text"),
	GetSQLValueString($_POST['nivel_riesgo2_v'], "text"),
	GetSQLValueString($_POST['medida_control2_v'],"text"),
	GetSQLValueString($_POST['responsable2_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(2,"int"));
$Insert_M2 = mysql_query($query_Insert_M2, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M3 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg3'], "text"),
	GetSQLValueString($_POST['Probabilidad3'], "text"),
	GetSQLValueString($_POST['Impacto3'],"text"),
	GetSQLValueString($_POST['nivel_riesgo3_v'], "text"),
	GetSQLValueString($_POST['medida_control3_v'],"text"),
	GetSQLValueString($_POST['responsable3_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(3,"int"));
$Insert_M3 = mysql_query($query_Insert_M3, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M4 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg4'], "text"),
	GetSQLValueString($_POST['Probabilidad4'], "text"),
	GetSQLValueString($_POST['Impacto4'],"text"),
	GetSQLValueString($_POST['nivel_riesgo4_v'], "text"),
	GetSQLValueString($_POST['medida_control4_v'],"text"),
	GetSQLValueString($_POST['responsable4_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(4,"int"));
$Insert_M4 = mysql_query($query_Insert_M4, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M5 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg5'], "text"),
	GetSQLValueString($_POST['Probabilidad5'], "text"),
	GetSQLValueString($_POST['Impacto5'],"text"),
	GetSQLValueString($_POST['nivel_riesgo5_v'], "text"),
	GetSQLValueString($_POST['medida_control5_v'],"text"),
	GetSQLValueString($_POST['responsable5_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(5,"int"));
$Insert_M5 = mysql_query($query_Insert_M5, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M6 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg6'], "text"),
	GetSQLValueString($_POST['Probabilidad6'], "text"),
	GetSQLValueString($_POST['Impacto6'],"text"),
	GetSQLValueString($_POST['nivel_riesgo6_v'], "text"),
	GetSQLValueString($_POST['medida_control6_v'],"text"),
	GetSQLValueString($_POST['responsable6_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(6,"int"));
$Insert_M6 = mysql_query($query_Insert_M6, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M7 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg7'], "text"),
	GetSQLValueString($_POST['Probabilidad7'], "text"),
	GetSQLValueString($_POST['Impacto7'],"text"),
	GetSQLValueString($_POST['nivel_riesgo7_v'], "text"),
	GetSQLValueString($_POST['medida_control7_v'],"text"),
	GetSQLValueString($_POST['responsable7_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(7,"int"));
$Insert_M7 = mysql_query($query_Insert_M7, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M8 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg8'], "text"),
	GetSQLValueString($_POST['Probabilidad8'], "text"),
	GetSQLValueString($_POST['Impacto8'],"text"),
	GetSQLValueString($_POST['nivel_riesgo8_v'], "text"),
	GetSQLValueString($_POST['medida_control8_v'],"text"),
	GetSQLValueString($_POST['responsable8_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(8,"int"));
$Insert_M8 = mysql_query($query_Insert_M8, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M9 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg9'], "text"),
	GetSQLValueString($_POST['Probabilidad9'], "text"),
	GetSQLValueString($_POST['Impacto9'],"text"),
	GetSQLValueString($_POST['nivel_riesgo9_v'], "text"),
	GetSQLValueString($_POST['medida_control9_v'],"text"),
	GetSQLValueString($_POST['responsable9_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(9,"int"));
$Insert_M9 = mysql_query($query_Insert_M9, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M10 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg10'], "text"),
	GetSQLValueString($_POST['Probabilidad10'], "text"),
	GetSQLValueString($_POST['Impacto10'],"text"),
	GetSQLValueString($_POST['nivel_riesgo10_v'], "text"),
	GetSQLValueString($_POST['medida_control10_v'],"text"),
	GetSQLValueString($_POST['responsable10_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(10,"int"));
$Insert_M10 = mysql_query($query_Insert_M10, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M11 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg11'], "text"),
	GetSQLValueString($_POST['Probabilidad11'], "text"),
	GetSQLValueString($_POST['Impacto11'],"text"),
	GetSQLValueString($_POST['nivel_riesgo11_v'], "text"),
	GetSQLValueString($_POST['medida_control11_v'],"text"),
	GetSQLValueString($_POST['responsable11_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(11,"int"));
$Insert_M11 = mysql_query($query_Insert_M11, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M12 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg12'], "text"),
	GetSQLValueString($_POST['Probabilidad12'], "text"),
	GetSQLValueString($_POST['Impacto12'],"text"),
	GetSQLValueString($_POST['nivel_riesgo12_v'], "text"),
	GetSQLValueString($_POST['medida_control12_v'],"text"),
	GetSQLValueString($_POST['responsable12_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(12,"int"));
$Insert_M12 = mysql_query($query_Insert_M12, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M13 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg13'], "text"),
	GetSQLValueString($_POST['Probabilidad13'], "text"),
	GetSQLValueString($_POST['Impacto13'],"text"),
	GetSQLValueString($_POST['nivel_riesgo13_v'], "text"),
	GetSQLValueString($_POST['medida_control13_v'],"text"),
	GetSQLValueString($_POST['responsable13_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(13,"int"));
$Insert_M13 = mysql_query($query_Insert_M13, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M14 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg14'], "text"),
	GetSQLValueString($_POST['Probabilidad14'], "text"),
	GetSQLValueString($_POST['Impacto14'],"text"),
	GetSQLValueString($_POST['nivel_riesgo14_v'], "text"),
	GetSQLValueString($_POST['medida_control14_v'],"text"),
	GetSQLValueString($_POST['responsable14_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(14,"int"));
$Insert_M14 = mysql_query($query_Insert_M14, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M15 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg15'], "text"),
	GetSQLValueString($_POST['Probabilidad15'], "text"),
	GetSQLValueString($_POST['Impacto15'],"text"),
	GetSQLValueString($_POST['nivel_riesgo15_v'], "text"),
	GetSQLValueString($_POST['medida_control15_v'],"text"),
	GetSQLValueString($_POST['responsable15_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(15,"int"));
$Insert_M15 = mysql_query($query_Insert_M15, $LukivenProyecto) or die(mysql_error());
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Insert_M16 = sprintf("UPDATE  matriz_riesgo set riesgo_M=%s,probabilidad_M=%s,impacto_M=%s,nivel_riesgo_M=%s,medida_control_M=%s,responsable_M=%s,aprobada_M=%s where id_plan=%s and n_fila_M=%s",
	GetSQLValueString($_POST['Riesg16'], "text"),
	GetSQLValueString($_POST['Probabilidad16'], "text"),
	GetSQLValueString($_POST['Impacto16'],"text"),
	GetSQLValueString($_POST['nivel_riesgo16_v'], "text"),
	GetSQLValueString($_POST['medida_control16_v'],"text"),
	GetSQLValueString($_POST['responsable16_v'], "text"),
	GetSQLValueString(1, "int"),
	GetSQLValueString($_GET['id'], "int"),
	GetSQLValueString(16,"int"));
$Insert_M16 = mysql_query($query_Insert_M16, $LukivenProyecto) or die(mysql_error());
	
$Id_plan=$_GET['id'];
	//header("location:../matriz_riesgo.php?id=".idDeMiPlan2($Id_plan));



 if ((isset($_GET['fffr'])) && $_GET['fffr']=="aNP") {

header("location:../asig_aud_no_plan.php?id=".$_GET['id']);

 }else{

	header("location:../plan_auditoria.php?id=".$_GET['id']);
 	
 }

}

function VerificarExistenciaMatriz($id_Matriz_assoc)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	# code...
	

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);


$query_Verf_Matriz = "SELECT * FROM matriz_riesgo WHERE id_plan=$id_Matriz_assoc and aprobada_M=1";
$Verf_Matriz = mysql_query($query_Verf_Matriz, $LukivenProyecto) or die(mysql_error());
$row_prVerf_Matriz = mysql_fetch_assoc($Verf_Matriz);
$totalRows_Verf_Matriz = mysql_num_rows($Verf_Matriz);
return ($totalRows_Verf_Matriz > 0);
	
}


function ConsultarProceso($id_CP)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	# code...
	

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);


$query_C_P_para_inf = "SELECT * FROM plan_de_auditoria_proceso WHERE id_pdap=$id_CP ";
$C_P_para_inf = mysql_query($query_C_P_para_inf, $LukivenProyecto) or die(mysql_error());
//$row_prC_P_para_inf = mysql_fetch_assoc($C_P_para_inf);
//$totalRows_C_P_para_inf = mysql_num_rows($C_P_para_inf);
return $C_P_para_inf;
	
}



function Verific_Inf_creado_asig($id_CP)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	# code...
	

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);


$query_v_I_C_A = "SELECT * FROM  informe_aud WHERE id_proceso_plan_informe=$id_CP ";
$v_I_C_A = mysql_query($query_v_I_C_A, $LukivenProyecto) or die(mysql_error());
$row_prC_P_para_inf = mysql_fetch_assoc($v_I_C_A);
$totalRows_C_P_para_inf = mysql_num_rows($v_I_C_A);
return ($totalRows_C_P_para_inf > 0);
	
}



if ((isset($_GET['aNp'])) && $_GET['aNp']=="NM") {



error_reporting(E_ALL ^ E_DEPRECATED);

 //global $database_LukivenProyecto, $LukivenProyecto;
//se recrean las variables de conexion por que estas variables en funciones.php no existen .
$hostname_LukivenProyecto = "localhost";
$database_LukivenProyecto = "proyectopendriver";
$username_LukivenProyecto = "root";
$password_LukivenProyecto = "";
$LukivenProyecto = mysql_pconnect($hostname_LukivenProyecto, $username_LukivenProyecto, $password_LukivenProyecto) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_set_charset('utf8');
	# code...
	



mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_max_pro_pId = "select MAX(programa),MAX(plan_id) FROM auditorias ;";
$max_pro_pId = mysql_query($query_max_pro_pId, $LukivenProyecto) or die(mysql_error());
$row_max_pro_pId = mysql_fetch_assoc($max_pro_pId);



mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_ver_Ult_ID_en_pg_a = "select MAX(pa_ID) FROM programa_auditoria ;";
$ver_Ult_ID_en_pg_a = mysql_query($query_ver_Ult_ID_en_pg_a, $LukivenProyecto) or die(mysql_error());
$row_ver_Ult_ID_en_pg_a = mysql_fetch_assoc($ver_Ult_ID_en_pg_a);

//verificamos el id de programa mas alto entre la tabla programa_auditoria y auditoria 
if ($row_ver_Ult_ID_en_pg_a['MAX(pa_ID)']>$row_max_pro_pId['MAX(programa)']) {
	$sig_prog=$row_ver_Ult_ID_en_pg_a['MAX(pa_ID)']+1;

}elseif ($row_ver_Ult_ID_en_pg_a['MAX(pa_ID)']<=$row_max_pro_pId['MAX(programa)']) {
	$sig_prog=$row_max_pro_pId['MAX(programa)']+1;
}


$sig_plan=$row_max_pro_pId['MAX(plan_id)'];//para retornar en caso de que no tenga matriz creada la ultima auditoria

//verificamos si la ultima auditoria no planificada no tieene aun una matriz aprovada para evitar crear auditorias 
//no plantificadas vacias en la BD
/*$id_pro_act=$row_max_pro_pId['MAX(programa)'];
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_V_M_CR = "select * FROM matriz_riesgo where id_plan=$id_pro_act;";
$V_M_CR = mysql_query($query_V_M_CR, $LukivenProyecto) or die(mysql_error());
$row_V_M_CR = mysql_fetch_assoc($V_M_CR);
$row_cant_V_M_CR=mysql_num_rows($V_M_CR);

if ($row_cant_V_M_CR>0) {
*/	

$fecha_inic_aud_no_plan=$_POST['Fecha_ini_audi'];
//insertamos en el programa_auditoria con la fecha de inicio del program 
 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_inserten_fecha_prog = "INSERT INTO programa_auditoria (pa_ID,fecha_auditoria_inicio) values ($sig_prog,'$fecha_inic_aud_no_plan')";
$inserten_fecha_prog = mysql_query($query_inserten_fecha_prog, $LukivenProyecto) or die(mysql_error());



//insertamos en el plan_auditoria
 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_inserten_plan = "INSERT INTO plan_de_auditoria (programa_plan) values ($sig_prog)";
$inserten_plan = mysql_query($query_inserten_plan, $LukivenProyecto) or die(mysql_error());


//
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_max_pro_pId = "select MAX(programa_plan),MAX(id_plan) FROM plan_de_auditoria ;";
$max_pro_pId = mysql_query($query_max_pro_pId, $LukivenProyecto) or die(mysql_error());
$row_max_pro_pId = mysql_fetch_assoc($max_pro_pId);

$sig_prog_pa=$row_max_pro_pId['MAX(programa_plan)'];
$sig_plan_id_pa=$row_max_pro_pId['MAX(id_plan)'];








//creamos la nueva auditoria no planificada 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_max_pro_pId_In = "INSERT INTO auditorias (plan_no_plan,programa,plan_id) values (0,$sig_prog_pa,$sig_plan_id_pa)";
$max_pro_pId_In = mysql_query($query_max_pro_pId_In, $LukivenProyecto) or die(mysql_error());


	header("location:../matriz_riesgo.php?id=".$sig_plan_id_pa."&fff=aNP");



	//}
	//header("location:../matriz_riesgo.php?id=".$sig_plan."&fff=aNP&f=$fecha_inic_aud_no_plan");

}



function detallesDelProceso($id)
{
		global $database_LukivenProyecto, $LukivenProyecto;
	# code...
	

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);


$query_Nombr_dl_proceso = "SELECT * FROM proceso,proceso_clausula WHERE proceso.IDP=proceso_clausula.proceso_IDP and proceso.IDP=$id ";
$Nombr_dl_proceso = mysql_query($query_Nombr_dl_proceso, $LukivenProyecto) or die(mysql_error());
$row_prNombr_dl_proceso = mysql_fetch_assoc($Nombr_dl_proceso);
//$totalRows_C_P_para_inf = mysql_num_rows($C_P_para_inf);
return $row_prNombr_dl_proceso;
}




function El_US_D_L_TABLA_D_A($id_aud_plan_delet)
{//aca
		global $database_LukivenProyecto, $LukivenProyecto;
	
	

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_selectA_P = "SELECT * from auditores_plan INNER JOIN informe_aud on auditores_plan.id_plan=informe_aud.id_proceso_plan_informe where auditores_plan.id_auditores_plan= $id_aud_plan_delet";
$selectA_P = mysql_query($query_selectA_P, $LukivenProyecto) or die(mysql_error());
$row_prselectA_P = mysql_fetch_assoc($selectA_P);


$aud_plan_usuario=$row_prselectA_P['usuario_plan'];
$aud_plan_id_inf=$row_prselectA_P['idinforme_au'];
$aud_plan_tipo=$row_prselectA_P['tipo_usuario_plan'];

//echo "<script>console.log('usuario:".$aud_plan_usuario."IdInforme:".$aud_plan_id_inf."-TIPOusuario:".$aud_plan_tipo."-iddelmetodo:".$id_aud_plan_delet."');</script>";
if ($aud_plan_tipo==2) {
	$tipo_apt="interno";
}elseif ($aud_plan_tipo==3) {
	$tipo_apt="observador";
}

if ($tipo_apt=="interno" or $tipo_apt=="observador") {
	# code...
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_dropInf = "DELETE FROM usuario_has_informe_aud WHERE usuario_has_informe_aud.usuario_USUARIO = '$aud_plan_usuario' AND usuario_has_informe_aud.informe_aud_idinforme_au = $aud_plan_id_inf  AND usuario_has_informe_aud.tipo = '$tipo_apt';";
$dropInf = mysql_query($query_dropInf, $LukivenProyecto) or die(mysql_error());

}

}



function Chek_inform_Exist($AuD_1,$id_pdap)
{
	global $database_LukivenProyecto, $LukivenProyecto;
		

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_selectA_PC_I_E1 = "SELECT * from informe_aud  where id_proceso_plan_informe= $id_pdap";
$selectA_PC_I_E1 = mysql_query($query_selectA_PC_I_E1, $LukivenProyecto) or die(mysql_error());
$row_prselectA_PC_I_E1 = mysql_fetch_assoc($selectA_PC_I_E1);
$num_row_prselectA_PC_I_E1=mysql_num_rows($selectA_PC_I_E1);

$retur =($num_row_prselectA_PC_I_E1>0 && $AuD_1=="")? "<span class='center' style='color:red;'>El Informe Ya esta creado con un Auditor lider \n que no existe en este equipo Auditor. Ingrese \n el Auditor lider para reasignarlo al informe.</span>" : ""; 

return $retur;
}


function BORRARCadenaDatosProces($id_proc)
{
	global $database_LukivenProyecto, $LukivenProyecto;
		

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_SelectCadena = "SELECT * FROM plan_de_auditoria_proceso INNER JOIN plan_de_auditoria INNER JOIN programa_auditoria_proceso INNER JOIN proceso_clausula INNER JOIN proceso on plan_de_auditoria_proceso.id_pda_pdap=plan_de_auditoria.id_plan and plan_de_auditoria.programa_plan=programa_auditoria_proceso.pap_fecha_aud AND programa_auditoria_proceso.pap_IDPC=proceso_clausula.ID_P_C AND proceso_clausula.proceso_IDP=proceso.IDP AND plan_de_auditoria_proceso.proceso_pdap=proceso.nombre_pro where plan_de_auditoria_proceso.id_pdap= $id_proc";
$SelectCadena = mysql_query($query_SelectCadena, $LukivenProyecto) or die(mysql_error());
$row_prSelectCadena = mysql_fetch_assoc($SelectCadena);

/*mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_drop_plan = sprintf("DELETE FROM plan_de_auditoria WHERE plan_de_auditoria.id_plan = %s " ,GetSQLValueString($row_prSelectCadena['id_plan'], "int"));
$drop_plan = mysql_query($query_drop_plan, $LukivenProyecto) or die(mysql_error());
*/
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_drop_proc_prog = sprintf("DELETE FROM programa_auditoria_proceso WHERE programa_auditoria_proceso.pap_ID = %s " ,GetSQLValueString($row_prSelectCadena['pap_ID'], "int"));
$drop_proc_prog = mysql_query($query_drop_proc_prog, $LukivenProyecto) or die(mysql_error());


}


function Borrar_Informe($id_proc)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	


mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_drop_proc_prog = sprintf("DELETE FROM informe_aud WHERE informe_aud.id_proceso_plan_informe=%s" ,GetSQLValueString($id_proc, "int"));
$drop_proc_prog = mysql_query($query_drop_proc_prog, $LukivenProyecto) or die(mysql_error());	

	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Selectclaus_info = "SELECT * FROM informe_aud WHERE informe_aud.id_proceso_plan_informe=$id_proc";
$Selectclaus_info = mysql_query($query_Selectclaus_info, $LukivenProyecto) or die(mysql_error());
$row_prSelectclaus_info = mysql_fetch_assoc($Selectclaus_info);

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Selecclausulas = sprintf("SELECT * FROM clausulas_has_informe_aud WHERE clausulas_has_informe_aud.informe_aud_idinforme_au=%s" ,GetSQLValueString($row_prSelectclaus_info['id_informe_au'], "int"));
$Selecclausulas = mysql_query($query_Selecclausulas, $LukivenProyecto) or die(mysql_error());


while ( $row_Selecclausulas = mysql_fetch_assoc($Selecclausulas)) {
	
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_dropClausulas = sprintf("DELETE FROM clausulas_has_informe_aud WHERE clausulas_has_informe_aud.informe_aud_idinforme_au=%s" ,GetSQLValueString($row_prSelectclaus_info['id_informe_au'], "int"));
$dropClausulas = mysql_query($query_dropClausulas, $LukivenProyecto) or die(mysql_error());

}

}


function VerificarAdm($USUARIO)
{
	
	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_CHECKANDO_ADM = sprintf("SELECT * FROM usuario WHERE usuario.USUARIO=%s",GetSQLValueString($USUARIO, "text"));
$CHECKANDO_ADM = mysql_query($query_CHECKANDO_ADM, $LukivenProyecto) or die(mysql_error());
$row_prCHECKANDO_ADM = mysql_fetch_assoc($CHECKANDO_ADM);
if ($row_prCHECKANDO_ADM['TIPOUSU']==1) {
	$retro="ADMIN";
}else{
	$retro="NOADMIN";
}
  //$retro= ($row_prCHECKANDO_ADM['TIPOUSU']==1) "ADMIN" : "NOADMIN";
  return $retro;
}




function ActualizarNoconfYObserv($id_programa,$proceso_aud,$Nnoconf,$cnoconfcerr,$cnoconfabier,$Nobserv,$cobsercerr,$cobserabier,$situacion)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Cons_tablaNCYOB = "SELECT * FROM tabla_nc_y_obs where id_programa=$id_programa and proceso_audi=$proceso_aud";
$Cons_tablaNCYOB=mysql_query($query_Cons_tablaNCYOB, $LukivenProyecto) or die(mysql_error());
$row_Cons_tablaNCYOB = mysql_fetch_assoc($Cons_tablaNCYOB);
$filas_Cons_tablaNCYOB=mysql_num_rows($Cons_tablaNCYOB);

if ($filas_Cons_tablaNCYOB>0) {


	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Cons_tablaupdate = "UPDATE tabla_nc_y_obs set N_no_conform=$Nnoconf,NC_cerrada=$cnoconfcerr,NC_enproceso=$cnoconfabier,N_observaciones=$Nobserv,OBS_cerradas=$cobsercerr,OBS_enproceso=$cobserabier,situacion_actual='$situacion' where id_programa=$id_programa and proceso_audi=$proceso_aud";
$Cons_tablaupdate=mysql_query($query_Cons_tablaupdate, $LukivenProyecto) or die(mysql_error());

}else{

	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Cons_tablainsert = " INSERT INTO  tabla_nc_y_obs (id_programa,proceso_audi, N_no_conform,NC_cerrada,NC_enproceso,N_observaciones,OBS_cerradas,OBS_enproceso,situacion_actual) values ($id_programa,$proceso_aud,$Nnoconf,$cnoconfcerr,$cnoconfabier,$Nobserv,$cobsercerr,$cobserabier,'$situacion') ";
$Cons_tablainsert=mysql_query($query_Cons_tablainsert, $LukivenProyecto) or die(mysql_error());
}

 
}




function ActualizarIndiceDeEficacia($idPrograma,$process,$cevaluadass,$ccumplidas,$Vobtenido,$Vesperados)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Cons_tablaindice = "SELECT * FROM indice_de_eficacia where id_programa=$idPrograma and proceso_id=$process";
$Cons_tablaindice=mysql_query($query_Cons_tablaindice, $LukivenProyecto) or die(mysql_error());
$row_Cons_tablaindice = mysql_fetch_assoc($Cons_tablaindice);
$filas_Cons_tablaindice=mysql_num_rows($Cons_tablaindice);

if ($filas_Cons_tablaindice>0) {


	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Cons_tablaupdateefic = "UPDATE indice_de_eficacia set clausulas_eval=$cevaluadass,clausulas_cump=$ccumplidas,valor_obtenido=$Vobtenido,valor_esperado=$Vesperados where id_programa=$idPrograma and proceso_id=$process";
$Cons_tablaupdateefic=mysql_query($query_Cons_tablaupdateefic, $LukivenProyecto) or die(mysql_error());

}else{

	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Cons_tablainsertefic = " INSERT INTO  indice_de_eficacia (id_programa,proceso_id, clausulas_eval,clausulas_cump,valor_obtenido,valor_esperado) values ($idPrograma,$process,$cevaluadass,$ccumplidas,$Vobtenido,$Vesperados) ";
$Cons_tablainsertefic=mysql_query($query_Cons_tablainsertefic, $LukivenProyecto) or die(mysql_error());
}

 
}




function Vercantidaddeauditorias($idPrograma)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_programa = "SELECT * FROM programa_auditoria where pa_ID=$idPrograma";
$programa = mysql_query($query_programa, $LukivenProyecto) or die(mysql_error());
$row_programa = mysql_fetch_assoc($programa);

$fechacompleta=$row_programa['fecha_auditoria_inicio'];
$fechaexplode=explode("-", $row_programa['fecha_auditoria_inicio']);
$anoexpl=$fechaexplode[0];

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_pgs = "SELECT * FROM `programa_auditoria` INNER JOIN auditorias ON programa_auditoria.pa_ID=auditorias.programa where auditorias.plan_no_plan=1  and programa_auditoria.pa_ID<=$idPrograma and programa_auditoria.fecha_auditoria_inicio<='$fechacompleta' and programa_auditoria.fecha_auditoria_inicio LIKE '$anoexpl%' ORDER BY `programa_auditoria`.`fecha_auditoria_inicio` DESC , programa_auditoria.pa_ID DESC";
$pgs = mysql_query($query_pgs, $LukivenProyecto) or die(mysql_error());


while ( $row_pgs = mysql_fetch_assoc($pgs)) {
	$pa_ID[]=$row_pgs['pa_ID'];
	$fechainicio[]=$row_pgs['fecha_auditoria_inicio'];
}
if (count($pa_ID)>=2) {
	return array("2aud",$pa_ID,$fechainicio);
}elseif (count($pa_ID)==1) {
	return array("1aud",$pa_ID,$fechainicio);
	
}

}

function VerRangoDeUsuario($USUARIO)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_usuario = "SELECT * FROM usuario where USUARIO='$USUARIO'";
$usuario = mysql_query($query_usuario, $LukivenProyecto) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);

return $row_usuario['TIPOUSU']; 

}

function CalificarInforme($ID_INF,$CALIFICACION)
{
	
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_cal_inf = "UPDATE  informe_aud set estatus_inf=$CALIFICACION WHERE idinforme_au=$ID_INF";
$cal_inf = mysql_query($query_cal_inf, $LukivenProyecto) or die(mysql_error());
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);

//consultamos el numero del programa para colocarle la fecha de auditoria final 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Datos_programa = "SELECT * FROM `informe_aud` INNER JOIN plan_de_auditoria_proceso INNER JOIN plan_de_auditoria ON informe_aud.id_proceso_plan_informe=plan_de_auditoria_proceso.id_pdap and plan_de_auditoria_proceso.id_pda_pdap=plan_de_auditoria.id_plan WHERE `informe_aud`.`idinforme_au`= $ID_INF";
$Datos_programa = mysql_query($query_Datos_programa, $LukivenProyecto) or die(mysql_error());
$row_Datos_programa = mysql_fetch_assoc($Datos_programa);

$programa_plan=$row_Datos_programa['programa_plan'];


if ($CALIFICACION==1) {
$query_Fecha_fin = "UPDATE  programa_auditoria set fecha_auditoria_fin= now() WHERE pa_ID=$programa_plan";
}elseif ($CALIFICACION==0) {
$query_Fecha_fin = "UPDATE  programa_auditoria set fecha_auditoria_fin= now() WHERE pa_ID=$programa_plan";
}
$Fecha_fin = mysql_query($query_Fecha_fin, $LukivenProyecto) or die(mysql_error());


ActualizarControlAuditoria($row_Datos_programa['idinforme_au'],$row_Datos_programa['programa_plan'],$row_Datos_programa['fecha_pdap'],$row_Datos_programa['hora_pdap'],$row_Datos_programa['proceso_pdap'],$row_Datos_programa['id_pdap']);

}

function ActualizarControlAuditoria($id_Informe,$id_programa,$fecha_pdap,$hora_pdap,$proceso_pdap,$id_pdap)
{

//N_Y_A_DeUsuario
	$Integrantes_del_plan=TraerADelPlan($id_pdap);


			global $database_LukivenProyecto, $LukivenProyecto;

	while ( $assoc_Integrantes_del_plan=mysql_fetch_assoc($Integrantes_del_plan)) {
		
 $usuario=$assoc_Integrantes_del_plan['usuario_plan'];
 $suma_al=0;
  $suma_ai=0;
   $suma_ob=0;
    if ($assoc_Integrantes_del_plan['tipo_usuario_plan']==1) {
      $cargo_aud="Auditor Lider";
      $suma_al=1;
      }elseif ($assoc_Integrantes_del_plan['tipo_usuario_plan']==2) {
      $cargo_aud="Auditor Interno";
       $suma_ai=1; 

            }elseif ($assoc_Integrantes_del_plan['tipo_usuario_plan']==3) {
      $cargo_aud="Observador";
       $suma_ob=1;
      }


//buscando la fecha de la auditoria

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_fauditoria = "SELECT * FROM programa_auditoria where pa_ID=$id_programa";
$fauditoria = mysql_query($query_fauditoria, $LukivenProyecto) or die(mysql_error());
$row_fauditoria = mysql_fetch_assoc($fauditoria);
$fecha_auditoria=$row_fauditoria['fecha_auditoria_inicio'];

//buscando la gerencia a la que pertenece

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_dat_usuario = "SELECT departamento.nombre as NOMBREDEP, departamento.IDDE  FROM usuario INNER JOIN departamento ON usuario.Departamento_IDDE=departamento.IDDE where USUARIO='$usuario'";
$dat_usuario = mysql_query($query_dat_usuario, $LukivenProyecto) or die(mysql_error());
$row_dat_usuario = mysql_fetch_assoc($dat_usuario);
$gerencia=$row_dat_usuario['NOMBREDEP'];
$IDEE_gerencia=$row_dat_usuario['IDDE'];




//comprobamos si ya existe en aud_control_sist
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_datcheck = "SELECT *  FROM aud_control_sist where user_control_aud_fk='$usuario'and aud_control_id_informe=$id_Informe and id_programa_control=$id_programa";
$datcheck = mysql_query($query_datcheck, $LukivenProyecto) or die(mysql_error());
$row_datcheck = mysql_fetch_assoc($datcheck);
$filas_datcheck=mysql_num_rows($datcheck);
if (!$filas_datcheck>0) {

	//insertamos en la tabla de detalles llamada aud_control_sist

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_insert_control = "INSERT INTO aud_control_sist (user_control_aud_fk,aud_fecha_sist,aud_gerencia_sist,aud_control_id_informe,id_programa_control,fecha_pdap_control,hora_pdap_control,proceso_control,fecha_aprovacion_if,cargo_aud) values ('$usuario','$fecha_auditoria',$IDEE_gerencia,$id_Informe,$id_programa,'$fecha_pdap','$hora_pdap','$proceso_pdap',now(),'$cargo_aud')";
$insert_control = mysql_query($query_insert_control, $LukivenProyecto) or die(mysql_error());

}







//evaluamos la existencia del coteo anual y del usuario en la otra tabla para actualizzar o insertar 
$hoy=date('Y-m-d');
$explode=explode("-", $hoy);
$ano=$explode[0];

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_cons_cont = "SELECT * FROM contador_anual_control where fecha_aud_conta like '$ano%' and user_contador_control='$usuario'";
$cons_cont = mysql_query($query_cons_cont, $LukivenProyecto) or die(mysql_error());
$row_cons_cont = mysql_fetch_assoc($cons_cont);


$cont_obs=$row_cons_cont['aud_obs_sist']+$suma_al;
$cont_ai=$row_cons_cont['aud_ai_sist']+$suma_ai;
$cont_al=$row_cons_cont['aud_al_sist']+$suma_ob;
$cont_total=$cont_obs+$cont_ai+$cont_al;
 


$rowrow_cons_cont=mysql_num_rows($cons_cont);

if ($rowrow_cons_cont>0 && !$filas_datcheck>0) {//eita que cargen puntos del mismo informe
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_contAn = "UPDATE contador_anual_control set aud_obs_sist=$cont_obs,aud_ai_sist=$cont_ai,aud_al_sist=$cont_al,total_aud_sist=$cont_total where fecha_aud_conta like '$ano%' and user_contador_control='$usuario'  ";
$contAn = mysql_query($query_contAn, $LukivenProyecto) or die(mysql_error());

}elseif (!$rowrow_cons_cont>0){

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_insertcont = "INSERT INTO contador_anual_control (user_contador_control,aud_obs_sist,aud_ai_sist,aud_al_sist,total_aud_sist,fecha_aud_conta) values ('$usuario',$cont_obs,$cont_ai,$cont_al,$cont_total,'$fecha_auditoria')";
$insertcont = mysql_query($query_insertcont, $LukivenProyecto) or die(mysql_error());

}else{

	$cont_obs=$row_cons_cont['aud_obs_sist'];
$cont_ai=$row_cons_cont['aud_ai_sist'];
$cont_al=$row_cons_cont['aud_al_sist'];
$cont_total=$cont_obs+$cont_ai+$cont_al;
}

//actualizacmos control_aud_int
//comprobamos si existe o no en la tabla el usuario registrado 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_User = "SELECT * FROM control_aud_int where usuario_control='$usuario'";
$User = mysql_query($query_User, $LukivenProyecto) or die(mysql_error());
$row_User = mysql_fetch_assoc($User);
$filas_user=mysql_num_rows($User);
if ($filas_user>0 && !$filas_datcheck>0 ) {


$cai_obs=$row_User['aud_obs_ant'];
$cai_al=$row_User['aud_ai_ant'];
$cai_ai=$row_User['aud_al_ant'];
$cai_total=$row_User['total_aud_ant'];




$obsTotal=$cai_obs+$cont_obs;
$aiTotal=$cai_ai+$cont_ai;
$alTotal=$cai_al+$cont_al;
$totalTotal=$cai_total+$cont_total;


	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_uptate = "UPDATE control_aud_int set aud_obs_total=$obsTotal ,aud_ai_total =$aiTotal,aud_al_total =$alTotal,total_aud_total=$totalTotal ,gerencia_control=$IDEE_gerencia where  usuario_control='$usuario'";
$uptate = mysql_query($query_uptate, $LukivenProyecto) or die(mysql_error());
}elseif (!$filas_user>0 ){

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_inscontrol = "INSERT INTO control_aud_int(usuario_control,gerencia_control,aud_fecha_actu,aud_obs_ant,aud_ai_ant,aud_al_ant,total_aud_ant,aud_obs_total,aud_ai_total,aud_al_total,total_aud_total)  values ('$usuario',$IDEE_gerencia,'$fecha_auditoria',0,0,0,0,$cont_obs,$cont_ai,$cont_al,$cont_total)";
$inscontrol = mysql_query($query_inscontrol, $LukivenProyecto) or die(mysql_error());


}



	}

}

function EstadoDelInforme($id_pdap)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_informe = "SELECT * FROM informe_aud where id_proceso_plan_informe='$id_pdap'";
$informe = mysql_query($query_informe, $LukivenProyecto) or die(mysql_error());
$row_informe = mysql_fetch_assoc($informe);



          if ($row_informe['estatus_inf']==1) {
            $estado_i ="Aprobado";
          }elseif ($row_informe['estatus_inf']==0) {
            $estado_i ="No aprobado";
          }
          if ($row_informe['estatus_inf']=="") {
            $estado_i ="No Calificado";
          }

                                   
return $estado_i; 
//return $row_informe['estatus_inf'];

}


function VerIdInforme($id_pdap)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_informe = "SELECT * FROM informe_aud where id_proceso_plan_informe='$id_pdap'";
$informe = mysql_query($query_informe, $LukivenProyecto) or die(mysql_error());
$row_informe = mysql_fetch_assoc($informe);



                                   
return $row_informe['idinforme_au']; 
//return $row_informe['estatus_inf'];

}

function Seguimiento_C($IDAC)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Num_reporte = "SELECT * FROM acciones inner join usuario inner join clausulas_has_informe_aud inner join informe_aud INNER JOIN proceso on usuario.USUARIO = acciones.usuario_USUARIO and acciones.clausulas_has_informe_aud_IDCI=clausulas_has_informe_aud.IDCI AND informe_aud.idinforme_au = clausulas_has_informe_aud.informe_aud_idinforme_au and clausulas_has_informe_aud.informe_aud_idinforme_au = acciones.clausulas_has_informe_aud_informe_aud_idinforme_au and clausulas_has_informe_aud.Clausulas_IDCC = acciones.clausulas_has_informe_aud_Clausulas_IDCC AND informe_aud.proceso_IDP = proceso.IDP WHERE acciones.IDAC=$IDAC";
$Num_reporte = mysql_query($query_Num_reporte, $LukivenProyecto) or die(mysql_error());
$row_Num_reporte = mysql_fetch_assoc($Num_reporte);



                                   
return $row_Num_reporte; 
//return $row_informe['estatus_inf'];

}

function Seguimiento_C2($IDAC)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Num_reporte2 = "SELECT acciones.tipo as tipo_d_accion FROM acciones inner join usuario inner join clausulas_has_informe_aud inner join informe_aud INNER JOIN proceso on usuario.USUARIO = acciones.usuario_USUARIO and acciones.clausulas_has_informe_aud_IDCI=clausulas_has_informe_aud.IDCI AND informe_aud.idinforme_au = clausulas_has_informe_aud.informe_aud_idinforme_au and clausulas_has_informe_aud.informe_aud_idinforme_au = acciones.clausulas_has_informe_aud_informe_aud_idinforme_au and clausulas_has_informe_aud.Clausulas_IDCC = acciones.clausulas_has_informe_aud_Clausulas_IDCC AND informe_aud.proceso_IDP = proceso.IDP WHERE acciones.IDAC=$IDAC";
$Num_reporte2 = mysql_query($query_Num_reporte2, $LukivenProyecto) or die(mysql_error());
$row_Num_reporte2 = mysql_fetch_assoc($Num_reporte2);



                                   
return $row_Num_reporte2; 
//return $row_informe['estatus_inf'];

}

//correctivas del numero de reporte 
function FechaCierreRealSolicitud($numero_reporte)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_Fech_cierreReal = "SELECT * FROM acciones inner join usuario inner join clausulas_has_informe_aud inner join informe_aud INNER JOIN proceso on usuario.USUARIO = acciones.usuario_USUARIO and acciones.clausulas_has_informe_aud_IDCI=clausulas_has_informe_aud.IDCI AND informe_aud.idinforme_au = clausulas_has_informe_aud.informe_aud_idinforme_au and clausulas_has_informe_aud.informe_aud_idinforme_au = acciones.clausulas_has_informe_aud_informe_aud_idinforme_au and clausulas_has_informe_aud.Clausulas_IDCC = acciones.clausulas_has_informe_aud_Clausulas_IDCC AND informe_aud.proceso_IDP = proceso.IDP WHERE clausulas_has_informe_aud.numero_reporte='$numero_reporte' and acciones.tipo='correctiva' ORDER BY fec_cierre";
$Fech_cierreReal = mysql_query($query_Fech_cierreReal, $LukivenProyecto) or die(mysql_error());
//$row_correctivas_p_r = mysql_fetch_assoc($correctivas_p_r);


while ($row_Fech_cierreReal = mysql_fetch_assoc($Fech_cierreReal)) {


switch ($row_Fech_cierreReal) {
	case $row_Fech_cierreReal['fec_cierre']=='' || $row_Fech_cierreReal['tipo_cierre']=="No definido" || $row_Fech_cierreReal['tipo_cierre']=="no efectivo":
			$SALIDA="UNA CORRECTIVA NO ESTA CERRADA"; 
		break 2;
	
	
	default:
		break;
}


$Ult_fecha=$row_Fech_cierreReal['fec_cierre'];//sobreescribiendo la fecha tenemos la ultima

}

if ((isset($SALIDA))) {
	return $SALIDA;
}else {	
                                   


return $Ult_fecha; 
}


}



function resProPorIdInf($id_Informe)
{
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_responsableProc = "SELECT * from proceso INNER JOIN informe_aud on proceso.IDP=informe_aud.proceso_IDP where informe_aud.idinforme_au=$id_Informe";
$responsableProc = mysql_query($query_responsableProc, $LukivenProyecto) or die(mysql_error());
$row_responsableProc = mysql_fetch_assoc($responsableProc);



                                   
return $row_responsableProc['responsable_proc']; 
}


function VerfrazonesPorque($id_Informe)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_verif_razones = sprintf("SELECT * FROM razones WHERE razones.clausulas_has_informe_aud_informe_aud_idinforme_au = %s ",GetSQLValueString($id_Informe, "int"));
$verif_razones = mysql_query($query_verif_razones, $LukivenProyecto) or die(mysql_error());
$row_verif_razones = mysql_fetch_assoc($verif_razones);
$totalRows_verif_razones = mysql_num_rows($verif_razones);

$regreso=($totalRows_verif_razones>0)? true :false;
return $regreso;
}



function ActualizarEvaluaciones_A_Y_B($id_Informe)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	// checkearr la tabla de auditores para actualizar la tabla de evaluaciones 
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_A_E_A_Y_B_1 = sprintf("SELECT * FROM auditores_plan INNER JOIN informe_aud INNER JOIN proceso on auditores_plan.id_plan=informe_aud.id_proceso_plan_informe and proceso.IDP=informe_aud.proceso_IDP where informe_aud.idinforme_au= %s ",GetSQLValueString($id_Informe, "int"));
$A_E_A_Y_B_1 = mysql_query($query_A_E_A_Y_B_1, $LukivenProyecto) or die(mysql_error());

$Usuarios_AL="";
while ( $row_A_E_A_Y_B_1 = mysql_fetch_assoc($A_E_A_Y_B_1)) {


	if ($row_A_E_A_Y_B_1['tipo_usuario_plan']==1) {
		$Usuarios_AL=$row_A_E_A_Y_B_1['usuario_plan'];
		
	}elseif ($row_A_E_A_Y_B_1['tipo_usuario_plan']==2) {
		$Usuarios_AI[]=$row_A_E_A_Y_B_1['usuario_plan'];
		$check_AI[]=false;
		$check_AI_b[]=false;
		
	}
	
		$responsableProc=$row_A_E_A_Y_B_1['responsable_proc'];
}




//iniciamos proceso de reconocimiento de evaluaciones si existe un auditor lider 
if ($Usuarios_AL!="") {

	//verificar existencia del responsable en la evaluacion  parte B
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_A_E_A_Y_B_2_P2 = sprintf("SELECT * FROM ev_tipo_b WHERE id_evb_id_informe= %s ", GetSQLValueString($id_Informe, "int"));
$A_E_A_Y_B_2_P2 = mysql_query($query_A_E_A_Y_B_2_P2, $LukivenProyecto) or die(mysql_error());
$check_AL_b=false;
while (  $row_A_E_A_Y_B_2_P2 = mysql_fetch_assoc($A_E_A_Y_B_2_P2)) {
	
	$del_ev_b=true;//true por que por ahora no lo reconoce en la tabla de auditores_plan
if(isset($Usuarios_AI)){
	for ($vardelb=0; $vardelb <count($Usuarios_AI) ; $vardelb++) { 
		
		if ($row_A_E_A_Y_B_2_P2['usuario_cal_b']==$Usuarios_AI[$vardelb] || $row_A_E_A_Y_B_2_P2['usuario_cal_b']==$Usuarios_AL ) {
			$del_ev_b=false;
			
		}
	}
	if ($del_ev_b==true) { //eliminamos si el sistema no pone falso a la hora de reconocerlo 
		Delet_ev_b($row_A_E_A_Y_B_2_P2['id_ev_b']); 
	}
}
	if ($row_A_E_A_Y_B_2_P2['usuario_cal_b']==$Usuarios_AL) {
		$check_AL_b=true;
	}
	if(isset($Usuarios_AI)){
	for ($chkAI2=0; $chkAI2 < count($Usuarios_AI); $chkAI2++) { 
		if ($row_A_E_A_Y_B_2_P2['usuario_cal_b']==$Usuarios_AI[$chkAI2]    ) {
		$check_AI_b[$chkAI2]=true;
	}
	}}

}
if ($check_AL_b==false) {
	Insertar_eva_b($id_Informe,$responsableProc,$Usuarios_AL);
}

//insertamos las evaluaciones parte b 
if ((isset($Usuarios_AI))) {
	# code...
for ($InsertAI2=0; $InsertAI2 <count($Usuarios_AI) ; $InsertAI2++) { 
	# code...
	if ($check_AI_b[$InsertAI2]==false) {
		Insertar_eva_b($id_Informe,$responsableProc,$Usuarios_AI[$InsertAI2]);
	}
}
}

//----------------------------------------------------
//verificar existencia del usuario en la evaluacion  parte A
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_A_E_A_Y_B_2 = sprintf("SELECT * FROM ev_tipo_a WHERE id_eva_id_informe= %s ", GetSQLValueString($id_Informe, "int"));
$A_E_A_Y_B_2 = mysql_query($query_A_E_A_Y_B_2, $LukivenProyecto) or die(mysql_error());
//$row_A_E_A_Y_B_2 = mysql_fetch_assoc($A_E_A_Y_B_2);
$check_AL=false;
while ( $row_A_E_A_Y_B_2 = mysql_fetch_assoc($A_E_A_Y_B_2)) {
if ((isset($Usuarios_AI))) {
for ($chkAI=0; $chkAI <count($Usuarios_AI) ; $chkAI++) { 
	if ($row_A_E_A_Y_B_2['usuario_ev_a']==$Usuarios_AL && $row_A_E_A_Y_B_2['tipo_usuario_ev_a']=="AL" && $row_A_E_A_Y_B_2['usuario_cal_a']==$Usuarios_AI[$chkAI]  && $row_A_E_A_Y_B_2['tipo_usuario_cal_a']=="AI" ){
			$check_AI[$chkAI]=true;
	}
}
}
if ($row_A_E_A_Y_B_2['tipo_usuario_cal_a']=="AL" && $row_A_E_A_Y_B_2['usuario_cal_a']==$Usuarios_AL ) {
		$check_AL=true;
	}
$id_ev_a_U[]=$row_A_E_A_Y_B_2['id_ev_a'];
$usuario_ev_a[]=$row_A_E_A_Y_B_2['usuario_ev_a'];
$tipo_usuario_ev_a[]=$row_A_E_A_Y_B_2['tipo_usuario_ev_a'];
$usuario_cal_a[]=$row_A_E_A_Y_B_2['usuario_cal_a'];
$tipo_usuario_cal_a[]=$row_A_E_A_Y_B_2['tipo_usuario_cal_a'];	
}

//eliminamos de la tabla ev_tipo_a los registros de la ealuacion relacionada al informe que no existan en la tabla auditores_plan 
if ((isset($id_ev_a_U)) && (isset($Usuarios_AI))) {
	# code...
for ($varfor1=0; $varfor1 <count($id_ev_a_U) ; $varfor1++) { 

	$exAIenaud_plan=false;//checka si existe el usuario en la tabla auditores

	
	for ($varfor2=0; $varfor2 < count($Usuarios_AI) ; $varfor2++) { 
		# code...
		
if ($usuario_cal_a[$varfor1]==$Usuarios_AI[$varfor2]  ) {
			$exAIenaud_plan=true;
			# code...
		}

		
		if ( $usuario_cal_a[$varfor1]==$Usuarios_AL ) {
			$exAIenaud_plan=true;
			# code...
		}
	}
	if ($exAIenaud_plan==false) {
		Delet_ev($id_ev_a_U[$varfor1]);
		# code...
	}

}


}
//insertamos si no hay evaluacion hacia el auditor lider
if ($check_AL==false) {
		Insertar_eva_a($id_Informe,"ADMIN","ADM",$Usuarios_AL,"AL");
}


if ((isset($Usuarios_AI))) {
for ($InsertAI=0; $InsertAI <count($Usuarios_AI) ; $InsertAI++) { 
	# code...
	if ($check_AI[$InsertAI]==false) {
		Insertar_eva_a($id_Informe,$Usuarios_AL,"AL",$Usuarios_AI[$InsertAI],"AI");
	}
}

}


}else{
//se borra todo si borran al auditor lider 
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_del_eva_a = "DELETE FROM ev_tipo_a WHERE  id_eva_id_informe=$id_Informe";
$del_eva_a = mysql_query($query_del_eva_a, $LukivenProyecto) or die(mysql_error());

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_del_eva_a = "DELETE FROM ev_tipo_b WHERE  id_evb_id_informe=$id_Informe";
$del_eva_a = mysql_query($query_del_eva_a, $LukivenProyecto) or die(mysql_error());
}
//if (!(isset($Usuarios_AI)) && !(isset($_GET['recarg'])) ) { header("location:Auditores_sin_evaluar.php?id=".$id_Informe."&recarg=flx");}//y que maaraña ara recargar cuando no hay Auditor interno seteado 


}

function Delet_ev($id_ev_a)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_del_eva_a_fun = "DELETE FROM ev_tipo_a WHERE  id_ev_a=$id_ev_a";
$del_eva_a_fun = mysql_query($query_del_eva_a_fun, $LukivenProyecto) or die(mysql_error());
}
function Delet_ev_b($id_ev_b)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_del_eva_b_fun = "DELETE FROM ev_tipo_b WHERE  id_ev_b=$id_ev_b";
$del_eva_b_fun = mysql_query($query_del_eva_b_fun, $LukivenProyecto) or die(mysql_error());
}


function Insertar_eva_a($id_Informe,$usuario_eva_a,$tipo_usuario_ev_a,$usuario_cal_a,$tipo_usuario_cal_a)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_insert_eva_a = "INSERT INTO ev_tipo_a (id_eva_id_informe,usuario_ev_a,tipo_usuario_ev_a,usuario_cal_a,tipo_usuario_cal_a) values ($id_Informe,'$usuario_eva_a','$tipo_usuario_ev_a','$usuario_cal_a','$tipo_usuario_cal_a')";
$insert_eva_a = mysql_query($query_insert_eva_a, $LukivenProyecto) or die(mysql_error());

}

function Insertar_eva_b($id_Informe,$usuario_ev_b,$usuario_cal_b)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_insert_eva_b = "INSERT INTO ev_tipo_b (id_evb_id_informe,usuario_ev_b,usuario_cal_b) values ($id_Informe,'$usuario_ev_b','$usuario_cal_b')";
$insert_eva_b = mysql_query($query_insert_eva_b, $LukivenProyecto) or die(mysql_error());

}

function insertarCalificacion($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15,$p16,$p17,$p18,$p19,$p20,$p21,$p22,$p23,$p24,$p25,$p26,$p27,$p28,$p29,$p30,$p31,$p32,$p33,$p34,$p35,$id_ev_a,$id_Informe)
{
	$calificacion=0;
	$preguntas[1]=$p1;
	$preguntas[2]=$p2;
	$preguntas[3]=$p3;
	$preguntas[4]=$p4;
	$preguntas[5]=$p5;
	$preguntas[6]=$p6;
	$preguntas[7]=$p7;
	$preguntas[8]=$p8;
	$preguntas[9]=$p9;
	$preguntas[10]=$p10;
	$preguntas[11]=$p11;
	$preguntas[12]=$p12;
	$preguntas[13]=$p13;
	$preguntas[14]=$p14;
	$preguntas[15]=$p15;
	$preguntas[16]=$p16;
	$preguntas[17]=$p17;
	$preguntas[18]=$p18;
	$preguntas[19]=$p19;
	$preguntas[20]=$p20;
	$preguntas[21]=$p21;
	$preguntas[22]=$p22;
	$preguntas[23]=$p23;
	$preguntas[24]=$p24;
	$preguntas[25]=$p25;
	$preguntas[26]=$p26;
	$preguntas[27]=$p27;
	$preguntas[28]=$p28;
	$preguntas[29]=$p29;
	$preguntas[30]=$p30;
	$preguntas[31]=$p31;
	$preguntas[32]=$p32;
	$preguntas[33]=$p33;
	$preguntas[34]=$p34;
	$preguntas[35]=$p35;
	


	for ($cf=1; $cf <36 ; $cf++) { 
if ($preguntas[$cf]!="") {
		//echo "<script>console.log(' no hay datos');</script>";
		if ($preguntas[$cf]=="Cumple") {
			$calificacion+=(100/35);
			# code...
		}elseif ($preguntas[$cf]=="Cumple Parcialmente") {
			$calificacion+=((100/35)/2);
		}

}
			
		
	}
$Res=round($calificacion);
global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_upd_calif = "UPDATE ev_tipo_a  SET  calificacion=$Res  WHERE id_ev_a=$id_ev_a and id_eva_id_informe=$id_Informe";
$upd_calif = mysql_query($query_upd_calif, $LukivenProyecto) or die(mysql_error());


}



function Eliminar_Auditoria($id_programa)
{

global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_procesos_del_plan = sprintf("SELECT plan_de_auditoria_proceso.id_pdap FROM `plan_de_auditoria_proceso` INNER JOIN plan_de_auditoria INNER JOIN programa_auditoria on plan_de_auditoria_proceso.id_pda_pdap=plan_de_auditoria.id_plan and plan_de_auditoria.programa_plan=programa_auditoria.pa_ID WHERE programa_auditoria.pa_ID=$id_programa");
$procesos_del_plan = mysql_query($query_procesos_del_plan, $LukivenProyecto) or die(mysql_error());

$totalRows_procesos_del_plan = mysql_num_rows($procesos_del_plan);

if ($totalRows_procesos_del_plan>0) {
	
	while ( $row_procesos_del_plan = mysql_fetch_assoc($procesos_del_plan)) {
		$id_pdap[]=$row_procesos_del_plan['id_pdap'];
	}

	for ($seg=0; $seg <count($id_pdap) ; $seg++) { 
		$id_pdap_actual=$id_pdap[$seg];
//BORRAR EL PROCESO DE PROGRAMA , PLAN DE AUDITORIA  POR SER PLANIFICA ESTA UDITORIA 
BORRARCadenaDatosProces($id_pdap_actual);
Borrar_Informe($id_pdap_actual); //borra desde el programa hasta el informe 
  //elimino la fila 
  $idDelProcesoEnPlan=$id_pdap_actual;
    mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_fecha_cierrr = sprintf("DELETE FROM plan_de_auditoria_proceso WHERE plan_de_auditoria_proceso.id_pdap = %s " ,GetSQLValueString($idDelProcesoEnPlan, "int"));
$fecha_cierrr = mysql_query($query_fecha_cierrr, $LukivenProyecto) or die(mysql_error());

	}
}


	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_drop1 = "DELETE FROM `auditorias` WHERE `auditorias`.`programa` = $id_programa ";
$drop1 = mysql_query($query_drop1, $LukivenProyecto) or die(mysql_error());

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_drop2 = "DELETE FROM `programa_auditoria` WHERE `programa_auditoria`.`pa_ID` = $id_programa";
$drop2 = mysql_query($query_drop2, $LukivenProyecto) or die(mysql_error());

}



function ActualizarRe_auditar($id_Informe,$fun_desicion)
{
	if ($fun_desicion=="Si") {
		$desicion="Si";
	}elseif ($fun_desicion=="No") {
		$desicion="No";
	}
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_cal_inf = "UPDATE  informe_aud set re_auditar='$desicion' WHERE idinforme_au=$id_Informe";
$cal_inf = mysql_query($query_cal_inf, $LukivenProyecto) or die(mysql_error());
}

function Ingresar_PADPS($id_programa)
{
	
	global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_pro_aud = "SELECT * FROM `programa_auditoria` WHERE programa_auditoria.pa_ID=$id_programa";
$pro_aud = mysql_query($query_pro_aud, $LukivenProyecto) or die(mysql_error());
$assoc_pro_aud=mysql_fetch_assoc($pro_aud);

$fecha=explode("-", $assoc_pro_aud['fecha_auditoria_inicio']);
$ano=$fecha[0];


mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_pro_inf = "SELECT * FROM `informe_aud` INNER JOIN plan_de_auditoria_proceso INNER JOIN plan_de_auditoria INNER JOIN proceso INNER JOIN departamento ON informe_aud.id_proceso_plan_informe=plan_de_auditoria_proceso.id_pdap and plan_de_auditoria_proceso.id_pda_pdap=plan_de_auditoria.id_plan and informe_aud.proceso_IDP=proceso.IDP and proceso.departamento_IDDE=departamento.IDDE WHERE informe_aud.Fecha_eje like '$ano%' and informe_aud.estatus_inf=1 and proceso.estado_pro='Activo' and departamento.estado_dep='Activo' ";
$pro_inf = mysql_query($query_pro_inf, $LukivenProyecto) or die(mysql_error());


while ( $assoc_pro_inf=mysql_fetch_assoc($pro_inf)) {
	
	$v1_inf_id[]=$assoc_pro_inf['idinforme_au'];
	$v1_inf_FE[]=$assoc_pro_inf['Fecha_eje'];
	$v1_inf_P_IDP[]=$assoc_pro_inf['proceso_IDP'];
	//echo "<script>console.log('informe_aud:".$assoc_pro_inf['idinforme_au'].":Fecha_eje:".$assoc_pro_inf['Fecha_eje'].":proceso_IDP:".$assoc_pro_inf['proceso_IDP']."');</script>";

}
$contador_F=0;
for ($v1_A=0; $v1_A <count($v1_inf_id) ; $v1_A++) { 
		# code...
	$ver_c=0;

	for ($v2_A=0; $v2_A <count($v1_inf_id) ; $v2_A++) { 
		
		if ($v1_A!=$v2_A ) {

			if ($v1_inf_P_IDP[$v1_A]!=$v1_inf_P_IDP[$v2_A]) {
				$ver_c++;
			}elseif ($v1_inf_P_IDP[$v1_A]==$v1_inf_P_IDP[$v2_A]) {
				//comparando con aterires ingresados
				        $existente=false;
				        
				for ($vcomp=$contador_F; $vcomp >0 ; $vcomp--) { 
					# code...
					if ($v1_inf_id[$v1_A]==$final_inf_id[$vcomp]) {
						# code...

						$existente=true;
				//	echo "<script>console.log('existe?:".$v1_inf_id[$v1_A]." :desicion:".$existente."')</script>";
					}
				}

				//si no existe ingresamos al array final 
				if ($existente==false) {
					# code...
					$contador_F++;

				if ($v1_inf_FE[$v1_A]>=$v1_inf_FE[$v2_A]) {
					$final_inf_id[$contador_F]=$v1_inf_id[$v1_A];
					$final_v1_inf_P_IDP[$contador_F]=$v1_inf_P_IDP[$v1_A];
				}elseif ($v1_inf_FE[$v1_A]<$v1_inf_FE[$v2_A]) {
					$final_inf_id[$contador_F]=$v1_inf_id[$v2_A];
					$final_v1_inf_P_IDP[$contador_F]=$v1_inf_P_IDP[$v2_A];
				}
				}
			}

		}

	}
	if ($ver_c==(count($v1_inf_id)-1)) {
		$contador_F++;
		$final_inf_id[$contador_F]=$v1_inf_id[$v1_A];
		$final_v1_inf_P_IDP[$contador_F]=$v1_inf_P_IDP[$v1_A];
	}
	//echo "<script>console.log('perdura:".$final_inf_id[$contador_F].",proceso:".$final_v1_inf_P_IDP[$contador_F]."')</script>";
}

for ($final=1; $final <=count($final_inf_id) ; $final++) { 
	# code...
	$cont_exist=0;
	for ($final2=1; $final2 <count($Array_F) ; $final2++) { 
	# code...
		if ($final_inf_id[$final]==$Array_F[$final2]) {
			# code...
			$cont_exist++;
		}
}
if ($cont_exist<=1) {
	$Array_F[$final]=$final_inf_id[$final];//id de informe
	$Array_P[$final]=$final_v1_inf_P_IDP[$final];//id del proceso
}
//echo "<script>console.log('Ult.perdura:".$Array_F[$final].",proceso:".$Array_P[$final]."')</script>";
//si no existe en la BD se ingresa
$idpc1=I_D_P_CentreProceso_ProcesoClausula($Array_P[$final]);
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_programa_compl1 = sprintf("SELECT * FROM `programa_auditoria_proceso` WHERE programa_auditoria_proceso.pap_IDPC=%s AND  programa_auditoria_proceso.pap_fecha_aud=%s" ,GetSQLValueString($idpc1, "int"),GetSQLValueString($id_programa, "text"));
$programa_compl1 = mysql_query($query_programa_compl1, $LukivenProyecto) or die(mysql_error());
$programa_compl1_assoc=mysql_fetch_assoc($programa_compl1);
$num_programa_compl1_assoc=mysql_num_rows($programa_compl1);
 if (!($num_programa_compl1_assoc >0)) {
 	# code...
SubIngresar_PADPS($Array_P[$final],$id_programa);
 }

}
/*
*/
}
function SubIngresar_PADPS($IDP,$id_programa)
{
	global $database_LukivenProyecto, $LukivenProyecto;
	$idpc=I_D_P_CentreProceso_ProcesoClausula($IDP);
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_programa_compl = sprintf("INSERT INTO programa_auditoria_proceso (pap_IDPC,pap_fecha_aud) values(%s,%s) " ,GetSQLValueString($idpc, "int"),GetSQLValueString($id_programa, "text"));
$programa_compl = mysql_query($query_programa_compl, $LukivenProyecto) or die(mysql_error());
}



function IngresarDatosControlAuditores($user_gerencia,$cantidad_a_obs,$cantidad_a_ai,$cantidad_a_al,$Observaciones)
{
	global $database_LukivenProyecto, $LukivenProyecto;

$explode_user_gerencia=explode("-", $user_gerencia);
$usuario=$explode_user_gerencia[0];
$gerencia=$explode_user_gerencia[1];
$total_aud_ant=$cantidad_a_obs + $cantidad_a_ai + $cantidad_a_al;
//$fechanow=preguntarFecha();

mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_User = sprintf("SELECT * FROM control_aud_int WHERE usuario_control =%s " , GetSQLValueString($usuario, "text"));
$User = mysql_query($query_User, $LukivenProyecto) or die(mysql_error());
$row_User=mysql_num_rows($User);
$User_assoc=mysql_fetch_assoc($User);
if (!$row_User>0) { 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_User_insert = sprintf("INSERT INTO control_aud_int (usuario_control,gerencia_control,aud_obs_ant,aud_ai_ant,aud_al_ant,total_aud_ant,Observ,aud_obs_total,aud_ai_total,aud_al_total,total_aud_total,aud_fecha_actu) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,now()) " ,GetSQLValueString($usuario, "text"),GetSQLValueString($gerencia, "text"),GetSQLValueString($cantidad_a_obs, "int"),GetSQLValueString($cantidad_a_ai, "int"),GetSQLValueString($cantidad_a_al, "int"),GetSQLValueString($total_aud_ant, "int"),GetSQLValueString($Observaciones, "text"),GetSQLValueString($cantidad_a_obs, "int"),GetSQLValueString($cantidad_a_ai, "int"),GetSQLValueString($cantidad_a_al, "int"),GetSQLValueString($total_aud_ant, "int"));
$User_insert = mysql_query($query_User_insert, $LukivenProyecto) or die(mysql_error());
}
header("location: control_auditores_internos.php");
 
}

function ModificarDatosControlAuditores($user_gerencia,$cantidad_a_obs,$cantidad_a_ai,$cantidad_a_al,$Observaciones){

global $database_LukivenProyecto, $LukivenProyecto;
  
$explode_user_gerencia=explode("-", $user_gerencia);
$usuario=$explode_user_gerencia[0]; 
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_User = sprintf("SELECT * FROM control_aud_int WHERE usuario_control =$usuario", GetSQLValueString($usuario, "text"));
$User = mysql_query($query_User, $LukivenProyecto) or die(mysql_error());
  $updateSQL = sprintf("UPDATE control_aud_int SET aud_obs_ant=%s, aud_ai_ant=%s, aud_al_ant=%s, Observ=%s /*,total_aud_ant=%s */WHERE usuario_control= %s",                     
                       GetSQLValueString($_POST['cantidad_a_obs'], "int"),
                       GetSQLValueString($_POST['cantidad_a_ai'], "int"),
                       GetSQLValueString($_POST['cantidad_a_al'], "int"),
                       GetSQLValueString($_POST['Observaciones'], "text"),
                       /*GetSQLValueString($total_aud_ant,"int"),*/
                       GetSQLValueString($_POST['usuario'], "text"));                      
  mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
  $Result1 = mysql_query($updateSQL, $LukivenProyecto) or die(mysql_error());
   
   header("location: control_auditores_internos.php");
 

}


function NombreGerencia($identificador)
{

	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$query_ConsultaFuncion = sprintf("SELECT * from departamento  WHERE IDDE= %s",GetSQLValueString($identificador,"int"));
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion,$LukivenProyecto) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['nombre']; 
	mysql_free_result($ConsultaFuncion);
}
function preguntarFecha()
{
	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$querydate ="SELECT DATE_FORMAT(NOW(),'%d-%m-%Y') AS dat";
$query = mysql_query($querydate,$LukivenProyecto) or die(mysql_error());
$row = mysql_fetch_assoc($query);
$fecha =  $row['dat'];
return $fecha;
	# code...
}

function DFCEIIE($fecha) //transformar formato de fecha de ingless a español y de español a ingles 
{   	
		# code...

			$explodef=explode("-", $fecha);
			$ftransformado=$explodef[2]."-".$explodef[1]."-".$explodef[0];
	
		# code...
		return $ftransformado;
	# code...
}

function select_controlXId($id_control)
{

global $database_LukivenProyecto, $LukivenProyecto;
mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
$query_User = sprintf("SELECT * FROM control_aud_int WHERE id_control =%s " , GetSQLValueString($id_control, "text"));
$User = mysql_query($query_User, $LukivenProyecto) or die(mysql_error());
$row_User=mysql_num_rows($User);
$User_assoc=mysql_fetch_assoc($User);
return $User_assoc;
}

function ConsultarCantidaAudPorAno($usuario)
{
	# code...
	global $database_LukivenProyecto, $LukivenProyecto;
	mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$queryanor ="SELECT * FROM contador_anual_control where contador_anual_control.user_contador_control='$usuario'";
$anorquery = mysql_query($queryanor,$LukivenProyecto) or die(mysql_error());

	
	while ($assoc_anorquery = mysql_fetch_assoc($anorquery)) {
		$ingresar=false;
		if ((isset($anos))) {
			# code...
		for ($EvaAno=0; $EvaAno <count($anos) ; $EvaAno++) { 
			if ($assoc_anorquery['fecha_aud_conta']==$anos[$EvaAno]) {
				$ingresar=true;	}

				if ($ingresar==true) {
					
		$anos[]=$assoc_anorquery['fecha_aud_conta'];
				}
		}
		}else{
			$anos[]=$assoc_anorquery['fecha_aud_conta'];
		}
	}


	for ($Con=0; $Con <count($anos) ; $Con++) { 
		$ANOexplode=explode("-", $anos[$Con]);
		$DateAno=$ANOexplode[0];
//echo "<script>console.log('".$DateAno."');</script>";
		mysql_select_db($database_LukivenProyecto, $LukivenProyecto);
	$Conquery ="SELECT * FROM contador_anual_control where contador_anual_control.user_contador_control='$usuario' and contador_anual_control.fecha_aud_conta LIKE '$DateAno%'";
$Conquery = mysql_query($Conquery,$LukivenProyecto) or die(mysql_error());
$acum_obs=0;
$acum_ai=0;
$acum_al=0;
$acum_total=0;
while ($assoc_CM=mysql_fetch_assoc($Conquery)) {
	$acum_obs+=$assoc_CM['aud_obs_sist'];
	$acum_ai+=$assoc_CM['aud_ai_sist'];
	$acum_al+=$assoc_CM['aud_al_sist'];
	$acum_total+=$assoc_CM['total_aud_sist'];
	$USERMYSQL=$assoc_CM['user_contador_control'];
}
$tablaMaestraUsuario[$Con]=$USERMYSQL;// enlistando en la tabla que se va a representar en la tabla de auditores por ano 
$tablaMaestraOBS[$Con]=$acum_obs;// enlistando en la tabla que se va a representar en la tabla de auditores por ano 
$tablaMaestraAI[$Con]=$acum_ai;// enlistando en la tabla que se va a representar en la tabla de auditores por ano 
$tablaMaestraAL[$Con]=$acum_al;// enlistando en la tabla que se va a representar en la tabla de auditores por ano 
$tablaMaestraTotal[$Con]=$acum_total;// enlistando en la tabla que se va a representar en la tabla de auditores por ano 
$tablaMaestraAnO[$Con]=$DateAno;// enlistando en la tabla que se va a representar en la tabla de auditores por ano 
	}

return  array($tablaMaestraUsuario,$tablaMaestraOBS,$tablaMaestraAI,$tablaMaestraAL,$tablaMaestraTotal,$tablaMaestraAnO);

}