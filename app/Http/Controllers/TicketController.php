<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Reply;

class TicketController extends Controller
{
    /**
    * Show create ticket form
    * @return View
    */
    public function create()
    {
        return view('ticket.create');
    }

    /**
    * Store new ticket in storage
    * @param  Request $request
    * @param  Ticket  $ticket
    * @return Redirect to home with success message
    */
    public function store( Request $request , Ticket $ticket )
    {
        $request->validate($this->rules());

        $ticket->created_by = auth()->user()->id;
        $ticket->subject = $request->subject;
        $ticket->description = $request->description;
        $ticket->save();
        return redirect()->route('home')->with('success','Ticket created successfully');
    }

    /**
    * Rules to validate user input
    * @access private
    * @return Array
    */
    private function rules( )
    {
        return [
            'subject' => 'required|max:150',
            'description' =>'required',
        ];
    }

    /**
    * Show details of a particular ticket
    * @param  int $id represent existing ticket in storage
    * @return View with ticket information
    */
    public function details( int $id =NULL)
    {
        try {
            return view('ticket.details',[
                'data' => Ticket::with(['replies','status'])->findOrFail( $id ),
                'id' => $id
            ]);
        } catch (\Exception $e) {
            return back()->with('info','Ticket Not Found');
        }
    }

    /**
    * Store user replies on a particular ticket in storage
    * @param  int $id represents existing ticket in storage
    * @param  Request $request
    * @return [type]           [description]
    */
    public function reply( int $id , Request $request )
    {
        $request->validate([
            'description' =>'required'
        ]);
        $reply = new Reply;
        $reply->user_id = auth()->user()->id;
        $reply->ticket_id = $id;
        $reply->description = $request->description;
        if($reply->save())
        return back();
    }

    /**
    * Update status of ticket to close
    * @param  int $id represent existing ticket in storage
    * @return Redirect to home
    */
    public function close( int $id )
    {
        try {
            Ticket::findOrFail( $id )->update(['status_id'=>2]);
            return redirect()->route('home');
        } catch (\Exception $e) {
            return back()->with('info','Ticket Not Found');
        }

    }
}
