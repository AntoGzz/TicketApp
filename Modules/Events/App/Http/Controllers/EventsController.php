<?php

namespace Modules\Events\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Events\App\Models\Event;

class EventsController extends Controller
{
    protected $event;

    public function __construct(Event $event)
	{
		$this->event = $event;
	}

    public function index()
    {
        $data = $this->event->getEvents()->orderBy('id','ASC')->get();
        return view('events::index', compact('data'));
    }

    public function create(Request $request)
    {
        try {
            $nEvent = new Event();
            $nEvent->name = $request->name;
            $nEvent->date = $request->date;
            $nEvent->quantity = $request->quantity;
            $nEvent->quantity_available = $request->quantity;
            $nEvent->ticket_price = $request->price;
            $nEvent->description = $request->description;
            $nEvent->user_created_id = 1;
            $nEvent->created_at = Carbon::now();
            $nEvent->save();

            return response()->json(['state' => 200,'msg' => '¡Los Datos se han guardados exitosamente!']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 400,'msg' => '¡Los Datos no se han podido guardar!'.'\n'.$th->getMessage()]);
        }
    }

    public function event(Request $request){
        $event = DB::table('events')
            ->select(DB::raw('*, DATE_FORMAT(date, "%d/%m/%Y") as date'))
            ->where('events.id', $request->id)
            ->orderByDesc('id')
            ->first();
        return $event;
    }

    public function events(){
        $event = DB::table('events')
            ->select('id', DB::raw("CONCAT(name ,' - Disponibles: [ ', quantity_available, ' ]') as event"), DB::raw('DATE_FORMAT(date, "%d/%m/%Y %H:%mm") as date'))
            ->whereNull('deleted_at')
            ->whereNull('user_deleted_id')
            ->orderByDesc('id')
            ->get();
        return $event;
    }

    public function quantityAvailable(Request $request){
        $event = DB::table('events')
            ->select('id', 'quantity_available')
            ->whereNull('deleted_at')
            ->whereNull('user_deleted_id')
            ->where('id',$request->event)
            ->orderByDesc('id')
            ->first();
        return $event;
    }

    public function update(Request $request)
    {
        try {
            // Buscamos el evento
            $event = $this->event->findOrFail($request->id);

            // Obtenemos los datos actualizados del request o usamos los datos existentes del evento
            $data = [
                'quantity' => $request->quantity ?? $event->quantity,
                'ticket_price' => $request->ticket_price ?? $event->ticket_price,
                'date' => $request->date ?? $event->date,
                'name' => $request->name ?? $event->name,
                'description' => $request->description ?? $event->description,
                'user_updated_id' => 1,
                'updated_at' => now(),
            ];

            // Actualizamos el evento
            $event->update($data);

            return response()->json([
                'code' => 200,
                'message' => 'Se actualizó con éxito!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 500,
                'message' => 'Error al actualizar | ' . $th->getMessage()
            ]);
        }
    }

    public function datatableIndex(){
        $data = $this->event->getEvents()->orderBy('id','ASC')->get();
        return response()->json(['state' => 200, 'data' => $data]);
    }

    public function destroy(Request $request)
    {
        try {
            $dEvent = Event::where('id',$request->id)->first();
            $dEvent->user_deleted_id = 1;
            $dEvent->deleted_at = Carbon::now();
            $dEvent->save();
            return response()->json(['state' => 200, 'msg' => 'Evento eliminado!']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 400, 'msg' => 'No se pudo Eliminar el Evento!' . $th]);
        }
    }
}
