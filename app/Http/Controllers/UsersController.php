<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Validator;
use App\Http\Controllers\DB;
use Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'orari'=> 'required',
            'c_password' => 'required|same:password',
        ]);
       

        $input = $request->all(); 

        if($input['password'] !== $input['c_password']) {
            Alert::error('You should use the same password on the confirm password field');
            return redirect('users')->with('error','You should use the same password on the confirm password field');
        } else {
            
        //return $input;
        $input['password'] = bcrypt($input['password']); 
        $input['c_password'] = bcrypt($input['c_password']);

        $input['orari'] = $request->input('orari');
        // dd($input['orari']);
        //return $input;   
      
       
        $user = User::create($input);

        // if($input['radio'] === 'kamarier') 
        if($request->radio === 'kamarier') {
            $user->assignRole('kamarier');
        }
        else if($request->radio === 'ekonomist') {
            $user->assignRole('ekonomist');
        } else {
            return $request->radio;
        }


        
        Alert::success('Përdoruesi u krijua me sukses');
        // return response()->json(['success'=>'Përdoruesi u krijua me sukses']);
        return redirect('/users')->with('success','User Created');
        } //kushti nqs passworded jan te njejte
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show',compact('user'))->with('success','Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
        ]);
       

        $input = $request->all(); 


        $user = User::find($id);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->save();

        if($input['radio'] === 'kamarier') {
        // if($request->radio === 'kamarier'){
           \DB::table('model_has_roles')->where('model_id','=',$id)->update(['role_id'=>'4']);
        }
        else if($input['radio'] === 'ekonomist'){
        // if($request->radio === 'ekonomist'){
            \DB::table('model_has_roles')->where('model_id','=',$id)->update(['role_id'=>'3']);
        } else {
            echo "<h1>Couldn't Assign role</h1>";
        }

        Alert::success('Të dhënat e përdoruesit u përditësuan me sukses');
        return redirect('/users')->with('success','User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Alert::success('Përdoruesi u fshi me sukses');
        return redirect('users')->with('success','User deleted Succesfuly');
    }
}
