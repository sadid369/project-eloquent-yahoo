<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::simplepaginate(4);
        // $users = User::find([2,4],['name','email'])->count();
        // $users = User::count();
        // $users = User::where('city',"=","North Gregoriofurt")->get();
        // $users = User::where([
            //     ['city',"=","Destinhaven"],
            //     ['age','<',20]
            // ])->get();
            // $users = User::where('city',"=","Destinhaven")->orwhere('age',">",35)->get();
            // $users = User::whereCity("Destinhaven")->get();
            // $users = User::whereCity("Destinhaven")->select('name','email as User Email')->get();
            // $users = User::whereCity("Destinhaven")->select('name','email as User Email')->toSql();
            // $users = User::whereCity("Destinhaven")->select('name','email as User Email')->toRawSql();
            // $users = User::whereCity("Destinhaven")->select('name','email as User Email')->dd();
            // $users = User::whereCity("Destinhaven")->select('name','email as User Email')->ddRawSql();
            // $users = User::whereCity("Destinhaven")->whereAge(19)->get();
            // $users = User::where("city","=","Destinhaven")->first();
            // $users = User::where("city","<>","Destinhaven")->get();
            // $users = User::whereNot("city","Destinhaven")->get();
            // $users = User::whereBetween("age",[20,25])->get();
            // $users = User::whereNotBetween("age",[20,25])->get();
            // $users = User::whereIn("city",["Destinhaven","West Flavio"])->get();
            // $users = User::whereNotIn("city",["Destinhaven","West Flavio"])->get();
        // return $users;
        return view('home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user = new User();
        // $user->name= $request->username;
        // $user->email= $request->useremail;
        // $user->age= $request->userage;
        // $user->city= $request->usercity;

        // $user->save();
        $request->validate([
            "username"=>'required',
            "useremail"=>'required|email',
            "userage"=>'required|numeric',
            "usercity"=>'required',
        ]);
        User::create([
            "name"=>$request->username,
            "email"=>$request->useremail,
            "age"=>$request->userage,
            "city"=>$request->usercity,
        ]);

        return redirect()->route('user.index')
        ->with('status','New User Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  
        $users =User::find($id);
        return view('viewuser',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 

        $users =User::find($id);
        return view('updateuser', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //   User::find($id)->update([
    //     "name"=>$request->username,
    //     "email"=>$request->useremail,
    //     "age"=>$request->userage,
    //     "city"=>$request->usercity,
    //    ]);
    $request->validate([
        "username"=>'required',
        "useremail"=>'required|email',
        "userage"=>'required|numeric',
        "usercity"=>'required',
    ]);
      User::where('id',$id)->update([
        "name"=>$request->username,
        "email"=>$request->useremail,
        "age"=>$request->userage,
        "city"=>$request->usercity,
       ]);
       return redirect()->route('user.index')
        ->with('status',' User Update Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {  
        //  $users  = User::find($id);
        // $users->delete();
        // User::destroy([21,22]);
        User::destroy($id);
        return redirect()->route('user.index')
        ->with('status',' User Deleted Successfully');
    }
}
