<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class SubcategoryController extends Controller
{
   public function list(){
    if(Auth::user()){
        if(Auth::user()->role==1){
            $data['subcategory']=Subcategory::with(['Category'])->get();

            return view('Backend/admin/SubCategory/list',$data);
        }
    }
    else{
        abort(404);
    }
   }

public function create(){
    if(Auth::user()){
        if(Auth::user()->role==1){
            $data['category']=Category::get();
            return view('Backend/admin/SubCategory/create',$data);
        }
    }
    else{
        abort(404);
    }
}

public function Store(Request $request){

    if(Auth::user()){
        if(Auth::user()->role==1){
            $this->validate($request,[
                'name'=>'required',
               ]);
               $subCategory= new Subcategory();
               $subCategory->category_id=$request->category_id;
               $subCategory->name=$request->name;
               $subCategory->slug=Str::Slug($request->name);
               $subCategory->save();
               toastr()->success('Hi Admin, Sub Category Added Successfully');
               return redirect('admin/subCategory/list');
        }
    }
    else{
        abort(404);
    }
}

public function delete($id){
    if(Auth::user()){
        if(Auth::user()->role==1){
          $subcategory=Subcategory::find($id);
          $subcategory->delete();
          toastr()->warning('Hi Admin, Sub Category Deleted Successfully');
          return redirect('admin/subCategory/list');
        }
    }
    else{
        abort(404);
    }
}
public function edit($id){
   if(Auth::user()){
    if(Auth::user()->role==1){
        $data['category']=Category::get();
        $data['subCategory']=Subcategory::find($id);
        return view('Backend/admin/subCategory/edit',$data);
    }
   }
   else{
    abort(404);
   }
}
public function update(Request $request,$id){

    if(Auth::user()){
        if(Auth::user()->role==1){
            $this->validate($request,[
                'name'=>'required',
               ]);
               $subCategory=Subcategory::find($id);
               $subCategory->category_id=$request->category_id;
               $subCategory->name=$request->name;
               $subCategory->slug=Str::Slug($request->name);
               $subCategory->save();
               toastr()->success('Hi Admin, Sub Category Added Successfully');
               return redirect('admin/subCategory/list');
        }
    }
    else{
        abort(404);
    }
}

}
