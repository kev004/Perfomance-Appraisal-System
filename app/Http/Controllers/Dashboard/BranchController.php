<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $branch = Branch::get();

        return view('main.branch.view', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('main.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postcreate(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required', 
            'phone_number'      => 'required'
        ]);

        $name = $request->input('name');
        $phone_number = $request->input('phone_number');

        Branch::create([
            'name'              => $name,
            'phone_number'      => $phone_number,
        ]);


        return redirect('/branch/view/')->with('success', 'Branch successfully created!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($branch_id)
    {
      $branch = Branch::whereId($branch_id)->first();

        return view('main.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $branch_id)
    {
        $this->validate($request, [
            'name'              => 'required',
            'phone_number'      => 'required'

        ]);
 
        $name = $request->input('name');
        $phone_number = $request->input('phone_number');

        $branch = Branch::whereId($branch_id)->first();

        $branch->update([
            'name' => $name,
            'phone_number'=>$phone_number
        ]);

        return redirect('/branch/view/')->with('success', 'Branch successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmdelete($branch_id)
    {   
        $branch = Branch::whereId($branch_id)->first();

        return view('main.branch.delete', compact('branch'));
    }

    public function delete($branch_id)
    {   
        $branch = Branch::whereId($branch_id)->first()->delete();

        return redirect('/branch/view/')->with('success', 'Branch successfully deleted!');
    }
}
