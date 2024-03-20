<?php

namespace Modules\Tickets\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'buyers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'last_name',
        'identification',
        'phone',
        'email',
        'user_created_id',
        'created_at',
        'user_updated_id',
        'updated_at',
        'user_deleted_id',
        'deleted_at',
    ];


    public function scopeGetBuyers($query)
    {
        return $query->select('*');
    }

    public function Ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
