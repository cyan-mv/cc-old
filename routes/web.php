<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    return view('welcome');

    $admin_permissions = Permission::all();
    $agent_permissions = Permission::where('name', 'like', 'permission_%')->get();

    Role::findOrFail(1)->permissions()->sync($admin_permissions);
    Role::findOrFail(2)->permissions()->sync($agent_permissions);
    dd(User::find(2)->hasPermissionTo('permission_access'));

});
