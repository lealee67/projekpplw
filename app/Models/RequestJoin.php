<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RequestJoin extends Model
{
    protected $table = 'request_join';
    protected $fillable = ['user_id', 'room_id', 'role_id', 'status', 'tanggal_request'];
    protected $casts = ['tanggal_request' => 'date'];

    public function user() { return $this->belongsTo(User::class); }
    public function room() { return $this->belongsTo(Room::class); }
    public function role() { return $this->belongsTo(Role::class); }
}
