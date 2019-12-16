<?php
/*
** HELPERS (A ser utilizados en las vistas y en los controladores)
** Author: nextstation.cl
*/

//Declarar Variables Globales
use App\Log;
use App\Notification;
use App\Region;
use App\User;
use App\Vuelo;
use App\VueloTipo;

//Poner fecha en Formato dd/mm/YYYY
function dateformat($fecha) { 
	if ($fecha!=null) {
		return date('d/m/Y',strtotime($fecha));
	} else {
		return null;
	}
}

//Poner fecha en Formato dd/mm/YYYY
function dateformatCustom($fecha,$format) { 
	if ($fecha!=null) {
		return date($format,strtotime($fecha));
	} else {
		return null;
	}
}

//Poner fecha en Formato dd/mm/YYYY HH:ii
function datetimeformat($fecha) { 
	if ($fecha!=null) {
		return date('d/m/Y H:i',strtotime($fecha))." hrs.";
	} else {
		return null;
	}
}

//Poner fecha en Formato HH:ii
function timeFormat($fecha) { 
	if ($fecha!=null) {
		return date('H:i',strtotime($fecha))." hrs.";
	} else {
		return null;
	}
}


//Trae el nombre completo de un usuario
function fullname($user_id) {
	$u = User::find($user_id);
	$fullname = $u->name.' '.$u->lastname_paterno.' '.$u->lastname_materno;
	return $fullname;
}

//Trae el nombre completo EN EL SIGUIENTE ORDEN: apellido paterno, materno, nombre.
function fullnameApellido($user_id) {
	$u = User::find($user_id);
	$fullname = $u->lastname_paterno.' '.$u->lastname_materno.' '.$u->name;
	return $fullname;
}

//Trae el rol de un usuario
function getUserRol($user_id) { $rol=null;
	$u = User::find($user_id);
	if ($u->rol==1) {$rol='Piloto';}
	if ($u->rol==2) {$rol='Administrador';}
	if ($u->rol==3) {$rol='Mecánico';}
	return $rol;
}

//Crear un registro de Log de Usuario
function setLog($texto) {
	$u = new Log();
	$u->user_id = Auth::user()->id;
	$u->detalle = $texto;
	$u->save();
}

//Crear un registro de Notificacion de Usuario
function setNotification($texto,$user_id) {
	$n = new Notification();
	$n->user_id = $user_id;
	$n->detalle = $texto;
	$n->save();
}

//Status de Vuelo
function getVueloStatus($status) { $text=null;
	if ($status==0) {$text='Rechazado.';}
	if ($status==1) {$text='Pendiente de Autorización.';}
	if ($status==2) {$text='Aprobado y esperando el despegue.';}
	if ($status==3) {$text='Volando y esperando el aterrizaje.';}
	if ($status==4) {$text='Vuelo finalizado.';} //Aterrizaje definitivo (Local, Popular, Taxeo, Instrucción y Privado)
	if ($status==5) {$text='Vuelo finalizado.';} //Aterrizaje parcial (Tipo RAID)
	return $text;
}

//Regresa el dato del ultimo tacometro de salida del avion
function getLastTacometroByAirplane($airplane_id) {
	$v = Vuelo::where('airplane_id',$airplane_id)->where('status',4)->orderBy('updated_at', 'desc')->first();
	if ($v == null) {
		$tacometro=0;
	} else {
		if ($v->llegada == null) {
			$tacometro=0;
		} else {
			$tacometro = $v->llegada->tacometro;
		}
	}
	return $tacometro;
}

//Retorna si el <option> es selected
function isSelected($current,$value) {
	if ($current == $value) {
		return 'selected';
	}
}

//Retorna si el <option> es selected
function defaultSelected($tipo,$value) {
	if ($tipo == 'region') {
		if ($value == 8) {return 'selected';} //Región del BioBio
	}
	if ($tipo == 'airport') {
		if ($value == 1) {return 'selected';} //Aeropuerto de Talcahuano
	}
}

//calcula el precio del vuelo segun el tipo y la duración
function calculateMontoTipoVuelo($vuelo_tipo_id, $tacometro, $excepcion=null){
	$VueloTipo = VueloTipo::find($vuelo_tipo_id);
	if ($tacometro <= $VueloTipo->min_horas  AND $excepcion==null){$tacometro = $VueloTipo->min_horas;}
	$precio_a_pagar = $tacometro * $VueloTipo->monto;
	return $precio_a_pagar;
}

//Convertir en formato pesos chilenos
function clp($monto) {
	$total = "$".number_format($monto, 0, ',', '.');
	return $total;
}

//Transforma segundos a hora
function segundos_a_hora($tiempo) {
	$tiempo_hora = $tiempo / 3600;
	if($tiempo_hora <= 1){
		$tiempo_hora = round($tiempo_hora,2) . " Hora";
	}else{
		$tiempo_hora = round($tiempo_hora,2) . " Horas";
	}
	return $tiempo_hora;
}

//Nombre completo de la región (con su número romano)
function getFullRegionName($region_id) { 
	if ($region_id != null) {
		$region = Region::find($region_id);
		if ($region->country->iso_2 == 'CL'){ //País Chile
			$nombrecompleto = $region->extra . " - " . $region->nombre;
		}
		return $nombrecompleto;
	} else {
		return null;
	}
}

//Status del avión
function getAirplaneStatus($status_id) { $status=null;
	$status = listAirplaneStatus()[$status_id];
	return $status;
}
function listAirplaneStatus() { $status=[];
	$status[0] = "Eliminado";
	$status[1] = "Aeronavegable";
	$status[2] = "En Mantención";
	$status[3] = "No Aeronavegable";
	return $status;
}

//Tipo de Licencia de Piloto
function listLicenciaTipo() { $licencias=[];
	$licencias[1] = "Universal";
	return $licencias;
}

//Tipo de PilotoSaldo
function getPilotoSaldoTipo($status) { $text=null;
	if ($status==0) {$text='Carga Inicial.';}
	if ($status==1) {$text='Abono a Saldo';}
	if ($status==2) {$text='Cargo por Vuelo';}
	if ($status==3) {$text='Cargo Cuota Mensual';}
	return $text;
}
//Formas de Pago
function getFormasPago($id) { $status=null;
	$status = listFormasPago()[$id];
	return $status;
}
function listFormasPago() { $formas=[];
	$formas[0] = "Mediante el Sistema";
	$formas[1] = "Efectivo";
	$formas[2] = "Transferencia Bancaria";
	$formas[3] = "Cheque";
	return $formas;
}
// Opciones de Rechazo
function getRechazoOpciones($id) { $status=null;
	$status = listFormasPago()[$id];
	return $status;
}
function listRechazoOpciones() { $list=[];
	$list[1] = "Pax";
	$list[2] = "Meteo";
	$list[3] = "Condición del Avión";
	$list[4] = "Particular Administrador 1";
	$list[5] = "Particular Administrador 2";
	return $list;
}
function isRechazoOpcionesAdmin($current) { 
	$array = [4,5];
	if (in_array($current, $array)) {
		return true;
	}
	return false;
}

// Status de la pieza en el Inventario
function getTipoPieza($tipo) { $text=null;
	if ($tipo==1) {$text='En Bodega.';}
	if ($tipo==2) {$text='En Uso.';}
	return $text;
}

//Status de Una Mantención
function getMantencionStatus($status_id) { $status=null;
	$status = listMantencionStatus()[$status_id];
	return $status;
}
function listMantencionStatus() { $status=[];
	$status[0] = "Solicitada";
	$status[1] = "En Proceso";
	$status[2] = "Finalizada";
	$status[3] = "Anulada";
	return $status;
}

?>