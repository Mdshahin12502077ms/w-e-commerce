<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Auth;
use hash;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProductController extends Controller
{
    public function list(){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $data['product']=Product::with(['category'],['subcategory'])->orderBy('id','desc')->get();
                return view('Backend/admin/Product/list',$data);
            }
        }

    }

    public function create(){

        if(Auth::user()){
            if(Auth::user()->role==1){
                $data['category']=Category::orderBy('categories.name','asc')->get();
                $data['subcategory']=Subcategory::orderBy('subcategories.name','asc')->get();
                return view('Backend/admin/Product/create',$data);
            }
        }

    }

    public function store(Request $request){

        if(Auth::user()){

            if(Auth::user()->role==1){


                $product=new product();
                $product->name=trim($request->name);
                $product->slug=Str::Slug($request->name);
                $product->category_id=trim($request->category_id);
                $product->subcategory_id=Str::Slug($request->subcategory_id);
                $product->regular_price=trim($request->regular_price);
                $product->discount_price=Str::Slug($request->discount_price);
                $product->buy_price=trim($request->buy_price);
                $product->quantity=Str::Slug($request->quantity);

                if( $product->sku_code==$request->sku_code){
                    toastr()->warning('Yeah Admin ! This Product Already Exist');
                    return redirect()->back();
                }

                $product->sku_code=trim($request->sku_code);
                $product->product_type=Str::Slug($request->product_type);

                $product->short_description=trim($request->short_description);
                $product->long_desc=Str::Slug($request->long_description);
                $product->product_policy=trim($request->product_policy);


                if(isset($request->image)){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $path = 'Backend/images/product/';
                    $file->move($path, $filename);
                    $product->image = $path . $filename;

                }
                $product->save();

                if(isset($request->color_name)){
                    foreach($request->color_name as $name){
                        $color=new ProductColor();
                        $color->name=$name;
                        $color->product_id=$product->id;
                         $color->save();
                    }
                }

                if(isset($request->size_name)){
                    foreach($request->size_name as $name){
                        $size=new ProductSize();
                        $size->name=$name;
                        $size->product_id=$product->id;
                         $size->save();
                    }
                }

                if(isset($request->gelary_img)){

                    foreach($request->gelary_img as $image){
                        $g_image=new GalleryImage();
                            $g_image->product_id=$product->id;
                            $file=$image;
                            $filename = rand() . '.' . $image->getClientOriginalExtension();
                            $path = 'Backend/images/gallery_product/';
                            $file->move($path, $filename);
                            $g_image->g_image = $path . $filename;

                        $g_image->save();
                    }
                }
                toastr()->success('Yeah Admin ! product Added Successfully');
                return redirect('admin/Product/list');
            }
        }

    }
   public function edit($id){
    if(Auth::user()){
        if(Auth::user()->role==1){

            $data['category']=Category::orderBy('categories.name','asc')->get();
            $data['subcategory']=Subcategory::orderBy('subcategories.name','asc')->get();
            $data['product']=Product::where('id',$id)->with(['color'],['size'],['galleryImage'])->first();


            return view('Backend/admin/Product/edit',$data);
        }
    }

   }

   public function update(Request $request,$id){
    if(Auth::user()){
        if(Auth::user()->role==1){
            $product=Product::find($id);
                $product->name=trim($request->name);
                $product->slug=Str::Slug($request->name);
                $product->category_id=trim($request->category_id);
                $product->subcategory_id=Str::Slug($request->subcategory_id);
                $product->regular_price=trim($request->regular_price);
                $product->discount_price=Str::Slug($request->discount_price);
                $product->buy_price=trim($request->buy_price);
                $product->quantity=Str::Slug($request->quantity);


                $product->product_type=Str::Slug($request->product_type);

                $product->short_description=trim($request->short_description);
                $product->long_desc=Str::Slug($request->long_description);
                $product->product_policy=trim($request->product_policy);


                if(isset($request->image)){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $path = 'Backend/images/product/';
                    $file->move($path, $filename);
                    $product->image = $path . $filename;

                }
                $product->save();

                if(isset($request->color_name)){
                    $get_p_color=ProductColor::where('product_id',$id)->get();

                    foreach($get_p_color as $pr_color){

                        $pr_color->delete();
                    }
                    foreach($request->color_name as $name){
                        $color=new ProductColor();
                        if($name!=null){
                            $color->name=$name;
                            $color->product_id=$product->id;
                             $color->save();
                        }

                    }
                }

                if(isset($request->size_name)){
                    $get_p_size=ProductSize::where('product_id',$id)->get();

                    foreach($get_p_size as $pr_size){

                        $pr_size->delete();
                    }
                    foreach($request->size_name as $name){
                        $size=new ProductSize();
                        if($name!=null){
                            $size->name=$name;
                        $size->product_id=$product->id;
                         $size->save();
                        }

                    }
                }

                if(isset($request->gelary_img)){
                          $g_P_img=GalleryImage::where('product_id',$id)->get();
                          foreach($g_P_img as $p_img){
                            if($p_img->g_image && file_exists($p_img->g_image)){
                                unlink($p_img->g_image);
                              }
                              $p_img->delete();
                          }
                    foreach($request->gelary_img as $image){
                        $g_image=new GalleryImage();
                            $g_image->product_id=$product->id;
                            $file=$image;
                            $filename = rand() . '.' . $image->getClientOriginalExtension();
                            $path = 'Backend/images/gallery_product/';
                            $file->move($path, $filename);
                            $g_image->g_image = $path . $filename;

                        $g_image->save();
                    }
                }
                toastr()->success('Yeah Admin ! product updated Successfully');
                return redirect()->back();
        }
    }
    else{
        abort(404);
    }
   }
public function Delete($id){
    if(Auth::user()){
        if(Auth::user()->role==1){
           $product=Product::find($id);
           $product->delete();
           if(isset($request->gelary_img)){
            $g_P_img=GalleryImage::where('product_id',$id)->get();
            foreach($g_P_img as $p_img){
              if($p_img->g_image && file_exists($p_img->g_image)){
                  unlink($p_img->g_image);
                }
                $p_img->delete();
            }
        }

            $get_p_color=ProductColor::where('product_id',$id)->get();

            foreach($get_p_color as $pr_color){

                $pr_color->delete();
            }

            $get_p_size=ProductSize::where('product_id',$id)->get();

            foreach($get_p_size as $pr_size){

                $pr_size->delete();
            }



            toastr()->success('Yeah Admin ! product Deleted Successfully');
            return redirect('admin/Product/list');

        }
    }
    else{
        abort(404);
    }
}
}

