<?php

namespace Modules\Tickets\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Tickets\App\Models\Ticket;

class TicketsController extends Controller
{
    protected $ticket;

    public function __construct(Ticket $ticket)
	{
		$this->ticket = $ticket;
	}

    public function index()
    {
        $data = $this->ticket->getTickets()->orderBy('id','ASC')->get();
        return view('tickets::index', compact('data'));
    }
}
