<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AnggotaRoom extends Model
{
    protected $table = 'anggota_room';
    protected $fillable = ['user_id', 'room_id'];
    public function user()  { return $this->belongsTo(User::class); }
    public function room()  { return $this->belongsTo(Room::class); }
    public function tasks() { return $this->hasMany(Task::class, 'anggota_id'); }
}
