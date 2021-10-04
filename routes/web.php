<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace' => 'Painel', 'middleware' => ['auth'], 'prefix' => 'painel', 'as' => 'painel.'], function () {

    Route::get('/', 'DashboardController@index');

    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard.index');

    Route::get('/leads/contatos', 'ContactController@index')
        ->name('leads.contacts.index');

    Route::get('/leads/compromissos', 'AppointmentController@index')
        ->name('leads.appointments.index');

    Route::post('leads/{id}/transform-customer', 'AppointmentController@transformCustomer')
        ->name('leads.appointments.transformCustomer');

    Route::resource('clientes', 'CustomerController')
        ->except(['create'])
        ->names('customers');

    Route::resource('leads', 'LeadController')
        ->except(['create']);

    Route::resource('contatos', 'ContactController')
        ->except(['create', 'show'])
        ->names('contacts');

    Route::resource('filiais', 'BranchController')
        ->except(['create'])
        ->names('branches');

    Route::resource('usuarios', 'UserController')
        ->parameter('usuarios', 'user')
        ->except(['create'])
        ->names('users');

    Route::resource('origens', 'SourceController')
        ->except(['create'])
        ->names('sources');

    Route::resource('status', 'StatusController')
        ->except(['create']);
});

Auth::routes(['register' => false]);
