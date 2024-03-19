<?php

namespace Modules\Tickets\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $query->select('*');
    }
}
