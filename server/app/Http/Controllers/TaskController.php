<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function addTask(Request $request){
        $task = new Task();
        $task->user_id = auth()->user()->id;
        $task->task_list_id = $request->task_list_id;
        $task->due_date = $request->due_date;
        $task->assigned_id = $request->assigned_id;
        $task->status = 'started';
        $task->save();
        Return response(['message' => 'Task successfully saved'], 200);
    }
    Public function updateTask(Task $task, Request $request) {
       $actions = [] ;
       if(isset($request->user_id)){
           $task->user_id = $request->user_id;
           $actions[] = 'updated user';
       }
       if(isset($request->task_list_id)){
           $task->task_list_id = $request->task_list_id;
           $actions[] = 'updated task list';
       }
       if(isset($request->due_date)){
           $task->due_date = $request->due_date;
           $actions[] = 'updated Due Date';
       }
       if(isset($request->assigned_id)){
           $task->assigned_id = $request->assigned_id;
           $actions[] = 'updated Assigned user';
       }
       if(isset($request->status)){
           $task->status = $request->status;
           $actions[] = 'updated user';
       }
       foreach($actions as $action){
           $record = new Record();
           $record->user_id = auth()->user()->id;
           $record->task_id = $task->id;
           $record->team_id = $request->team_id;
           $record
           }
       }
    }
}
