<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

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
        $this->rules();
        return view('home');
    }
    public function rules()
    {
        // Read File
        $jsonString = file_get_contents(base_path('public/storage/settings.json'));
        $data = json_decode($jsonString, true);

        // Get setting
        $settings    = $data['configuration']['company']['rules'];
        $credentials = $data['configuration']['company']['credentials'];
        $schoolyear  = $data['configuration']['company']['school_year'];
        $enrollment  = $data['configuration']['company']['enrollment'];

        session()->put('rules', $settings);
        session()->put('credentials', $credentials);
        session()->put('schoolyear',  $schoolyear );
        Session::put('enrollment',  $enrollment );
    }
}
