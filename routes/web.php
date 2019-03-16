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

Route::get('/registrar', function () {
    return view('auth.register');
});

//General
//Route::resource('area','AreaController');
//Route::resource('area2','AreaDosController');
//Route::resource('taller','TallerController');
//Route::resource('orden','OrdenController');
//Route::resource('unidad','UnidadController');
//Route::resource('factura','FacturaController');
//Route::resource('archivo','ArchivoController');
//Route::resource('usuario','UsuarioController');


Route::middleware(['auth'])->group(function(){
  //Rutas de usuarios Aplicando Permisos
  Route::get('user','UsuarioController@index')->name('usuario.index')
  ->middleware('permission:usuario.index');

  Route::delete('user/{user}','UsuarioController@destroy')->name('usuario.destroy')
  ->middleware('permission:usuario.destroy');

  Route::get('user/{user}/edit','UsuarioController@edit')->name('usuario.edit')
  ->middleware('permission:usuario.edit');

  Route::put('user/{user}','UsuarioController@update')->name('usuario.update');

  //Rutas de Area que Envia Aplicando Permisos
  Route::get('area','AreaController@index')->name('area.index')
  ->middleware('permission:area.index');

  Route::get('area/create','AreaController@create')->name('area.create');

  Route::post('area','AreaController@store')->name('area.store');

  Route::delete('area/{area}','AreaController@destroy')->name('area.destroy')
  ->middleware('permission:area.destroy');

  Route::get('area/{area}/edit','AreaController@edit')->name('area.edit')
  ->middleware('permission:area.edit');

  Route::put('area/{area}','AreaController@update')->name('area.update');

  //Rutas de Area que Recibe Aplicando Permisos
  Route::get('area2','AreaDosController@index')->name('area2.index')
  ->middleware('permission:area2.index');

  Route::get('area2/create','AreaDosController@create')->name('area2.create')
  ->middleware('permission:area2.create');

  Route::post('area2','AreaDosController@store')->name('area2.store');

  Route::delete('area2/{area2}','AreaDosController@destroy')->name('area2.destroy')
  ->middleware('permission:area2.destroy');

  Route::get('area2/{area2}/edit','AreaDosController@edit')->name('area2.edit')
  ->middleware('permission:area2.edit');

  Route::put('area2/{area2}','AreaDosController@update')->name('area2.update');

  //Rutas de Taller Aplicando Permisos
  Route::get('taller','TallerController@index')->name('taller.index')
  ->middleware('permission:taller.index');

  Route::get('taller/create','TallerController@create')->name('taller.create')
  ->middleware('permission:taller.create');

  Route::post('taller','TallerController@store')->name('taller.store');

  Route::delete('taller/{taller}','TallerController@destroy')->name('taller.destroy')
  ->middleware('permission:taller.destroy');

  Route::get('taller/{taller}/edit','TallerController@edit')->name('taller.edit')
  ->middleware('permission:taller.edit');

  Route::put('taller/{taller}','TallerController@update')->name('taller.update');

  //Rutas de Unidad Aplicando Permisos
  Route::get('unidad','UnidadController@index')->name('unidad.index')
  ->middleware('permission:unidad.index');

  Route::get('unidad/create','UnidadController@create')->name('unidad.create')
  ->middleware('permission:unidad.create');

  Route::post('unidad','UnidadController@store')->name('unidad.store');

  Route::delete('unidad/{unidad}','UnidadController@destroy')->name('unidad.destroy')
  ->middleware('permission:unidad.destroy');

  Route::get('unidad/{unidad}/edit','UnidadController@edit')->name('unidad.edit')
  ->middleware('permission:unidad.edit');

  Route::put('unidad/{unidad}','UnidadController@update')->name('unidad.update');

//Rutas de Ordenes Aplicando Permisos
  Route::get('orden','OrdenController@index')->name('orden.index')
  ->middleware('permission:orden.index');

  Route::get('orden/create','OrdenController@create')->name('orden.create')
  ->middleware('permission:orden.create');

  Route::post('orden','OrdenController@store')->name('orden.store');

  Route::delete('orden/{orden}','OrdenController@destroy')->name('orden.destroy')
  ->middleware('permission:orden.destroy');

  Route::get('orden/{orden}/edit','OrdenController@edit')->name('orden.edit')
  ->middleware('permission:orden.edit');

  Route::put('orden/{orden}','OrdenController@update')->name('orden.update');

  Route::put('orden/{orden}','OrdenController@activar')->name('orden.activar')
  ->middleware('permission:orden.activar');

  Route::get('orden/{orden}','OrdenController@show')->name('orden.show')
  ->middleware('permission:orden.show');

//Rutas de factura Aplicando Permisos
  Route::get('factura','FacturaController@index')->name('factura.index')
  ->middleware('permission:factura.index');

  Route::get('factura/create','FacturaController@create')->name('factura.create')
  ->middleware('permission:factura.create');

  Route::post('factura','FacturaController@store')->name('factura.store');

  Route::delete('factura/{factura}','FacturaController@destroy')->name('factura.destroy')
  ->middleware('permission:factura.destroy');

  Route::get('factura/{factura}/edit','FacturaController@edit')->name('factura.edit')
  ->middleware('permission:factura.edit');

  Route::put('factura/{factura}','FacturaController@update')->name('factura.update');

//Rutas de Reportes Aplicando Permisos
  Route::get('reporte','ReportesController@index')->name('reporte.index')
  ->middleware('permission:reporte.index');

  Route::get('pdf/orden/{orden}', 'ReportesController@pdf')->name('orden.pdf')
  ->middleware('permission:orden.pdf');

  Route::get('pdf/taller/{taller}', 'ReportesController@test_servicio')->name('taller.test')
  ->middleware('permission:taller.test');

  Route::get('pdf/unidad/{unidad}', 'ReportesController@bitacora')->name('unidad.bitacora')
  ->middleware('permission:unidad.bitacora');

  Route::get('pdf/servicios/total/mensual', 'ReportesController@total_servicios_mensual')->name('servicios.mensual')
  ->middleware('permission:servicios.mensual');

  Route::get('pdf/servicios/total/anual', 'ReportesController@total_servicios_anual')->name('servicios.anual')
  ->middleware('permission:servicios.anual');

  Route::get('pdf/mantenimiento/mensual', 'ReportesController@mantenimiento_mensual')->name('mantenimiento.mensual')
  ->middleware('permission:mantenimiento.mensual');

  Route::get('pdf/mantenimiento/anual', 'ReportesController@mantenimiento_anual')->name('mantenimiento.anual')
  ->middleware('permission:mantenimiento.anual');

  Route::get('pdf/reporte/inactivos', 'ReportesController@reporte_vehiculos_inactivos')->name('reporte.vehiculos')
  ->middleware('permission:reporte.vehiculos');

  Route::get('pdf/reporte/gastos', 'ReportesController@reporte_total_gastos')->name('reporte.gastos')
  ->middleware('permission:reporte.gastos');

//Excel
//Rutas de Excel Aplicando Permisos
  Route::get('importar','ExcelController@index')->name('importar.index')
  ->middleware('permission:importar.index');

  //exportar
  Route::get('exportar/orden', 'ExcelController@exportar_ordenes')->name('orden.xlsx')
  ->middleware('permission:orden.xlsx');

  Route::get('exportar/unidad', 'ExcelController@exportar_unidades')->name('unidad.xlsx')
  ->middleware('permission:unidad.xlsx');

  Route::get('exportar/taller', 'ExcelController@exportar_talleres')->name('taller.xlsx')
  ->middleware('permission:taller.xlsx');

  Route::get('exportar/area', 'ExcelController@exportar_areas')->name('area.xlsx')
  ->middleware('permission:area.xlsx');

  Route::get('exportar/areaDos', 'ExcelController@exportar_areas_dos')->name('areaDos.xlsx')
  ->middleware('permission:areaDos.xlsx');

  Route::get('exportar/factura', 'ExcelController@exportar_facturas')->name('factura.xlsx')
  ->middleware('permission:factura.xlsx');

  Route::get('exportar/ordenpago', 'ExcelController@exportar_ordenpago')->name('ordenpago.xlsx')
  ->middleware('permission:ordenpago.xlsx');

  //importar
  Route::post('importar/unidades', 'ExcelController@importar_unidades')->name('importar.unidad')
  ->middleware('permission:importar.unidad');

  Route::post('importar/areas', 'ExcelController@importar_areas')->name('importar.area')
  ->middleware('permission:importar.area');

  Route::post('importar/talleres', 'ExcelController@importar_talleres')->name('importar.taller')
  ->middleware('permission:importar.taller');

  Route::post('importar/areasdos', 'ExcelController@importar_areas_dos')->name('importar.areados')
  ->middleware('permission:importar.areados');

  Route::post('importar/anexo', 'ExcelController@importar_anexo')->name('importar.anexo')
  ->middleware('permission:importar.anexo');

  Route::post('importar/servicio', 'ExcelController@importar_servicio')->name('importar.servicio')
  ->middleware('permission:importar.servicio');

//Rutas de Archivos Aplicando Permisos
  Route::get('archivo','ArchivoController@index')->name('archivo.index')
  ->middleware('permission:archivo.index');

  Route::get('archivo/create','ArchivoController@create')->name('archivo.create')
  ->middleware('permission:archivo.create');

  Route::get('archivo/{archivo}','ArchivoController@show')->name('archivo.show')
  ->middleware('permission:archivo.show');

  Route::post('archivo','ArchivoController@store')->name('archivo.store');

  //PDF
  Route::get('archivo/oficio_solicitud/pdf/{archivo}', 'ArchivoController@oficio_solicitud_pdf')->name('archivo1.pdf');
  Route::get('archivo/cotizacion/pdf/{archivo}', 'ArchivoController@cotizacion_pdf')->name('archivo2.pdf');
  Route::get('archivo/dictamen_tecnico/pdf/{archivo}', 'ArchivoController@dictamen_tecnico_pdf')->name('archivo3.pdf');
  Route::get('archivo/factura/pdf/{archivo}', 'ArchivoController@factura_pdf')->name('archivo4.pdf');
  Route::get('archivo/acuse_recibo_area/pdf/{archivo}', 'ArchivoController@acuse_recibo_area_pdf')->name('archivo5.pdf');

  //XML
  Route::get('archivo/oficio_solicitud/xml/{archivo}', 'ArchivoController@oficio_solicitud_xml')->name('archivo1.xml');
  Route::get('archivo/cotizacion/xml/{archivo}', 'ArchivoController@cotizacion_xml')->name('archivo2.xml');
  Route::get('archivo/dictamen_tecnico/xml/{archivo}', 'ArchivoController@dictamen_tecnico_xml')->name('archivo3.xml');
  Route::get('archivo/factura/xml/{archivo}', 'ArchivoController@factura_xml')->name('archivo4.xml');
  Route::get('archivo/acuse_recibo_area/xml/{archivo}', 'ArchivoController@acuse_recibo_area_xml')->name('archivo5.xml');
  
//Rutas de roles Aplicando Permisos
  Route::get('role','RoleController@index')->name('roles.index')
  ->middleware('permission:roles.index');

  Route::get('role/create','RoleController@create')->name('roles.create')
  ->middleware('permission:roles.create');

  Route::post('role','RoleController@store')->name('roles.store');

  Route::delete('role/{role}','RoleController@destroy')->name('roles.destroy')
  ->middleware('permission:roles.destroy');

  Route::get('role/{role}/edit','RoleController@edit')->name('roles.edit')
  ->middleware('permission:roles.edit');

  Route::put('role/{role}','RoleController@update')->name('roles.update');


  //Rutas de configuracion de dictamen Aplicando Permisos
    Route::get('dictamen','DictamenController@index')->name('dictamen.index')
    ->middleware('permission:dictamen.index');

    Route::get('dictamen/create','DictamenController@create')->name('dictamen.create');

    Route::post('dictamen','DictamenController@store')->name('dictamen.store');

    Route::get('dictamen/{dictamen}/edit','DictamenController@edit')->name('dictamen.edit');

    Route::put('dictamen/{dictamen}','DictamenController@update')->name('dictamen.update');


  //Rutas de anexos Aplicando Permiso
  Route::get('anexo','AnexoController@index')->name('anexo.index')
  ->middleware('permission:anexo.index');

  Route::get('anexo/create','AnexoController@create')->name('anexo.create')
  ->middleware('permission:anexo.create');

  Route::post('anexo','AnexoController@store')->name('anexo.store');

  Route::delete('anexo/{anexo}','AnexoController@destroy')->name('anexo.destroy')
  ->middleware('permission:anexo.destroy');

  Route::get('anexo/{anexo}/edit','AnexoController@edit')->name('anexo.edit')
  ->middleware('permission:anexo.edit');

  Route::put('anexo/{anexo}','AnexoController@update')->name('anexo.update');

  Route::get('anexo/{anexo}','AnexoController@show')->name('anexo.show')
  ->middleware('permission:anexo.show');


  //Rutas de servicios Aplicando Permiso
  Route::get('servicio/create/{anexo}','ServicioController@create')->name('servicio.create')
  ->middleware('permission:servicio.create');

  Route::post('servicio','ServicioController@store')->name('servicio.store');

  Route::delete('servicio/{servicio}','ServicioController@destroy')->name('servicio.destroy')
  ->middleware('permission:servicio.destroy');

  Route::get('servicio/{servicio}/edit/{anexo}','ServicioController@edit')->name('servicio.edit')
  ->middleware('permission:servicio.edit');

  Route::put('servicio/{servicio}','ServicioController@update')->name('servicio.update');


  //Rutas de ordenes de pago Aplicando Permisos
  Route::get('ordenpago','OrdenPagoController@index')->name('ordenpago.index')
  ->middleware('permission:ordenpago.index');

  Route::get('ordenpago/create','OrdenPagoController@create')->name('ordenpago.create')
  ->middleware('permission:ordenpago.create');

  Route::post('ordenpago','OrdenPagoController@store')->name('ordenpago.store');

  Route::delete('ordenpago/{ordenPago}','OrdenPagoController@destroy')->name('ordenpago.destroy')
  ->middleware('permission:ordenpago.destroy');

  Route::get('ordenpago/{ordenPago}/edit','OrdenPagoController@edit')->name('ordenpago.edit')
  ->middleware('permission:ordenpago.edit');

  Route::put('ordenpago/{ordenPago}','OrdenPagoController@update')->name('ordenpago.update');

  Route::put('ordenpago/{ordenPago}','OrdenPagoController@activar')->name('ordenpago.activar')
  ->middleware('permission:ordenpago.activar');

  Route::get('ordenpago/{ordenPago}','OrdenPagoController@show')->name('ordenpago.show')
  ->middleware('permission:ordenpago.show');
});

//Graficas
Route::get('/grafica/servicios', function () {
    return view('graficas.graficas_servicios');
});
Route::get('/grafica/importes', function () {
    return view('graficas.graficas_importes');
});

//Permisos
Auth::routes();
//Pagina Principal
Route::get('/', 'HomeController@index')->name('home');

//Select naexo
Route::get('orden/create','SelectDinamico@index');
Route::post('selectdinamico/fetch','SelectDinamico@fetch')->name('selectdinamico.fetch');

//Ajax
Route::post('orden/recuperar/area','AjaxController@area1')->name('ajax.area');
Route::post('orden/recuperar/area2','AjaxController@area2')->name('ajax.area2');
Route::post('orden/recuperar/unidad','AjaxController@unidad')->name('ajax.unidad');
Route::post('orden/recuperar/servicios','AjaxController@servicios')->name('ajax.servicios');
Route::post('orden/recuperar/servicio','AjaxController@servicio')->name('ajax.servicio');