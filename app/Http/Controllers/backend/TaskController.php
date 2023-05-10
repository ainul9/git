<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Agent;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
        	
    // public function TaskList(Request $request, $usersID)
    // {
    //     $list = []; 
    //     $user = auth()->user();
    //     if ($user->role == 3){
    //         $list = DB::table('createtask')->where('usersID', $usersID)->get();
    //         $updatedBy = DB::table('users')->where('name', $name)->get();
    //         return view('backend.task.list_task', compact('list','updated'));
    //     }
    //     else{
    //         $list = DB::table('createtask')->where('usersID', $usersID)->get();
    //         $agent = Agent::where('usersID', $usersID)->first();
    //         $usersID = $agent->usersID;
    //         $user = User::where('id', $usersID)->first();
    //         return view('backend.task.list_task', compact('list', 'user', 'agent'));
    //     }

    // }

    public function TaskList(Request $request, $usersID)
{
    $list = []; 
    $user = auth()->user();
    if ($user->role == 3) {
        $list = DB::table('createtask')
            ->leftJoin('users', 'createtask.updatedBy', '=', 'users.name')
            ->where('usersID', $usersID)
            ->get(['createtask.*', 'users.name as updatedBy']);
        return view('backend.task.list_task', compact('list'));
    } else {
        $list = DB::table('createtask')->where('usersID', $usersID)->get();
        $agent = Agent::where('usersID', $usersID)->first();
        $usersID = $agent->usersID;
        $user = User::where('id', $usersID)->first();
        return view('backend.task.list_task', compact('list', 'user', 'agent'));
    }
}


    public function TaskAdd($usersID)
    {

        $list = DB::table('createtask')->where('usersID', $usersID)->get();
        $user = User::where('id', $usersID)->first();
        // $agent = DB::table('agent')->where('id', $usersID)->get();
        // $agent = Agent::find($usersID);
        // return view('backend.task.create_task', compact('agent','list'));
            return view('backend.task.create_task', compact('user','list'));
    }


public function TaskInsert(Request $request, $usersID)
{
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
        return redirect()->route('backend.task.list_task', ['usersID' => $usersID])->with('success','Task list created successfully!');
    } else {
        $notification=array(
            'messege'=>'error ',
            'alert-type'=>'error'
        );
        return redirect()->route('backend.task.list_task')->with($notification);
    }
}


      public function TaskEdit ($id)
    {
        $edit=DB::table('createtask')
             ->where('id',$id)
             ->first();
            //  $services = DB::table('createtask')->distinct()->pluck('service');
            //  $statuses = DB::table('createtask')->distinct()->pluck('status');
        return view('backend.task.edit_task', compact('edit'));     
    }

    
    public function TaskUpdate(Request $request, $id)
    {
        $task = DB::table('createtask')->where('id', $id)->first();
        $usersID = $task->usersID;
    
        // Retrieve the name of the currently logged-in user
        $updatedBy = auth()->user()->name;
    
        $data = array(
            'agentName' => $request->agentName,
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
            'updatedBy' => $updatedBy, // add the updatedBy column and value here
        ); 
    
        $update = DB::table('createtask')->where('id', $id)->update($data);
    
        if ($update) {
            return redirect()->route('backend.task.list_task', ['usersID' => $usersID])->with('success', 'Task updated successfully!');
        } else {
            $notification = array(
                'messege' => 'error ',
                'alert-type' => 'error'
            );
            return redirect()->route('backend.task.list_task', ['usersID' => $usersID])->with($notification);
        }
    }
    


    public function UpdatedTask(Request $request,$id)
    {
        $list = DB::table('createtask')->where('id', $id)->get();
        return view('backend.task.updated_task', compact('list'));
        
    }

public function TaskDelete ($id)
    {
    
        $delete = DB::table('createtask')->where('id', $id)->delete();
        if ($delete)
                            {
                            return Redirect()->back()->with('success', 'The selected task has been successfully deleted.');                      
                            }
             else{
                  return Redirect()->back()->with('error', 'There was an error while deleting the selected task.');

                  }

    }

}