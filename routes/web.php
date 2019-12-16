<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

//Airports
Route::get('/aeropuertos/ajax/select/{tipo}/{id}/{piloto_id?}', 'AirportController@ajax_select')->name('airports.ajax.select');
Route::get('/aeropuertos', 'AirportController@index')->name('airports');
Route::get('/aeropuertos/crear', 'AirportController@create')->name('airports.create');
Route::post('/aeropuertos/store', 'AirportController@store')->name('airports.store');

//AirplaneBrands
Route::get('/aviones/marcas', 'AirplaneBrandController@index')->name('airplanebrands');
Route::get('/aviones/marcas/create', 'AirplaneBrandController@create')->name('airplanebrands.create');
Route::post('/aviones/marcas/store', 'AirplaneBrandController@store')->name('airplanebrands.store');
Route::get('/aviones/marcas/{id}', 'AirplaneBrandController@show')->name('airplanebrands.show');
Route::get('/aviones/marcas/editar/{id}', 'AirplaneBrandController@edit')->name('airplanebrands.edit');
Route::post('/aviones/marcas/actualizar', 'AirplaneBrandController@update')->name('airplanebrands.update');
Route::get('/aviones/marcas/borrar/{id}', 'AirplaneBrandController@delete')->name('airplanebrands.delete');
//AirplaneModel
Route::get('/aviones/modelos', 'AirplaneModelController@index')->name('airplanemodels');
Route::get('/aviones/modelos/create', 'AirplaneModelController@create')->name('airplanemodels.create');
Route::post('/aviones/modelos/store', 'AirplaneModelController@store')->name('airplanemodels.store');
Route::get('/aviones/modelos/{id}', 'AirplaneModelController@show')->name('airplanemodels.show');
Route::get('/aviones/modelos/editar/{id}', 'AirplaneModelController@edit')->name('airplanemodels.edit');
Route::post('/aviones/modelos/actualizar', 'AirplaneModelController@update')->name('airplanemodels.update');
Route::get('/aviones/modelos/borrar/{id}', 'AirplaneModelController@delete')->name('airplanemodels.delete');
//Airplane
Route::get('/aviones', 'AirplaneController@index')->name('airplanes');
Route::get('/aviones/create', 'AirplaneController@create')->name('airplanes.create');
Route::post('/aviones/store', 'AirplaneController@store')->name('airplanes.store');
Route::get('/aviones/editar/{id}', 'AirplaneController@edit')->name('airplanes.edit');
Route::post('/aviones/actualizar', 'AirplaneController@update')->name('airplanes.update');
Route::get('/avion/{id}', 'AirplaneController@show')->name('airplanes.show');
//AirplaneAlertTacometro
Route::get('/aviones/diferenciaentacometro', 'AirplaneAlertTacometroController@index')->name('airplanes.tacometroalerta');
//AirplanePieza
Route::get('/avipiezas', 'AirplanePiezaController@index')->name('inventario.airplanepiezas');
Route::get('/avipiezas/create', 'AirplanePiezaController@create')->name('inventario.airplanepiezas.create');
Route::post('/avipiezas/store', 'AirplanePiezaController@store')->name('inventario.airplanepiezas.store');
Route::get('/avipiezas/asignar/{pieza_id}', 'AirplanePiezaController@asignarcreate')->name('inventario.airplanepiezas.asignarcreate');
Route::post('/avipiezas/asignarstore/{pieza_id}', 'AirplanePiezaController@asignarstore')->name('inventario.airplanepiezas.asignarstore');

// Mantencion
Route::get('/mantenciones', 'MantencionController@index')->name('mantencion');
Route::get('/mantenciones/create/{notification_id?}', 'MantencionController@create')->name('mantencion.create');
Route::get('/mantenciones/historico', 'MantencionController@historico')->name('mantencion.historico');
Route::post('/mantenciones/store', 'MantencionController@store')->name('mantencion.store');
Route::get('/mantenciones/edit/{id}', 'MantencionController@edit')->name('mantencion.edit');
Route::post('/mantenciones/update', 'MantencionController@update')->name('mantencion.update');
Route::get('/mantenciones/show/{id}', 'MantencionController@show')->name('mantencion.show');
Route::get('/mantenciones/iniciar/{id}', 'MantencionController@iniciar')->name('mantencion.iniciar');
Route::get('/mantenciones/finalizarcreate/{id}', 'MantencionController@finalizarcreate')->name('mantencion.finalizarcreate');
Route::post('/mantenciones/finalizarstore', 'MantencionController@finalizarstore')->name('mantencion.finalizarstore');
// MantencionTareaList
Route::get('/tareas', 'MantencionTareaListController@index')->name('mantencion.tarealists');
Route::post('/tareas/store', 'MantencionTareaListController@store')->name('mantencion.tarealists.store');
Route::get('/tareas/borrar/{id}', 'MantencionTareaListController@delete')->name('mantencion.tarealists.delete');
Route::get('/tareas/deshabilitar/{id}', 'MantencionTareaListController@deshabilitar')->name('mantencion.tarealists.deshabilitar');
// MantencionTipos
Route::get('/tiposdemantenciones', 'MantencionTipoController@index')->name('mantencion.tipos');
Route::post('/tiposdemantenciones/store', 'MantencionTipoController@store')->name('mantencion.tipos.store');
Route::get('/tiposdemantenciones/edit/{id}', 'MantencionTipoController@edit')->name('mantencion.tipos.edit');
Route::post('/tiposdemantenciones/update', 'MantencionTipoController@update')->name('mantencion.tipos.update');
Route::get('/tipodemantencion/show/{id}', 'MantencionTipoController@show')->name('mantencion.tipos.show');
Route::get('/tipodemantencion/borrar/{id}', 'MantencionTipoController@delete')->name('mantencion.tipos.delete');
Route::get('/tipodemantencion/deshabilitar/{id}', 'MantencionTipoController@deshabilitar')->name('mantencion.tipos.deshabilitar');

//Notifications
Route::get('/notificaciones', 'NotificationController@index')->name('notifications');

//Piezas
Route::get('/piezas', 'PiezaController@index')->name('inventario.piezas');
Route::get('/piezas/nueva/{airplane_id?}', 'PiezaController@create')->name('inventario.piezas.create');
Route::post('/piezas/store', 'PiezaController@store')->name('inventario.piezas.store');
Route::get('/piezas/editar/{id}', 'PiezaController@edit')->name('inventario.piezas.edit');
Route::post('/piezas/actualizar', 'PiezaController@update')->name('inventario.piezas.update');
Route::get('/piezas/{id}', 'PiezaController@show')->name('inventario.piezas.show');
//PiezaFabricante
Route::get('/piezafabricantes', 'PiezaFabricanteController@index')->name('inventario.piezafabricantes');
Route::get('/piezafabricantes/nueva', 'PiezaFabricanteController@create')->name('inventario.piezafabricantes.create');
Route::post('/piezafabricantes/store', 'PiezaFabricanteController@store')->name('inventario.piezafabricantes.store');
Route::get('/piezafabricantes/borrar/{id}', 'PiezaFabricanteController@delete')->name('piezafabricantes.delete');
Route::get('/piezafabricantes/deshabilitar/{id}', 'PiezaFabricanteController@deshabilitar')->name('piezafabricantes.deshabilitar');
//PiezaTipo
Route::get('/piezatipos', 'PiezaTipoController@index')->name('inventario.piezatipos');
Route::get('/piezatipos/nueva', 'PiezaTipoController@create')->name('inventario.piezatipos.create');
Route::post('/piezatipos/store', 'PiezaTipoController@store')->name('inventario.piezatipos.store');
Route::get('/pieza/tipos/borrar/{id}', 'PiezaTipoController@delete')->name('piezatipos.delete');
Route::get('/pieza/tipos/deshabilitar/{id}', 'PiezaTipoController@deshabilitar')->name('piezatipos.deshabilitar');

//PilotoAirplaneModel
Route::get('/pilotos/modelos', 'PilotoAirplaneModelController@index')->name('pilotoairplanemodels');
Route::get('/pilotos/modelos/create', 'PilotoAirplaneModelController@create')->name('pilotoairplanemodels.create');
Route::post('/pilotos/modelos/store', 'PilotoAirplaneModelController@store')->name('pilotoairplanemodels.store');
Route::get('/pilotos/modelos/{id}', 'PilotoAirplaneModelController@show')->name('pilotoairplanemodels.show');
Route::get('/pilotos/modelos/editar/{piloto_id}', 'PilotoAirplaneModelController@edit')->name('pilotoairplanemodels.edit');
Route::post('/pilotos/modelos/actualizar', 'PilotoAirplaneModelController@update')->name('pilotoairplanemodels.update');
//Pilotos
Route::get('/pilotos', 'PilotoController@index')->name('pilotos');
Route::get('/pilotos/nuevo', 'PilotoController@create')->name('pilotos.create');
Route::post('/pilotos/store', 'PilotoController@store')->name('pilotos.store');
Route::get('/pilotos/editar/{id}', 'PilotoController@edit')->name('pilotos.edit');
Route::post('/pilotos/actualizar', 'PilotoController@update')->name('pilotos.update');
Route::get('/piloto/{id}', 'PilotoController@show')->name('pilotos.show');
//PilotoAirports
Route::get('/pilotos/aeropuertos', 'PilotoAirportController@index')->name('pilotoairports');
Route::get('/pilotos/aeropuertos/create', 'PilotoAirportController@create')->name('pilotoairports.create');
Route::post('/pilotos/aeropuertos/store', 'PilotoAirportController@store')->name('pilotoairports.store');
Route::get('/pilotos/aeropuertos/{id}', 'PilotoAirportController@show')->name('pilotoairports.show');
Route::get('/pilotos/aeropuertos/editar/{piloto_id}', 'PilotoAirportController@edit')->name('pilotoairports.edit');
Route::post('/pilotos/aeropuertos/actualizar', 'PilotoAirportController@update')->name('pilotoairports.update');
//PilotoSaldo
Route::post('/pilotos/saldo/agregar', 'PilotoSaldoController@store')->name('pilotosaldos.store');
Route::get('/pilotos/saldo/{piloto_id}/{vuelo_id?}', 'PilotoSaldoController@create')->name('pilotosaldos.create');


//Iniciar Vuelo (Despegar)
Route::get('/vuelos/salidas/listado', 'VueloSalidaController@index')->name('vuelos_salidas');
Route::get('/vuelos/salidas/{id}', 'VueloSalidaController@create')->name('vuelos_salidas.create');
Route::post('/vuelos/salidas/store', 'VueloSalidaController@store')->name('vuelos_salidas.store');

//Finalizar Vuelo (Aterrizar)
Route::get('/vuelos/llegadas/listado', 'VueloLlegadaController@index')->name('vuelos_llegadas');
Route::get('/vuelos/llegadas/{id}', 'VueloLlegadaController@create')->name('vuelos_llegadas.create');
Route::post('/vuelos/llegadas/store', 'VueloLlegadaController@store')->name('vuelos_llegadas.store');

//Solicitud de Vuelos
Route::get('/vuelos/solicitudes', 'VueloSolicitudController@index')->name('vuelos_solicitudes');
Route::get('/vuelos/solicitud/nueva', 'VueloSolicitudController@create')->name('vuelos_solicitudes.create');
Route::post('/vuelos/solicitud/nueva/store', 'VueloSolicitudController@store')->name('vuelos_solicitudes.store');
Route::get('/vuelos/solicitud/{accion}/{id}', 'VueloSolicitudController@accion')->name('vuelos_solicitudes.accion');
//Vuelos
Route::get('/vuelos', 'VueloController@index')->name('vuelos');
Route::get('/volando', 'VueloController@volando')->name('vuelos.volando');
Route::get('/vuelos/historico', 'VueloController@historico')->name('vuelos.historico');
Route::get('/vuelos/informe/{id}', 'VueloController@informe')->name('vuelos.informe');
Route::get('/vuelo/{id}', 'VueloController@show')->name('vuelos.show');
// Vuelos Rechazados (Anulados)
Route::post('/vuelos/anulando/store', 'VueloRechazoController@store')->name('vuelos_rechazos.store');
Route::get('/vuelos/anulando/{vuelo_id}', 'VueloRechazoController@create')->name('vuelos.rechazos.create');
//VueloTipo
Route::get('/vuelos/tipos', 'VueloTipoController@index')->name('vuelotipos');
Route::get('/vuelos/tipos/create', 'VueloTipoController@create')->name('vuelotipos.create');
Route::post('/vuelos/tipos/store', 'VueloTipoController@store')->name('vuelotipos.store');
Route::get('/vuelos/tipos/editar/{vuelotipo_id}', 'VueloTipoController@edit')->name('vuelotipos.edit');
Route::put('/vuelos/tipos/actualizar', 'VueloTipoController@update')->name('vuelotipos.update');
Route::get('/vuelos/tipos/borrar/{id}', 'VueloTipoController@delete')->name('vuelotipos.delete');
Route::get('/vuelos/tipos/deshabilitar/{id}', 'VueloTipoController@deshabilitar')->name('vuelotipos.deshabilitar');
Route::get('/vuelos/tipos/{id}', 'VueloTipoController@show')->name('vuelotipos.show');

// Vuelocobros EXCEPCIÓN para que los vuelos locales puedan ser finalizados con un monto menor al minimo
Route::get('/vuelos/excepcion/{vuelo_id}', 'VueloCobroController@excepcion')->name('vuelocobro.excepcion');
// Vuelos Bitacora (Aterrizajes parciales para vuelos tipo RAID)
Route::post('/vuelos/cierreparcial/store', 'VueloBitacoraController@storellegada')->name('vuelos.bitacoras.storellegada');
Route::get('/vuelos/cierreparcial/{vuelo_id}', 'VueloBitacoraController@createllegada')->name('vuelos.bitacoras.createllegada');
Route::post('/vuelos/nuevodespegue/store', 'VueloBitacoraController@storesalida')->name('vuelos.bitacoras.storesalida');
Route::get('/vuelos/nuevodespegue/{vuelo_id}', 'VueloBitacoraController@createsalida')->name('vuelos.bitacoras.createsalida');