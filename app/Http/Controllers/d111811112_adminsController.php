<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\d111811112_admins;
use Illuminate\Support\Facades\Validator;

class d111811112_adminsController extends Controller
{
    public function index()
    {
        $d111811112_admins = d111811112_admins::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data d111811112_admins',
            'data'    => $d111811112_admins 
        ], 200);
    }

    public function show($id)
    {
        $d111811112_admins = d111811112_admins::findOrfail($id);
        return response()->json([
         'success' => true,
         'message' => 'Detail Data d111811112_admins',
         'data'    => $d111811112_admins
        ], 200);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'   => 'required',
            'email' => 'required',
            'password'   => 'required',
        ]);
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //save to database
        $d111811112_admins = d111811112_admins::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => $request->password
                        
        ]);
        if($d111811112_admins) {
            return response()->json([
                'success' => true,
                'message' => 'd111811112_admins Created',
                'data' => $d111811112_admins
            ], 201);
        }  
    }
    public function update(Request $request, d111811112_admins $d111811112_admins)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'email' => 'required',
            'password'   => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $d111811112_admins = d111811112_admins::findOrFail($d111811112_admins->id);
        if($d111811112_admins) {
            $d111811112_admins->update([
                'name' => $request->name,
                'email'=> $request->email,
                'password' => $request->password
            ]);
            return response()->json([
                'success' => true,
                'message' => 'd111811112_admins Update',
                'data' => $d111811112_admins
            ], 200);
        }
    }
    public function destroy($id)
    {
        $d111811112_admins = d111811112_admins::findOrFail($id);

        if($d111811112_admins) {
            $d111811112_admins->delete();
            return response()->json([
                'success' => true,
                'success' => 'd111811112_admins Deleted',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'd111811112_admins Not Found',
        ], 404);
    }
}
