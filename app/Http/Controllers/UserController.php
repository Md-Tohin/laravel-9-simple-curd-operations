<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email_address' => 'required|email|unique:users,email',
            'password' => 'required',
        ],[
           'full_name.required' => 'The full name field is required.',
           'email_address.required' => 'The email address field is required.',
           'email_address.email' => 'The email address is invalid.',
           'email_address.unique' => 'The email address already exists.',
           'password.required' => 'The password field is required.',
        ]);

        $user = new User;
        $user->name = $request->full_name;
        $user->email = $request->email_address;
        $user->password = md5($request->password);
        $user->created_at = Carbon::now();
        $user->save();

        $notification = [
            'message' => 'Success! User Created',
            'alert_type'=> 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.create', compact('user'));
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
        $request->validate([
            'full_name' => 'required',
            'email_address' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
        ],[
           'full_name.required' => 'The full name field is required.',
           'email_address.required' => 'The email address field is required.',
           'email_address.email' => 'The email address is invalid.',
           'email_address.unique' => 'The email address already exists.',
           'password.required' => 'The password field is required.',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->full_name;
        $user->email = $request->email_address;
        $user->password = md5($request->password);
        $user->updated_at = Carbon::now();
        $user->save();

        $notification = [
            'message' => 'Success! User Updated.',
            'alert_type'=> 'success',
        ];

        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        $notification = [
            'message' => 'Success! User Deleted.',
            'alert_type'=> 'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        User::where('id', $id)->update([
            'status' => 0,
        ]);
        $notification = [
            'message' => 'Success! User Inactive.',
            'alert_type'=> 'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function active($id){
        User::where('id', $id)->update([
            'status' => 1,
        ]);
        $notification = [
            'message' => 'Success! User Active.',
            'alert_type'=> 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
