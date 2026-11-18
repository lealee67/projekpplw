<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'user_id', 'nama_room', 'deskripsi', 'kapasitas', 'no_wa',
        'lokasi', 'detail_lokasi', 'tags', 'link_groupchat',
    ];

    public function pembuat()  { return $this->belongsTo(User::class, 'user_id'); }
    public function roles()    { return $this->hasMany(Role::class); }
    public function requests() { return $this->hasMany(RequestJoin::class); }
    public function anggota()  { return $this->hasMany(AnggotaRoom::class); }
    public function tasks()    { return $this->hasMany(Task::class); }

    // Query scope: pencarian berdasarkan nama/deskripsi
    public function scopeCari($query, ?string $kata)
    {
        return $query->when($kata, fn ($q) =>
            $q->where('nama_room', 'like', "%{$kata}%")
              ->orWhere('deskripsi', 'like', "%{$kata}%"));
    }
}
