<?php

namespace Modules\Tickets\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Modules\Events\App\Models\Event;
use Modules\Tickets\App\Models\Buyer;
use Modules\Tickets\App\Models\Ticket;

class TicketsController extends Controller
{
    protected $ticket;
    protected $event;

    public function __construct(Ticket $ticket, Event $event)
	{
		$this->ticket = $ticket;
		$this->event = $event;
	}

    public function index()
    {
        $data = $this->ticket->getTickets()->orderBy('id','ASC')->get();
        return view('tickets::index', compact('data'));
    }

    public function ticket(Request $request){
        $ticket = $this->ticket->getTicket()->where('tickets.id', $request->id)->first();
        return $ticket;
    }

    public function create(Request $request)
    {

        try {
            $event = $this->event->findOrFail($request->event_id);

            $buyer = Buyer::select('id','identification')->where('identification',$request->identification)->first();
            if ($buyer != null && !empty($buyer)) {
                $nTicket = new Ticket();
                $nTicket->event_id = $request->event_id;
                $nTicket->quantity_sold = $request->quantity_sold;
                $nTicket->buyer_id = $buyer->id;
                $nTicket->user_created_id = 1;
                $nTicket->created_at = Carbon::now();
                $nTicket->save();

                if ($nTicket->save()) {
                    $lastTicket = Ticket::latest()->first();
                    if ($request->hasFile('payment_file')) {
                        $file = $request->file('payment_file');
                        $extension = $file->getClientOriginalExtension();
                        $path = '/comprobantes/' .'Boleto_Nro_'. $lastTicket['id'].'-'.$lastTicket['date'] . '.' . $extension;
                        $fileContent = File::get($file);
                        Storage::disk('public')->put($path, $fileContent);
                    } else {
                        $path = NULL;
                    }
                    $lastTicket->payment_file = $path;
                    $lastTicket->save();

                    $uEvent = Event::where('id',$request->event_id)->first();
                    $uEvent->quantity_sold = $event->quantity_sold + $request->quantity_sold;
                    $uEvent->quantity_available = $event->quantity - ($event->quantity_sold + $request->quantity_sold);
                    $uEvent->user_updated_id = 1;
                    $uEvent->save();
                }
            }else{
                $nBuyer = new Buyer();
                $nBuyer->name = $request->name;
                $nBuyer->last_name = $request->last_name;
                $nBuyer->identification = $request->identification;
                $nBuyer->phone = $request->phone;
                $nBuyer->email = $request->email;
                $nBuyer->user_created_id = 1;
                $nBuyer->created_at = Carbon::now();
                $nBuyer->save();

                if($nBuyer->save()){
                    $lastBuyer = Buyer::latest()->first();
                    $nTicket = new Ticket();
                    $nTicket->event_id = $request->event_id;
                    $nTicket->quantity_sold = $request->quantity_sold;
                    $nTicket->buyer_id = $lastBuyer->id;
                    $nTicket->user_created_id = 1;
                    $nTicket->created_at = Carbon::now();
                    $nTicket->save();

                    if ($nTicket->save()) {
                        $lastTicket = Ticket::latest()->first();
                        if ($request->hasFile('payment_file')) {
                            $file = $request->file('payment_file');
                            $extension = $file->getClientOriginalExtension();
                            $path = '/comprobantes/' .'Boleto_Nro_'. $lastTicket['id'].'-'.$lastTicket['date'] . '.' . $extension;
                            $fileContent = File::get($file);
                            Storage::disk('public')->put($path, $fileContent);
                        } else {
                            $path = NULL;
                        }
                        $lastTicket->payment_file = $path;
                        $lastTicket->save();

                        $uEvent = Event::where('id',$request->event_id)->first();
                        $uEvent->quantity_sold = $event->quantity_sold + $request->quantity_sold;
                        $uEvent->quantity_available = $event->quantity - ($event->quantity_sold + $request->quantity_sold);
                        $uEvent->user_updated_id = 1;
                        $uEvent->save();
                    }
                }
            }

            return response()->json(['state' => 200,'msg' => '¡Los Datos se han guardados exitosamente!']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 400,'msg' => '¡Los Datos no se han podido guardar!'.'\n'.$th->getMessage()]);
        }
    }

    public function datatableIndex(){
        $data = $this->ticket->getTickets()->orderBy('id','ASC')->get();
        return response()->json(['state' => 200, 'data' => $data]);
    }

}
