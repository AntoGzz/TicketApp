<?php

namespace Modules\Events\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Modules\Tickets\App\Models\Ticket;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'events';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'quantity',
        'date',
        'description',
        'ticket_price',
        'user_created_id',
        'created_at',
        'user_updated_id',
        'updated_at',
        'user_deleted_id',
        'deleted_at',
    ];


    public function scopeGetEvents($query)
    {
        return $query->select('*');
    }

    public function scopeGetTicketsPerEvents($query)
    {
      return $query
        ->select([
          'events.id',
          'events.name',
          'events.quantity',
           DB::raw("(CASE WHEN (events.quantity_sold IS NULL) THEN '0' ELSE events.quantity_sold END) as quantity_sold"),
           DB::raw("(CASE WHEN (events.quantity_available IS NULL) THEN '0' ELSE events.quantity_available END) as quantity_available")
        ]);
    }

    public function Ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
