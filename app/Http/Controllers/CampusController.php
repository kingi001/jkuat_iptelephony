<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Campus;
use App\Models\Department;
use App\Models\Telephone;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campus = Campus::orderBy('cid', 'ASC')->paginate(10);
        $departments = Department::select('deptname')->distinct('deptname')->pluck('deptname');
       
        $telephones = Telephone::with('campus','department')->get();
        $telephones= Telephone::orderBy('id', 'ASC')->paginate(10);

        return view('campus.index',compact('campus','departments','telephones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return view('campus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ccode'=>'required | string',
            'cname'=>'required',
            'addedby'=>'required'
            
    
           ]);
            // Create a new telephone record
        $campus = new Campus();
        $campus->ccode = $request->ccode;
        $campus->cname = $request->cname;
        $campus->addedby= $request->addedby;


        $campus->save();                    
        Alert::success('Campus Added Successfully', 'Campus details Added successfully.');
        return redirect()->route('campus.index');
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
    public function search(Request $request)
    {
        $query = $request->input('query');
        $campus = Campus::where('ccode', 'LIKE', "%$query%")
        ->orWhere('cname', 'LIKE', "%$query%")     
        ->paginate(10);
        $departments = Department::select('deptname')->distinct('deptname')->pluck('deptname');

        return view('campus.index', compact('campus','departments'));
        }
    }

