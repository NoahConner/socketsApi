<?php

namespace App\Http\Controllers;

use App\Models\Chatuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class dummyapi extends Controller
{
    //
    public function dummydata(){
        $users = Chatuser::all();
        return $users;
    }
    public function editdata(Request $req){

        $idee = $req->email;
        $user = Chatuser::where('email',$idee)->first();
        $user->status = $req->status;
        $user->save();
    }

    public function create(Request $req){

        $user = new Chatuser;
        $user->name = $req->name;
        $user->status = 'pending';
        $user->email = $req->email;
        $user->image = '';
        $user->msgsCount = 0;
        $user->active_status = 'disconnect';
        // $user->password = Hash::make($req->password);
        $user->password = $req->password;
        $user->save();
        return response()->json(['success' => 'authorized','status' => '200'], 200);
    }

    public function login(Request $req){
        $idee = $req->email;
        $user = Chatuser::where('email',$idee)->first();
        if($req->email == $user->email && $req->password == $user->password){
            return response()->json(['user'=>$user,'success' => 'authorized','status' => '200'], 200);
        }else{
            return response()->json(['error' => 'Unauthorized','status' => '401'], 401);
        }
    }
}
