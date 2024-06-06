<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class homeController extends Controller
{
    public function index(){
        $data['categories']=Category::orderBy('id','desc')->get();
        $data['hotProducts']=Product::where('product_type','hot')->get();
        $data['newArrival']=Product::where('product_type','new')->get();
        $data['regularProducts']=Product::where('product_type','regular')->get();
        $data['discountProducts']=Product::where('product_type','discount')->get();
        return view('home.index',$data);
    }

    public function ProductDetails($slug){

        $data['product']=Product::where('slug',$slug)->with(['color'],['size'],['galleryImage'])->first();
        return view('home.productDetails',$data);
    }
// checout founction start
    public function checkout(){

        return view('home.checkout');

    }

    public function cartView(){
        return view('home.CartView');
    }
    //shop page view
    public function shop( Request $request){
        if(isset($request->category_id)){
            $type='category';
           $Category=Category::where('id',$request->category_id)->with(['product'])->first();
           return view('home.shop',compact('Category'),compact('type'));
        }
        if(isset($request->subCategory_id)){

            $type='subCategory';
            $subCategoryProduct=Subcategory::where('id',$request->subCategory_id)->with(['product'])->first();

            return view('home.shop',compact('subCategoryProduct'),compact('type'));
        }
        $type='normal';
         $shop_product=Product::orderBy('id','desc')->get();
        return view('home.shop',compact('shop_product'),compact('type'));
    }
    //return process
    public function returnProcess(){
        return view('home.return_process');
    }
    public function productSearch(Request $request){
      
        if($request->search){
            $searchProduct=Product::where('name','Like','%'.$request->search.'%')->get();
        }
      return view('home.search_product',compact('searchProduct'));
    }
}
