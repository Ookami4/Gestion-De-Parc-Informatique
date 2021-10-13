<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin')->except('update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(6);
        return view('users.index',compact('users'))->with('i',(\request()->input('page',1)-1)*6);
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
            'rib'=>'required',
            'adress'=>'required',
            'is_admin'=>'required',
            'image_path'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        User::create($request->all());
        if ($request->hasFile('image_path')) {
            $filenameWithExt = $request->file('image_path')->getClientOriginalName ();// Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);// Get just Extension
            $extension = $request->file('image_path')->getClientOriginalExtension();// Filename To store
            $fileNameToStore = $filename . '_'. time().'.'.$extension;// Upload Image
            $path = $request->file('image_path')->storeAs('public/img/users', $fileNameToStore);
        }// Else add a dummy image
        else {
            $fileNameToStore = 'user.jpg';
        }
        return redirect()->route('users.index')->with('success', 'employeure  ajouter avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $machine = Machine::where('util_id', $user->id)->get();
        return view('users.show',compact('user','machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!Auth::user()->is_admin or (Auth::user()->id == $user->id)){
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'rib'=>'required',
                'adress'=>'required',
                'image_path'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($request->hasFile('image_path')) {
                $filenameWithExt = $request->file('image_path')->getClientOriginalName ();// Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);// Get just Extension
                $extension = $request->file('image_path')->getClientOriginalExtension();// Filename To store
                $fileNameToStore = $filename . '_'. time().'.'.$extension;// Upload Image
                $path = $request->file('image_path')->storeAs('public/img/users', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'user.jpg';
            }
            $user->update($request->all());
            return redirect()->route('userProfil')->with('success','Votre profil modifie avec succes');
        }
        if (Auth::user()->is_admin) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'rib'=>'required',
                'adress'=>'required',
                'is_admin'=>'required',
                'image_path'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('image_path')) {
                $filenameWithExt = $request->file('image_path')->getClientOriginalName ();// Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);// Get just Extension
                $extension = $request->file('image_path')->getClientOriginalExtension();// Filename To store
                $fileNameToStore = $filename . '_'. time().'.'.$extension;// Upload Image
                $path = $request->file('image_path')->storeAs('public/img/users', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'user.jpg';
            }
            $user->update($request->all());
            return redirect()->route('users.index')->with('success','Profil modifie avec succes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprime avec succes');
    }
}
