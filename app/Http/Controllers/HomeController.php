<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->role_id === 1 )
        {
            return view('admin.index',[
                'data' => Ticket::with('status')->orderBY('created_at','desc')->paginate(10),
                'total' => Ticket::count(),
                'open' => Ticket :: where('status_id',1)->count()
            ]);
        }
        return view('user.index',[
            'data' => Ticket::with('status')->where('created_by',auth()->user()->id)->orderBY('created_at','desc')->paginate(10),
            'total' => Ticket::where('created_by',auth()->user()->id)->count(),
            'open' => Ticket ::where('status_id',1)->where('created_by',auth()->user()->id)->count()
        ]);
    }
}
