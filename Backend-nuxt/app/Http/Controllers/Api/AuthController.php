<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    //GET ALL USER
    public function index()
    {
        $user = User::all();
        if($user->count() >0){
        return response()->json([
            'status' => 200,
            'user' => $user
        ], 200);
    }else{
        return response()->json([
            'status' => 400,
            'message' => 'Not Record Found'
        ], 400);
      }
    }
    //GET BY ID
    public function show($id){
        $user = User::find($id);
            if($user){
                return response()->json([
                    'status' => 200,
                    'message' => $user
                ],200);
            }else{
                return response()->json([
                    'status' =>404,
                    'message' => "No sunch user found!"
                ],404);
            }
    }
        //REGISTER
        public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ada kesalahan',
                    'data' => $validator->errors()
                ], 422);
            }
        
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
        
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/gambar', $filename);
        
                $input['gambar'] = $filename;
            }
        
            $user = User::create($input);
        
            $success['token'] = $user->createToken('auth_token')->plainTextToken;
            $success['name'] = $user->name;

            $user->gambar = $filename;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran Akun berhasil',
                'data' => $success
            ]);
        }
          
    //UPDATE
    public function update(Request $request, int $id)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:191',
                'email'  => 'required|string|max:191',
                'password'  => 'required|string|max:20',
                'confirm_password'  => 'required|string|max:20',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()){
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            } else {
                $user = User::find($id);

                if($user){
                    $updateData = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'confirm_password' => bcrypt($request->confirm_password), 
                    ];

                    if ($request->hasFile('gambar')) {
                        Log::info('File Gambar Detected:', ['file' => $request->file('gambar')]);
                    
                        $file = $request->file('gambar');
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $path = $file->storeAs('public/gambar', $filename);
                    
                        Log::info('File Stored At:', ['path' => $path]);
                    
                        $user->gambar = $filename;
                        $user->save();
                    
                        return response()->json([
                            'status' => 200,
                            'message' => 'User update successfully',
                            'user' => $user
                        ]);
                    } else {
                        Log::info('No File Uploaded');
                    }
                }  
            }
        }
        //LOGIN
        
            public function login(Request $request)
            {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    $auth = Auth::user();
                    $success['token'] = $auth->createToken('auth_token')->plainTextToken;
                    $success['name'] = $auth->name;
                    $success['email'] = $auth->email;

                    return response()->json([
                        'success' => true,
                        'message' => 'Login berhasil',
                        'data' => $success
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Login gagal',
                        'data' => null
                    ]);
                }
            }

    
            public function search(Request $request)
            {
                $query = $request->input('query');
                $user = User::where('name', 'LIKE', "%{$query}%")
                             ->orWhere('email', 'LIKE', "%{$query}%")
                             ->get();
            
                return response()->json(['users' => $user]);
            }
            
    public function delete($id){
        {
            $user = User::find($id);
            if($user){
                $user->delete();
                return response()->json([
                    'status' => 200,
                    'message' => "Delete Employee Succesfully!"
                ],200); 
            }else{
             return response()->json([
                 'status' => 404,
                 'message' => "No Such Employee Found!"
             ],404); 
            }
        }
    }


}




