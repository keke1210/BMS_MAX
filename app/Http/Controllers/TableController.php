<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();

        return view('tables.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'description'=>'required|not_in:0'
        ]);

        $table = new Table;
        $table->description = $request->input('description');
        $table->save();

        return redirect('/tables')->with('success','Table Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table=Table::find($id);
        $rezervuar = $table->rezervuar;

        return view('tables.show', compact('table','rezervuar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $this->validate($request,[
            't_id'=>'required',
        ]);

        if ($validator) {
            echo "gar";
        } else {
            die('somethong went wtong');
        }
        
        $table=Table::find($id);
        return $table;
        if ($table->rezervuar == 0){
            $table->T_id=$request->T_id;
            $table->lloji=$request->lloji;
            $table->rezervuar=1;
            $table->save();
        } else {
            $table->T_id=$request->T_id;
            $table->lloji=$request->lloji;
            $table->rezervuar=0;
            $table->save();
        }
        return redirect('tables')->with('success','Je kar o mario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
