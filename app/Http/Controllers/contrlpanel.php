<?php

namespace App\Http\Controllers;

use App\tasks;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class contrlpanel extends Controller
{
public function update(Request $request) {
    $task =tasks::findorfail($request->id);
$task->fill($request->all());
$task->update();
}
    public function reset(){
tasks::all();
tasks::where('status',true)
    ->update(['status'=>false]);
        return redirect()->back();
    }
    public function status($id){

        tasks::all();
            tasks::where('id',$id)
            ->update(['status'=>true]);
        return redirect()->back();



    }
    public function status2($id){
        $status='';

        tasks::all();
            tasks::where('id',$id)
            ->update(['status'=>false]);
        return redirect()->back();




    }
 public function store(Request $request){






     $obj1= new tasks();
     $obj1 -> name = \request('name');
     $obj1 -> content = \request('content');
     $obj1 ->showtime=\request('showtime');
     $obj1 ->src=\request('src');
     $obj1->save();
return redirect()->back()->with('success','تم إضافة المهمة بنجاح');

 }
public function showtask(){
     $tarama = tasks::all();
     return view('Controlpanel',compact('tarama'));
}
public function delete($id){
     try{
         $delete=tasks::findOrFail($id);
         $delete->delete();
 return redirect()->back()->with('success','تم حذف المهمة بنجاح');
     }
     catch (ModelNotFoundException $exception){

     }
}
}
