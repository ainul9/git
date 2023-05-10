<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/list_task/{usersID}', [App\Http\Controllers\backend\TaskController::class,'TaskList'])->name('backend.task.list_task');
Route::get('/add_task/{usersID}',[App\Http\Controllers\backend\TaskController::class,'TaskAdd'])->name('backend.task.create_task');
Route::post('/insert_task/{usersID}', [App\Http\Controllers\backend\TaskController::class,'TaskInsert']);
Route::get('/edit_task/{id}', [App\Http\Controllers\backend\TaskController::class,'TaskEdit']);
Route::post('/update_task/{id}', [App\Http\Controllers\backend\TaskController::class,'TaskUpdate']);
Route::get('/delete_task/{id}', [App\Http\Controllers\backend\TaskController::class,'TaskDelete']);

// Route::get('/list_task/{usersID}', [App\Http\Controllers\backend\TaskController::class,'AgentViewList'])->name('backend.task.list_task');

Route::get('user_list', [App\Http\Controllers\backend\UsermanagementController::class,'UserList'])->name('user.index');
Route::get('/edit_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserEdit']);
Route::post('/update_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserUpdate']);
Route::get('/delete_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserDelete']);

Route::get('register_agent', 'App\Http\Controllers\backend\AgentController@registerAgent')->name('register_agent');
Route::post('register_insert', 'App\Http\Controllers\backend\AgentController@registerInsert')->name('register_insert');
Route::get('list_agent', [App\Http\Controllers\backend\AgentController::class,'AgentList'])->name('backend.agent.list_agent');
Route::get('/add_agent/{usersID}/{agentName}',[App\Http\Controllers\backend\AgentController::class,'AgentAdd'])->name('backend.agent.create_agent');
Route::post('/insert_agent/{usersID}', [App\Http\Controllers\backend\AgentController::class,'AgentInsert']);
Route::get('/show_details/{usersID}', [App\Http\Controllers\backend\AgentController::class,'AgentShow'])->name('backend.agent.show_details');
// Route::get('/edit_agent/{usersID}', [App\Http\Controllers\backend\AgentController::class,'AgentEdit']);
Route::get('/edit_agent/{usersID}', [App\Http\Controllers\backend\AgentController::class,'AgentEdit']);
Route::POST('/update_agent/{usersID}', [App\Http\Controllers\backend\AgentController::class,'AgentUpdate']);
Route::get('delete_agent/{id}', [App\Http\Controllers\backend\AgentController::class,'AgentDelete']);
Route::get('delete_details/{usersID}', [App\Http\Controllers\backend\AgentController::class,'DeleteDetails']);






// public function AgentInsert(Request $request, $usersID)
// {
//     $user = User::find($usersID);
//     $data = [
//         'usersID' => $user->id,
//         'agentName' => $user->name,
//         'agentCat' => $request->agentCat,
//         'registrationNum' => $request->registrationNum,
//         'contact' => $request->contact,
//         'address' => $request->address,
//         'city' => $request->city,
//         'postcode' => $request->postcode,
//         'state' => $request->state,
//         'country' => $request->country,
//         'remarks' => $request->remarks,
//     ];
//     $insert = DB::table('agent')->insert($data);
    
//     if ($insert) {
//         return redirect()->route('backend.agent.show_details', ['usersID' => $usersID])->with('success', 'Agent details added successfully!');
//         // return redirect()->route('backend.agent.show_details')->with('success', 'Agent details added successfully!');
//     } else {
//         $notification = [
//             'messege' => 'Error creating agent',
//             'alert-type' => 'error'
//         ];
//         return redirect()->route('backend.agent.show_details')->with($notification);
//     }
// }
