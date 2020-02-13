<?php

namespace App\Http\Controllers\User;

use App\Album;
use App\Http\Controllers\Controller;
use App\Image;
use App\Modelform;
use App\User;
use App\User\Transaction;
use App\User\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Ima;
use File;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function modelform(){
        if(Auth::user()){
        $wallet = Wallet::where('user_id',Auth::user()->id)->first();
        return view('user.modelform', compact('wallet'));
        }
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
        $formfee = 500;
        $form = Modelform::where('user_id', $id)->first();
        if(empty($form)){
            $data = $this->validate($request,[
                'name' => 'required|',
                'address'=> 'required'
            ]);

            if(Auth::user()->wallet->balance >= $formfee){

                $data['user_id'] = $id;
                Modelform::create($data);
                $wallet = Wallet::where('user_id',$id)->first();
                        $wallet->balance = ($wallet->balance - $formfee);
                        $wallet->save();
                    Transaction::create([
                        'user_id' => $id,
                        'amount' => $formfee,
                        'type' => 'sent',
                        'note' => "Model registration form fee",
                    ]);

                return response()->json('success');
            }
            else{
                    return response()->json([
                        'message' => 'not enough balance',
                        'errors' => [
                            'amont' => 'Not enough Balance <br> Please add fund',
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
    public function get_wallet(){
        $wallet = Wallet::where('user_id',Auth::user()->id)->first();
        $tranx = Transaction::where('user_id',Auth::user()->id)->latest()->paginate(8);
        return view('user.wallet', compact('wallet','tranx'));

    }
    public function khalti(Request $request){
        if(!Auth::user()){
            return response()->json([
                'message' => 'not Logged in',
                'errors' => [
                    'Login' => 'You must Login first',
                ],
            ], 422);
        }
        $this->validate($request,[
            'token' => 'required',
            'amount'=> 'required',
        ]);
        $args = http_build_query(array(
            'token' => $request->token,
            'amount'  => $request->amount,
        ));
        $url = "https://khalti.com/api/v2/payment/verify/";
        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key test_secret_key_90af8ac105f345abaf47fca9defc30eb'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        // Response
        $response = curl_exec($ch);
        $dump = array(
        "curl" => curl_getinfo($ch),
        "khalti" => $response
        );

        //$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $payment_log_data = array();
        $responseArray = (array)json_decode($response);
        if(array_key_exists('idx', $responseArray)){
            $amt = ($request->amount/100);
            $id = Auth::id();
            $wallet = Wallet::where('user_id',$id)->first();
                    $wallet->balance = ($wallet->balance + $amt);
                    $wallet->save();
            Transaction::create([
                        'user_id' => $id,
                        'amount' => $amt,
                        'type' => 'received',
                        'note' => "Deposit using Khalti",
                    ]);
            return response()->json('success');
        }
        else{
            return response()->json([
                'message' => 'invalid',
                'errors' => [
                    'inval' => 'Your transaction is invalid',
                ],
            ], 422);
        }
    }

    public function profile(){
        $user = Auth::user();
        return view('user.info',compact('user'));
    }
    public function update(){
      
        if(Auth::user()){
            $user = Auth::user();
            return view('user.update', compact('user'));
        }
        else{
            return "not auth";
        }
       
    }
    public function store(request $request) {

        $this->validate($request, [
            'images' => 'required',
            ]);
            $album = Album::where('user_id',Auth::id())->value('id');
            if ($files = $request->file('images')){
                foreach ($files as $file){
                    $gallery = new Image;
                    $image_name = str::random(5).time().$file->getClientOriginalName();
                    $img = Ima::make($file)
                    ->encode('jpg', 75)
                    ->save(public_path('images/'.$image_name));
                    $gallery['image'] = $image_name;
                    $gallery['album_id'] = $album;
                    $gallery->save();
                }
            }
    
    
        return back()->with('success', 'Data Your files has been successfully added');
    }

    public function photos(){
        $user = Auth::user();
        $images = Image::where('album_id',$user->album->id)->get();
        return view('user.photos', compact('images','user'));
    }

    public function album(Request $request)

    {
        $this->validate($request, [
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $album = Album::where('user_id',Auth::id())->first();
    $this->authorize('update', $album);
    if($file = $request->file('image')){
            $fileNameToStored = str::random(4).time().'.'.$file->getClientOriginalName();;
            //resize the images
            $img = Ima::make($file)
                ->resize(1000,1000)
                ->save(public_path('albums/'.$fileNameToStored));
                $oldImage = public_path("albums/{$album->cover_image}");
                if (is_file($oldImage)) { // unlink or remove previous image from folder
                    unlink($oldImage);
                }
                $album->name = $request->title;
                $album->cover_image = $fileNameToStored;
                $album->save();
                return back()->with('success', 'Data Your image has been successfully added');
        }
    }
    public function deleteImg(Image $id){
        $album = Image::where('id', $id->id)->first();
        $user = Album::find($album->album_id);
        $this->authorize('destroy', $user);
        $oldImage = public_path("images/{$id->image}");
                if (is_file($oldImage)) { // unlink or remove previous image from folder
                    unlink($oldImage);
                }
        $id->delete();
        
        return back()->with('success', 'Data Your image has been successfully added');
        
        
    }


}
