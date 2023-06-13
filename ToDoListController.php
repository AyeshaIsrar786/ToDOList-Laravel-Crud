<?php

namespace App\Http\Controllers;
use App\Models\ToDoListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ToDoListController extends Controller
{
    public function index(){
        $url = url('/lists');
        $title = "All Tasks";
        $arr = null;
        $btn = "Add";
        $list = ToDoListModel::all();
        $data = compact('url', 'list', 'title', 'btn' , 'arr');
        return view('ToDoList')->with($data);
    }

    public function store(Request $request){
        //FORM VALIDATION
        $request->validate( 
            [ 
                'workinghours'=>'required',
                'name'=>'required', 
                'description'=>'required' 
            ]);      
        //INSERT QUERY     
            $list = new ToDoListModel;
            $list->name=$request['name'];
            $list->workinghours=$request['workinghours'];
            $list->description=$request['description'];
            $list->save();
            return redirect('/lists/view');
    }

    public function view(){
        //fetch data from select query
        $url= url('/lists/view');
        $title = "All Tasks";
        $btn = "Add";
        $list = ToDoListModel::all();
        $data=compact('list', 'url', 'title', 'btn');
        return view('ToDoList')->with($data);
        }

    //Update Query
    public function edit($id){
        $url = url('/lists/update') .'/'. $id;
        $title = "Update Tasks";
        $btn = "Update";
        $list = ToDoListModel::all(); //select query
        // $list = $fetch_all->toArray();
        $fetch_id=ToDoListModel::find($id); //fetch id
        $arr=Arr::only($fetch_id->toArray(),['name','workinghours','description']); 
        $data = compact('url', 'list','title', 'arr', 'btn');
        return view('ToDoList')->with($data);
    }

    public function update(Request $req, $id = null){
        $list = ToDoListModel::find($id);
        if(!$list){
            return redirect('/lists/view')->with('error','Record not found');
        }
        else{
        $list->name = $req->name;
        $list->workinghours = $req->workinghours;
        $list->description = $req->description;
        $list->save();
        return redirect('/lists/view');
    }
    }


//         $updatedList = ToDoListModel::all();
//         $data = compact('updatedList');

//         return redirect('/lists/view')->with($data);

//     //Update Query
//     // public function edit($id){
//     //     $url = url('/lists/edit') ."/". $id;
//     //     $list=ToDoListModel::find($id);
//     //     $data = compact('url', 'list');
//     //     return view('ToDoList')->with($data);
//     // }

//     // public function update(Request $req, $id){
//     //     $list=ToDoListModel::find($req->id);
//     //     $list->name = $req->name;
//     //     $list->workinghours = $req->workinghours;
//     //     $list->description = $req->description;
//     //     $list->save();
//     //     return redirect('/lists/view');
//     // }

//     public function edit($id){
//         $fetch_id = ToDoListModel::find($id);
//         if(is_null($fetch_id)){
//             return redirect()->route('ToDoList');
//         }
//         else{
//             $arr=Arr::only($fetch_id->toArray(),['name','workinghours','description']); 
//             // dd($arr);
//             $list = ToDoListModel::all();
//             // dd($list)
//             $url = url('/lists/view') . '/'. $id;
//             $data = compact('arr', 'list', 'url');
//             return view('ToDoList')->with($data);
//     }
// }
//     public function update(Request $req){
//         $list = ToDoListModel::find($req->id);
//         $list->name = $req->name;
//         $list->workinghours = $req->workinghours;
//         $list->description = $req->description;
//         $list->save();
//         return rediect('lists/view');
//     }


//     //Delete Query
    public function delete($id){
        ToDoListModel::find($id)->delete();
        return redirect()->back();
    }
}
