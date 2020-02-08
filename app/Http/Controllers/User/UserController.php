<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Modelform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function modelform(){
        return view('user.modelform');
    }
    public function formStore(Request $request){
        if(!Auth::user()){
            return response()->json([
                'message' => 'not Logged in',
                'errors' => [
                    'Login' => 'You must Login first',
                ],
            ], 422);
        }
        $id = Auth::user()->id;
        $form = Modelform::where('user_id', $id)->first();
        if(empty($form)){
            $data = $this->validate($request,[
                'name' => 'required|',
                'address'=> 'required'
            ]);

            if(Auth::user()->wallet->balance >= 500){
                
                $data['user_id'] = Auth::user()->id;
                Modelform::create($data);
                return response()->json('success');
            }
            else{
                    return response()->json([
                        'message' => 'not enough balance',
                        'errors' => [
                            'amont' => 'not enough',
                        ],
                    ], 422);
            }
           
        }
        else{
            return response()->json([
                'message' => 'Applied',
                'errors' => [
                    'Login' => 'You have already applied this form',
                ],
            ], 422);
    }
       
    }
}
