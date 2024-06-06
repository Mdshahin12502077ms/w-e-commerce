<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeBaner;
use App\Models\privacyPolicy;
use App\Models\setting;
use App\Models\termsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\fileExists;

class SettingController extends Controller
{
    public function GeneralSettings(){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $setting=setting::first();
                return view('Backend.admin.settings.GeneralSetting',compact('setting'));
            }
        }
    }


    public function Update(Request $request){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $setting=setting::first();
                $setting->address=$request->address;
                $setting->phone=$request->phone;
                $setting->email=$request->email;
                $setting->facebook=$request->facebook;
                $setting->youtube=$request->youtube;
                $setting->twitter=$request->twitter;
                $setting->instragram=$request->instragram;
                $setting->address=$request->address;

                if(isset($request->logo)){
                    if($setting->logo && file_exists($setting->logo)){
                        unlink($setting->image);
                       }
                }
                if(isset($request->logo)){
                    $file = $request->file('logo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $path = 'Backend/images/setting/';
                    $file->move($path, $filename);
                    $setting->logo = $path.$filename;

                }
                $setting->save();
                toastr()->success('update successfully');
                return redirect()->back();
            }
        }
    }



    public function privacy_policy(){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $privacy=privacyPolicy::first();
                return view('Backend.admin.settings.privacy_policy',compact('privacy'));
            }
        }
    }


public function privacy_policy_update(Request $request){
    if(Auth::user()){
        if(Auth::user()->role==1){
            $privacy_update=privacyPolicy::first();
            $privacy_update->privacy_desc=$request->privacy_desc;
         
            $privacy_update->save();
            toastr()->success('update successfully');
            return redirect()->back();

        }
    }
}


    public function terms_condition(){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $terms=termsCondition::first();
                return view('Backend.admin.settings.terms_condition',compact('terms'));
            }
        }
    }


    public function terms_condition_update(Request $request){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $terms=termsCondition::first();
                $terms->terms_desc=$request->terms_desc;
                $terms->save();
                toastr()->success('update successfully');
                return redirect()->back();

            }
        }
    }


    public function home_baner(){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $baner=HomeBaner::first();
                return view('Backend.admin.settings.home_baner',compact('baner'));
            }
        }
    }

    public function home_baner_update(Request $request){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $baner=HomeBaner::first();
                if(isset($request->Baner_image)){
                    if($baner->Baner_image && fileExists($baner->Baner_image)){
                        unlink($baner->Baner_image);
                    }
                }
           if(isset($request->Baner_image)){
            $file=$request->file('Baner_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
             $path = 'Backend/images/setting_baner/';
            $file->move($path, $filename);
            $baner->Baner_image = $path.$filename;

           }

           $baner->save();
                  toastr()->success('update successfully');
                  return redirect()->back();
            }
        }
    }


}
