<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    protected $fillable = [
        'room_id', 'status_id', 'anggota_id', 'nama_task', 'created_by'
        ,'created_by_user_id', 'due_date', 'link_attachment_task',
    ];
    protected $casts = ['due_date' => 'datetime'];

    public function room()    { return $this->belongsTo(Room::class); }
    public function status()  { return $this->belongsTo(Status::class); }
    public function anggota() { return $this->belongsTo(AnggotaRoom::class, 'anggota_id'); }
    public function creator() { return $this->belongsTo(User::class, 'created_by_user_id');}
}
