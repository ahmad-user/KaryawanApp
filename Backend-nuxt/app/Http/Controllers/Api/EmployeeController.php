<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        if($employee->count() > 0 ){

        return response()->json([
            'status' => 200,
            'employee' => $employee
        ], 200);
    }else{
        return response()->json([
            'status' => 400,
            'message' => 'Not Record Found'
        ], 400);
      }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|max:14',
            'name'  => 'required|string|max:191',
            'placeofbirth'  => 'required|string|max:191',
            'address'  => 'required|string|max:191',
            'dateofbirth'  => 'required|max:191',
            'gender'  => 'required|string|max:191',
            'gol'  => 'required|string|max:191',
            'eselon' => 'required|string|max:191',
            'position' => 'required|string|max:191',
            'placeoftask' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'workunit' => 'required|max:191',
            'nohp' => 'required|max:15',
            'npwp' => 'required|max:15',
        ]);
    
        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $employee = Employee::create([
                'nip' => $request->nip,
                'name'  => $request->name,
                'placeofbirth'  => $request->placeofbirth,
                'address'  => $request->address,
                'dateofbirth'  => $request->dateofbirth,
                'gender'  => $request->gender,
                'gol'  => $request->gol,
                'eselon' => $request->eselon,
                'position' => $request->position,
                'placeoftask' => $request->placeoftask,
                'religion' => $request->religion,
                'workunit' => $request->workunit,
                'nohp' => $request->nohp,
                'npwp' => $request->npwp,
            ]);
    
            if($employee){
                return response()->json([
                    'status' => 200,
                    'message' => "Employee Create Success"
                ],200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong!"
                ],500);
            }
        }
    }


    public function show($id){
        $employee = Employee::find($id);
        if($employee){
            
                return response()->json([
                    'status' => 200,
                    'message' => $employee
                ],200);
            }else{
            return response()->json([
                'status' => 404,
                'message' => "No Such Employee Found!"
            ],404);
        
    }
    }

    public function edit($id){
        $employee = Employee::find($id);
        if($employee){
            
                return response()->json([
                    'status' => 200,
                    'message' => $employee
                ],200);
            }else{
            return response()->json([
                'status' => 404,
                'message' => "No Such Employee Found!"
            ],404);
        
    }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|max:191',
            'name'  => 'required|string|max:191',
            'placeofbirth'  => 'required|string|max:191',
            'address'  => 'required|string|max:191',
            'dateofbirth'  => 'required|max:191',
            'gender'  => 'required|string|max:191',
            'gol'  => 'required|string|max:191',
            'eselon' => 'required|string|max:191',
            'position' => 'required|string|max:191',
            'placeoftask' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'workunit' => 'max:191',
            'nohp' => 'required|max:12',
            'npwp' => 'required|max:12',
        ]);
    
        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $employee = Employee::find($id);

            if($employee){
                $employee->update([
                    'nip' => $request->nip,
                    'name'  => $request->name,
                    'placeofbirth'  => $request->placeofbirth,
                    'address'  => $request->address,
                    'dateofbirth'  => $request->dateofbirth,
                    'gender'  => $request->gender,
                    'gol'  => $request->gol,
                    'eselon' => $request->eselon,
                    'position' => $request->position,
                    'placeoftask' => $request->placeoftask,
                    'religion' => $request->religion,
                    'workunit' => $request->workunit,
                    'nohp' => $request->nohp,
                    'npwp' => $request->npwp,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => "Employee Update Success"
                ],200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Such Employee Found!"
                ],404);
            }
        }
    }

    public function delete($id){
        {
            $employee = Employee::find($id);
            if($employee){
                $employee->delete();
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

            public function search(Request $request)
            {
            $query = $request->input('query');
            $employees = Employee::where('name', 'LIKE', "%{$query}%")
                                ->orWhere('nip', 'LIKE', "%{$query}%")
                                ->get();

            return response()->json(['employee' => $employees]);
        }

        public function employeeReport()
            {
                $employees = Employee::all();
                return response()->json($employees);
            }

        }
