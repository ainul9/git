<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Agent;
use App\Models\User;

class APIController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function AgentList2(Request $request)
{
    $list = DB::table('users')
        ->where('role', '=', 3)
        ->get();

    return response()->json($list, 200);
    // $list = DB::table('agent')->get();
    // return view('backend.agent.list_agent',compact('list'));
}

public function TaskInsert2(Request $request, $usersID)
{
    // return response()->json($request, 200); way to debug easily

    $user = User::find($usersID); // Retrieve the Agent object
    $data = [
        'usersID' => $user->id,
        'agentName' => $user->name, // Use the id property of the Agent object
        'productID' => $request->productID,
        'ProductName' => $request->ProductName, 
        'quantity' => $request->quantity,
        'service' => $request->service,
        'pickupAdd' => $request->pickupAdd, 
        'pickupDate' => $request->pickupDate, 
        'deliveryAdd' => $request->deliveryAdd,
        'deliveryDate' => $request->deliveryDate, 
        'remarks' => $request->remarks,  
        'status' => $request->status,  
          
    ];
        $insert = DB::table('createtask')->insert($data);
       
    if ($insert) {
        return response()->json(['data'=>$insert, 'msg'=>'Task list created successfully'], 200);
    } else {
        $notification=array(
            'messege'=>'error ',
            'alert-type'=>'error'
        );
        return response()->json(['data'=>$insert, 'msg'=>'Task list created failed'], 500);
    }
}

public function TaskList2(Request $request, $usersID)
{
    $list = []; 
    $user = auth()->user();
    // if ($user->role == 3) {
    //     $list = DB::table('createtask')
    //         ->leftJoin('users', 'createtask.updatedBy', '=', 'users.name')
    //         ->where('usersID', $usersID)
    //         ->get(['createtask.*', 'users.name as updatedBy']);
    //     return response()->json($list, 200);
    //     // return view('backend.task.list_task', compact('list'));
    // } else {
        $list = DB::table('createtask')->where('usersID', $usersID)->get();
        $agent = Agent::where('usersID', $usersID)->first();
        $usersID = $agent->usersID;
        $user = User::where('id', $usersID)->first();
        // return response()->json($list, 200);
        return response()->json([
            'list' => $list,
            'agent' => $agent,
            'user' => $user,
            // add as many variables as you need
        ], 200);
        // return view('backend.task.list_task', compact('list', 'user', 'agent'));
    }
}
  



