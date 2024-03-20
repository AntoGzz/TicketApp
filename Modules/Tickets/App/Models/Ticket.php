<?php

namespace Modules\Tickets\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Modules\Events\App\Models\Event;

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tickets';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'event_id',
        'quantity_sold',
        'payment_file',
        'buyer_id',
        'user_created_id',
        'created_at',
        'user_updated_id',
        'updated_at',
        'user_deleted_id',
        'deleted_at',
    ];


    public function scopeGetTickets($query)
    {
      return $query
        ->select([
          'tickets.id',
          'tickets.payment_file',
          'tickets.created_at',
          'tickets.quantity_sold as quantity_tickets',
          'b.id as buyer_id',
          'b.phone',
          DB::raw("CONCAT(b.identification, ' - ', b.name, ' ', b.last_name) as full_name"),
          'e.id as event_id',
          'e.name as event',
          'e.date',
        ])
        ->join('buyers as b', function ($join) {
          $join->on('b.id', '=', 'tickets.buyer_id');
        })
        ->join('events as e', function ($join) {
          $join->on('e.id', '=', 'tickets.event_id');
        });
    }

    public function scopeGetTicket($query)
    {
      return $query
        ->select([
          'tickets.id',
          'tickets.payment_file',
          'tickets.created_at',
          'tickets.quantity_sold as quantity_tickets',
          'b.id as buyer_id',
          'b.phone',
          'b.email',
          'b.identification',
          DB::raw("CONCAT(b.name, ' ', b.last_name) as full_name"),
          'e.id as event_id',
          'e.name as event',
          'e.date',
        ])
        ->join('buyers as b', function ($join) {
          $join->on('b.id', '=', 'tickets.buyer_id');
        })
        ->join('events as e', function ($join) {
          $join->on('e.id', '=', 'tickets.event_id');
        });
    }

    public function Buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
