<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
    public function index()
    {

        $users = DB::table('users')->where('email', Auth::user()->email )->get();
        return view('home',['users' => $users]);
    }
  

    public function editprofile(){
        $users = DB::table('users')->where('email', Auth::user()->email )->get();
        return view('update',['users' => $users]);
    }
    public function upload(Request $request)
    {
        if ($request->image) {
            $image = file_get_contents($request->image);
            $base64 = base64_encode($image);
        } else {
            $base64 = Auth::user()->dp;
        }

        $querry = DB::table('users')->where('email', Auth::user()->email)
            ->update([
                'bio' => $request->bio,
                'location' => $request->location,
                'school' => $request->school,
                'college' => $request->college,
                'university' => $request->university,
                'experience' => $request->experience,
                'dp' =>  $base64,

            ]);

        if ($querry) {

            
            return redirect('home')->with('success', 'new slider added successfully.');
        } else {
            dd('failed');
            return redirect('hm')->with('failed', 'failed.');
        }
    }
  
}
