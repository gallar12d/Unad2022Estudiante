<?php

use App\Http\Controllers\ActividadPlantilla;
use Illuminate\Support\Facades\Route;

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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//roues perfil
Route::get('/perfiles', 'PerfilController@index')->name('perfiles');
Route::post('/perfiles', 'PerfilController@store')->name('perfiles');
Route::get('/createPerfil', 'PerfilController@create')->name('createPerfil');
Route::get('/editPerfil/{id_perfil}', 'PerfilController@edit')->name('editPerfil');
Route::post('/perfiles/update/{id}', ['as' => 'perfiles.update', 'uses' => 'PerfilController@update']);
Route::get('/perfiles/update/{id}', ['as' => 'perfiles.update', 'uses' => 'PerfilController@update']);
Route::get('/perfiles/destroy/{id}', ['as' => 'perfiles.destroy', 'uses' => 'PerfilController@destroy']);

//routes users
Route::get('users/', ['as' => 'users.index', 'uses' => 'UserController@index']);
Route::get('users/show/{id}/', ['as' => 'users.show', 'uses' => 'UserController@shows']);
Route::get('users/create/', ['as' => 'users.create', 'uses' => 'UserController@create']);
Route::post('users/create', ['as' => 'users.store', 'uses' => 'UserController@store']);
Route::get('/users/edit/{id}/', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::post('users/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::get('/users/delete/{id}/', ['as' => 'users.destroy', 'uses' => 'UserController@destroy']);


Route::resources([
    'escuelas' => 'EscuelaController',
    'programas' => 'ProgramaController',
    'tipo_recursos' => 'TipoRecursoController',
    'plantillas_procedimientos' => 'PlantillaProcedimientoController',
    'actividades_plantillas' =>'ActividadPlantillaController',
    'procedimientos' =>'ProcedimientoController',
    'actividades' =>'ActividadController',
    'permisos' =>'PermisoController',
    'roles' =>'RolController',
    'zonas' =>'ZonaController',
    'centros' =>'CentroController',



]);

Route::get('/plantillas_procedimientos/{id_activity}/activities', ['as' => 'plantillas_procedimientos.activities', 'uses' => 'PlantillaProcedimientoController@activities']);
Route::post('/plantillas_procedimientos/{id_activity}/save_activities', ['as' => 'plantillas_procedimientos.save_activities', 'uses' => 'PlantillaProcedimientoController@save_activities']);
Route::get('/tipo_recursos/search', ['as' => 'tipo_recursos.search', 'uses' => 'TipoRecursoController@search']);
Route::get('/tipo_recursos/buscar/algo', ['as' => 'tipo_recursos.buscar', 'uses' => 'TipoRecursoController@buscar']);

Route::get('/procedimientos/activities/{id_plantilla}', ['as' => 'procedimientos.activities', 'uses' => 'ProcedimientoController@activities']);
Route::get('/procedimientos/finish/{id_procedimiento}', ['as' => 'procedimientos.finish', 'uses' => 'ProcedimientoController@finish']);

Route::get('/procedimientos/add_user/new', ['as' => 'procedimientos.add_user', 'uses' => 'ProcedimientoController@add_user']);
Route::get('/procedimientos/load_user/{id_pefil}', ['as' => 'procedimientos.load_user', 'uses' => 'ProcedimientoController@load_user']);
Route::post('/procedimientos/vesionar/{id_procedimiento}', ['as' => 'procedimientos.versionar', 'uses' => 'ProcedimientoController@versionar']);
Route::post('/procedimientos/anotacion/{id_procedimiento}', ['as' => 'procedimientos.anotacion', 'uses' => 'ProcedimientoController@anotacion']);
// Route::post('/procedimientos/anexar/{id_procedimiento}', ['as' => 'procedimientos.anexar', 'uses' => 'ProcedimientoController@versionar']);
Route::get('/procedimientos/anexos/public_route/{id_procedimiento}', ['as' => 'procedimientos.anexos_publicos', 'uses' => 'ProcedimientoController@anexos_publicos']);
Route::get('/procedimientos/reportes/reporte_seguimiento/{id_procedimiento}', ['as' => 'procedimientos.reporte_seguimiento', 'uses' => 'ProcedimientoController@reporte_seguimiento']);


Route::get('/actividades/resources/insumos/{id_actividad}', ['as' => 'actividades.insumos', 'uses' => 'ActividadController@insumos']);
Route::get('/actividades/finish/{id_actividad}', ['as' => 'actividades.finish', 'uses' => 'ActividadController@finish']);
Route::post('/actividades/finish/decision/{id_actividad}', ['as' => 'actividades.finishdecision', 'uses' => 'ActividadController@finishdecision']);

Route::get('/actividades/resources/productos/{id_actividad}', ['as' => 'actividades.productos', 'uses' => 'ActividadController@productos']);
Route::post('/actividades/add_route/{id_tipo_recurso}/{tipo}', ['as' => 'actividades.add_route', 'uses' => 'ActividadController@add_route']);
Route::post('/actividades/update_route/{id_tipo_recurso}/{tipo}', ['as' => 'actividades.update_route', 'uses' => 'ActividadController@update_route']);


Route::get('/programas/escuela/{id_escuela}', ['as' => 'programas.escuela', 'uses' => 'ProgramaController@programaPorEscuela']);





