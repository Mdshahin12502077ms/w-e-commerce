<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Auth;
use Hash;
class CategoryController extends Controller
{
    public function create(){
        if(Auth::user()){
            if(Auth::user()->role==1){
                return view('Backend.admin.Category.Create');
            }
        }
    }

    public function Store(Request $request){

        if(Auth::user()){
            if(Auth::user()->role==1){
                $this->validate($request,[
                 'name'=>'required',
                 'image'=>'required',
                ]);

                $category=new Category();
                $category->name=trim($request->name);
                $category->slug=Str::Slug($request->name);

                if(isset($request->image)){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $path = 'Backend/images/category/';
                    $file->move($path, $filename);
                    $category->image = $path . $filename;

                }
                $category->save();
                toastr()->success('Yeah Admin ! Category Added Successfully');
                return redirect('admin/category/list')->with('success','Category is Added Successfully');
            }
        }
        else{
            abort(404);
        }
    }

    public function list(){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $data['category']=Category::get();
                return view('Backend/admin/Category/list',$data);
            }
        }

    }
    public function Delete($id){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $category=Category::getCategoryId($id);
                 if($category->image && file_exists($category->image)){
                   unlink($category->image);
                 }
                 $category->delete();
                return redirect('admin/category/list')->with('error','Category is Added Successfully');
            }
        }
    }

    public function edit($id){

        if(Auth::user()){
            if(Auth::user()->role==1){
                $data['category']=Category::getCategoryId($id);
                return view('Backend/admin/Category/edit',$data);
            }
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $category=Category::getCategoryId($id);
                $category->name=$request->name;
                $category->slug=Str::Slug($request->name);
                if(isset($request->image)){
                    if($category->image && file_exists($category->image)){
                        unlink($category->image);
                       }
                }
                if(isset($request->image)){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $path = 'Backend/images/category/';
                    $file->move($path, $filename);
                    $category->image = $path.$filename;

                }
                $category->save();
                toastr()->success('Yeah Admin ! Category Update Successfully');
                return redirect('admin/category/list');
            }
        }

        else{
            abort(404);
        }
    }

    public function category_product($slug){
        $category_product=Category::where('slug',$slug)->with(['product'])->first();

        return view('home.CategoryProduct',compact('category_product'));
    }
}
