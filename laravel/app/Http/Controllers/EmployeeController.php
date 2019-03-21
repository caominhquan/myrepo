<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
	public function index(){
		$data['employees'] = Employee::paginate(10);  
		return view('employeeform', $data);
	}

	public function create(){
		return view('create');
	}

	public function store(Request $request)
    {
        $employee = new Employee();

        $employee->email = $request->input('email');
        $employee->post = $request->input('post');

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/employee/', $filename);
            $employee->image = $filename;
        }else{
        	return $request;
        	$employee->image = '';
        }
        	$employee->save();
        	return redirect('/employeepage')->with('employee', $employee);
    	// $request->validate([
     //        'email' => 'required',
     //        'post' => 'required',
     //        'image' => 'required',
     //    ]); 
     //    Employee::create($request->all());
     //    return redirect('/employeepage')->with('success','Great! Note created successfully.');
    }

    public function display(){
    	$employees = Employee::all();
    	return view('employeeform')->with('employees', $employees);
    }

    public function edit($id){
    	$employees = Employee::find($id);
    	return view('employeeupdateform')->with('employees', $employees);
    }

    public function update(Request $request, $id)
    {
        $employees = Employee::find($id);

        $employees->email = $request->input('email');
        $employees->post = $request->input('post');

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/employee/', $filename);
            $employees->image = $filename;
        }
        $employees->save();
        return redirect('/employeepage')->with('employees', $employees);
        
    }
}

