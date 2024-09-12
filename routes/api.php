<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TipoReporteController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\EscalafonController;
use App\Http\Controllers\ReparticionController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FuerzaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\GrupoSanguineoController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\ArmaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('uploadFile', function (Request $request) {
    try {
        if ($request->hasFile('File')) {
            $fileName = md5(uniqid() . \Carbon\Carbon::now()) . '.' . strtolower($request->file('File')->getClientOriginalExtension());
            //dd($request->op);
            $path = $request->file('File')->storeAs('documents', $fileName, 'public');

            $data = array(
                'success' => true,
                'data' => $fileName,
                'msg' => trans('messages.file_uplodaded')
            );
        } else {
            $data = array(
                'success' => false,
                'data' => null,
                'msg' => 'Error al guardar archivo.'
            );
        }
    } catch (\Exception $e) {
        $data = array(
            'success' => false,
            'data' => null,
            'msg' => $e->getMessage()
        );
    }
    return response()->json($data);
})->name('utils.uploadFile');

Route::post('login', [LoginController::class, 'login'])->middleware('guest');
Route::post('loginToken365', [LoginController::class, 'loginToken365'])->middleware('guest');


/************************************ PERSONA *****************/
Route::group(['prefix' => 'Persona', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [PersonaController::class, 'list'])->name('Persona.list');
    Route::get('/index', [PersonaController::class, 'index'])->name('Persona.index');
    Route::post('/destroy', [PersonaController::class, 'destroy'])->name('Persona.destroy');
    Route::post('/store', [PersonaController::class, 'store'])->name('Persona.store');
    Route::get('/show', [PersonaController::class, 'show'])->name('Persona.show');
    Route::get('/select2', [PersonaController::class, 'select2'])->name('Persona.select2');
    Route::post('/changePassword', [PersonaController::class, 'changePassword'])->name('Persona.changePassword');
});

/************************************ Cargo *****************/
Route::group(['prefix' => 'Cargo', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [CargoController::class, 'list'])->name('Cargo.list');
    Route::get('/index', [CargoController::class, 'index'])->name('Cargo.index');
    Route::post('/destroy', [CargoController::class, 'destroy'])->name('Cargo.destroy');
    Route::post('/store', [CargoController::class, 'store'])->name('Cargo.store');
    Route::get('/show', [CargoController::class, 'show'])->name('Cargo.show');
});

/************************************ Reparticion *****************/
Route::group(['prefix' => 'Reparticion', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [ReparticionController::class, 'list'])->name('Reparticion.list');
    Route::get('/index', [ReparticionController::class, 'index'])->name('Reparticion.index');
    Route::post('/destroy', [ReparticionController::class, 'destroy'])->name('Reparticion.destroy');
    Route::post('/store', [ReparticionController::class, 'store'])->name('Reparticion.store');
    Route::get('/show', [ReparticionController::class, 'show'])->name('Reparticion.show');
});

/************************************ Escalafon *****************/
Route::group(['prefix' => 'Escalafon', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [EscalafonController::class, 'list'])->name('Escalafon.list');
    Route::get('/index', [EscalafonController::class, 'index'])->name('Escalafon.index');
    Route::post('/destroy', [EscalafonController::class, 'destroy'])->name('Escalafon.destroy');
    Route::post('/store', [EscalafonController::class, 'store'])->name('Escalafon.store');
    Route::get('/show', [EscalafonController::class, 'show'])->name('Escalafon.show');
});

/************************************ Grado *****************/
Route::group(['prefix' => 'Grado', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [GradoController::class, 'list'])->name('Grado.list');
    Route::get('/index', [GradoController::class, 'index'])->name('Grado.index');
    Route::post('/destroy', [GradoController::class, 'destroy'])->name('Grado.destroy');
    Route::post('/store', [GradoController::class, 'store'])->name('Grado.store');
    Route::get('/show', [GradoController::class, 'show'])->name('Grado.show');
});

/************************************ DEPARTAMENTO *****************/
Route::group(['prefix' => 'Departamento', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [DepartamentoController::class, 'list'])->name('Departamento.list');
    Route::get('/index', [DepartamentoController::class, 'index'])->name('Departamento.index');
    Route::post('/destroy', [DepartamentoController::class, 'destroy'])->name('Departamento.destroy');
    Route::post('/store', [DepartamentoController::class, 'store'])->name('Departamento.store');
    Route::get('/show', [DepartamentoController::class, 'show'])->name('Departamento.show');
});

/************************************ FUERZA *****************/
Route::group(['prefix' => 'Fuerza', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [FuerzaController::class, 'list'])->name('Fuerza.list');
    Route::get('/index', [FuerzaController::class, 'index'])->name('Fuerza.index');
    Route::post('/destroy', [FuerzaController::class, 'destroy'])->name('Fuerza.destroy');
    Route::post('/store', [FuerzaController::class, 'store'])->name('Fuerza.store');
    Route::get('/show', [FuerzaController::class, 'show'])->name('Fuerza.show');
});

/************************************ ESPECIALIDAD *****************/
Route::group(['prefix' => 'Especialidad', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [EspecialidadController::class, 'list'])->name('Especialidad.list');
    Route::get('/index', [EspecialidadController::class, 'index'])->name('Especialidad.index');
    Route::post('/destroy', [EspecialidadController::class, 'destroy'])->name('Especialidad.destroy');
    Route::post('/store', [EspecialidadController::class, 'store'])->name('Especialidad.store');
    Route::get('/show', [EspecialidadController::class, 'show'])->name('Especialidad.show');
});

/************************************ TipoReporte *****************/
Route::group(['prefix' => 'TipoReporte', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [TipoReporteController::class, 'list'])->name('TipoReporte.list');
    Route::get('/index', [TipoReporteController::class, 'index'])->name('TipoReporte.index');
    Route::post('/destroy', [TipoReporteController::class, 'destroy'])->name('TipoReporte.destroy');
    Route::post('/store', [TipoReporteController::class, 'store'])->name('TipoReporte.store');
    Route::get('/show', [TipoReporteController::class, 'show'])->name('TipoReporte.show');
    Route::post('/generate', [TipoReporteController::class, 'generate'])->name('TipoReporte.generate');
});

/************************************ Sexo *****************/
Route::group(['prefix' => 'Sexo', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [SexoController::class, 'list'])->name('Sexo.list');
    Route::get('/index', [SexoController::class, 'index'])->name('Sexo.index');
    Route::post('/destroy', [SexoController::class, 'destroy'])->name('Sexo.destroy');
    Route::post('/store', [SexoController::class, 'store'])->name('Sexo.store');
    Route::get('/show', [SexoController::class, 'show'])->name('Sexo.show');
});

/************************************ Grupo Sanguineo *****************/
Route::group(['prefix' => 'GrupoSanguineo', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [GrupoSanguineoController::class, 'list'])->name('GrupoSanguineo.list');
    Route::get('/index', [GrupoSanguineoController::class, 'index'])->name('GrupoSanguineo.index');
    Route::post('/destroy', [GrupoSanguineoController::class, 'destroy'])->name('GrupoSanguineo.destroy');
    Route::post('/store', [GrupoSanguineoController::class, 'store'])->name('GrupoSanguineo.store');
    Route::get('/show', [GrupoSanguineoController::class, 'show'])->name('GrupoSanguineo.show');
});

/************************************ Estado Civil *****************/
Route::group(['prefix' => 'EstadoCivil', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [EstadoCivilController::class, 'list'])->name('EstadoCivil.list');
    Route::get('/index', [EstadoCivilController::class, 'index'])->name('EstadoCivil.index');
    Route::post('/destroy', [EstadoCivilController::class, 'destroy'])->name('EstadoCivil.destroy');
    Route::post('/store', [EstadoCivilController::class, 'store'])->name('EstadoCivil.store');
    Route::get('/show', [EstadoCivilController::class, 'show'])->name('EstadoCivil.show');
});

/************************************ Arma *****************/
Route::group(['prefix' => 'Arma', 'middleware' => 'auth:api'], function () {
    Route::get('/list', [ArmaController::class, 'list'])->name('Arma.list');
    Route::get('/index', [ArmaController::class, 'index'])->name('Arma.index');
    Route::post('/destroy', [ArmaController::class, 'destroy'])->name('Arma.destroy');
    Route::post('/store', [ArmaController::class, 'store'])->name('Arma.store');
    Route::get('/show', [ArmaController::class, 'show'])->name('Arma.show');
});