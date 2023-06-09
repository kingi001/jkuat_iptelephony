<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Campus;
use App\Models\Telephone;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('campus')->get();
        $departments= Department::orderBy('id', 'ASC')->paginate(10);

        
        $dept= Department::select('deptname')->distinct('deptname')->pluck('deptname');


        
        $campus = Campus::select('ccode')->distinct('ccode')->pluck('ccode');

        return view('department.index', compact('departments','campus','dept'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ccode'=>'required | string',
            'deptcode'=>'required',
            'ownerassigned'=>'required',
            'deptname'=>'required'
            
    
           ]);
            // Create a new telephone record
        $department = new department();
        $department->ccode = $request->ccode;
        $department->deptcode = $request->deptcode;
        $department->ownerassigned= $request->ownerassigned;
        $department->deptname= $request->deptname;


        $department->save();                    
        Alert::success('Department Added Successfully');
        return redirect()->route('department.index');
    }
    public function search(Request $request)
    {
    $query = $request->input('query');
    $departments = Department::where('deptcode', 'LIKE', "%$query%")
    ->orWhere('deptname', 'LIKE', "%$query%")
    ->orWhere('ownerassigned','LIKE',"%$query%")
    ->orWhere('ccode','LIKE',"%$query%")

    ->paginate(10);

    $dept= Department::select('deptname')->distinct('deptname')->pluck('deptname');


    $campus = Campus::select('ccode')->distinct('ccode')->pluck('ccode');
    $telephones = Telephone::with('campus','department')->get();
    $telephones= Telephone::orderBy('id', 'ASC')->paginate(10);

    return view('department.index', compact('departments','campus','telephones','dept'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
