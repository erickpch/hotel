<?php

use Illuminate\Support\Facades\Route;
use App\Habitacion;

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
})->middleware('guest')->name('/');

Route::get('/login','UsuarioController@vistaLogin')->name('login_usuario');
Route::post('/login','UsuarioController@login')->name('logear_usuario');

Route::get('/admin','AdministradorController@vistaLogin')->name('login_administrador');
Route::post('/admin','AdministradorController@login')->name('logear_administrador');

Route::get('/signup','UsuarioController@vistaSignup')->name('signup_usuario');
Route::post('/signup','UsuarioController@signup')->name('registrar_usuario');

Route::post('/logout_usuario','UsuarioController@logout')->name('logout_usuario');
Route::post('/logout_admin','AdministradorController@logout')->name('logout_admin');

//menu
Route::get('/menu','HotelController@getMenu')->name('inicio_usuario');


Route::get('/habitaciones','InicioController@cuartos')->name('cuartos');
Route::get('/servicios','InicioController@servicios')->name('servicios');

//usuario

Route::get('/opciones','VentasController@opciones')->name('opciones');
Route::post('/opciones','VentasController@cambiar')->name('cambiar_datos');


Route::get('/menu/reservas','VentasController@reservas')->name('reservas');

Route::get('/menu/reservas/habitaciones','VentasController@show_habitaciones')->name('show_hab');


Route::get('/menu/reservas/habitaciones/{id}','VentasController@mostrar_producto')->name('mostrar_producto'); 
Route::post('/menu/reservas/habitaciones/{id}','CartController@add')->name('carrito_habitacion'); //agregado

Route::get('/prueba', function(){
    return view('datepicker');
});
//Carrito

Route::get('carrito','CartController@show')->name('cart-show');
//Route::get('carrito/add/{product}','CartController@add')->name ('car-add');
Route::post('carrito','CartController@delete')->name('cart-del');
Route::get('carrito/trash','CartController@trash')->name('cart-trash');
Route::bind('product',function($slug){
    return App\Habitacion::where('nro_habitacion',$slug)->first();
});

// servicios
Route::get('/menu/compra_servicios','ServicioController@show')->name('venta_ser');
Route::get('/menu/compra_servicios/{id}','ServicioController@mostrar_servicio')->name('mostrar_servicio'); 
Route::post('/menu/compra_servicios/add','CartController@add_serv')->name('carrito_serv');
Route::post('/menu/compra_servicios/del','CartController@delete_serv')->name('del_serv');

//salones

Route::get('/menu/reservas/salones','SalonController@show')->name('show_sal');
Route::get('/menu/reservas/salones/{id}','SalonController@mostrar_salon')->name('mostrar_salon'); 
Route::post('/menu/reservas/salones/add','CartController@add_sal')->name('carrito_sal');
Route::post('/menu/reservas/salones/del','CartController@delete_sal')->name('del_sal');

//geneerar pedido
Route::get('menu/pedido','PedidoController@show')->name('pedido');
Route::post('menu/pedido/procesar','PedidoController@procesar')->name('procesar');
Route::post('menu/pedido/procesar/finish','PedidoController@facturar')->name('facturar');
Route::get('menu/finalizado','PedidoController@redireccionar')->name('finalizar');


//Adminisitrador

Route::get('/menuAdministrador','adminController@getMenu')->name('inicio_admin');
Route::get('/menuAdministrador/reportes','adminController@show_reporte')->name('s_reporte');
Route::get('/menuAdministrador/gestion','adminController@show_gestion')->name('s_gestion');

Route::post('/menuAdministrador/gestion/habitacion','adminController@verificar_hab')->name('verificar_h');
Route::post('/menuAdministrador/gestion/elh','adminController@eliminar_hab')->name('eliminar_h');
Route::post('/menuAdministrador/gestion/habitacion/modh','adminController@modificar_hab')->name('modificar_h');
Route::post('/menuAdministrador/gestion/habitacion/resh','adminController@reservar_hab')->name('reservar_h');

Route::post('/menuAdministrador/gestion/servcio','adminController@verificar_serv')->name('verificar_s');
Route::post('/menuAdministrador/gestion/els','adminController@eliminar_serv')->name('eliminar_s');
Route::post('/menuAdministrador/gestion/servicio/mods','adminController@modificar_serv')->name('modificar_s');

Route::post('/menuAdministrador/gestion/evento','adminController@verificar_ev')->name('verificar_e');
Route::post('/menuAdministrador/gestion/ele','adminController@eliminar_ev')->name('eliminar_e');
Route::post('/menuAdministrador/gestion/evento/mode','adminController@modificar_ev')->name('modificar_e');
Route::post('/menuAdministrador/gestion/evento/rese','adminController@reservar_ev')->name('reservar_e');


Route::post('/diario','adminController@diario')->name('diario');
Route::post('/mensual','adminController@mensual')->name('mensual');