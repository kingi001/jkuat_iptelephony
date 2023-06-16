<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Telephone;
use App\Models\Campus;
use App\Models\Department;
use RealRashid\SweetAlert\Facades\Alert;


class TelephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $telephones = Telephone::with('campus', 'department')->get();
        $telephones = Telephone::orderBy('id', 'ASC')->paginate(10);
        $departments = Department::select('deptname')->distinct('deptname')->pluck('deptname');
        $campus = Campus::select('ccode')->distinct('ccode')->pluck('ccode');
        return view('telephone.index', compact('telephones', 'departments', 'campus'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function landing()
    {
        $telephones = Telephone::with('campus', 'department')->get();
        $telephones = Telephone::orderBy('id', 'ASC')->paginate(10);
        $departments = Department::select('deptname')->distinct('deptname')->pluck('deptname');
        $campus = Campus::select('ccode')->distinct('ccode')->pluck('ccode');
        return view('welcome', compact('telephones', 'departments', 'campus'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ccode' => 'required ',
            'extnumber' => ['required', Rule::unique('trialexcel', 'extnumber')],
            ['extnumber.unique' => 'The value you entered already exists.'],       
            'deptname' => 'required',
            'owerassigned' => 'required',

        ]);
        // Create a new telephone record
        $telephone = new Telephone();
        $telephone->ccode = $request->ccode;
        $telephone->extnumber = $request->extnumber;
        $telephone->deptname = $request->deptname;
        $telephone->owerassigned = $request->owerassigned;

        

        $telephone->save();
        Alert::success('Added Successfully', 'Telephone details Added successfully.');
        return redirect()->route('telephone.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $telephone = Telephone::all();
        return view('telephone.index', compact('telephone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $telephone = Telephone::all();
        return view('telephone.index', compact('telephone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $telephone = Telephone::find($id);
        $input = $request->all();
        $telephone->fill($input)->save();
        Alert::success('Updated Successfully', 'Telephone details Updated successfully.');
        return redirect()->route('telephone.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Telephone $telephone)
    {    
        $telephone->delete();
        Alert::warning('Deleted Successfully', 'Extension details deleted successfully.');
        return redirect()->route('telephone.index');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $telephones = Telephone::where('extnumber', 'LIKE', "%$query%")
        ->orWhere('owerassigned','LIKE',"%$query%")
        ->paginate(10);

        $departments = Department::select('deptname')->distinct('deptname')->pluck('deptname');
        $campus = Campus::select('ccode')->distinct('ccode')->pluck('ccode');

        return view('telephone.index', compact('telephones', 'departments', 'campus'));
    }


    public function filter(Request $request)
    {
        $query = $request->input('query');
        // filter by campus_code
        $telephones = Telephone::where('ccode', 'LIKE', "%$query%")->paginate(10);
        // return view with data
        $departments = Department::select('deptname')->distinct('deptname')->pluck('deptname');
        $campus = Campus::select('ccode')->distinct('ccode')->pluck('ccode');

        return view('telephone.index', compact('telephones', 'departments', 'campus'));
    }
    public function showModal()
    {
        $campus = Campus::select('ccode')->distinct('ccode')->pluck('ccode');
        return view('modals.telephone-modal', compact('campus'));
    }
}
