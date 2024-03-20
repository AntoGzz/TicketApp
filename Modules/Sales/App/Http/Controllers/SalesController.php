<?php

namespace Modules\Sales\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Events\App\Models\Event;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $event;

    public function __construct(Event $event)
	{
		$this->event = $event;
	}

    public function index()
    {
        $data = $this->event->getTicketsPerEvents()->orderBy('id','ASC')->get();
        return view('sales::index', compact('data'));
    }
}
