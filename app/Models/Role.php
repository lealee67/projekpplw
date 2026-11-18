<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['room_id', 'nama_role', 'deskripsi', 'jumlah_dibutuhkan'];
    public function room()     { return $this->belongsTo(Room::class); }
    public function requests() { return $this->hasMany(RequestJoin::class); }

    // sisa slot = dibutuhkan - request yang sudah diterima
    public function getSisaSlotAttribute(): int
    {
        return max(0, $this->jumlah_dibutuhkan - $this->requests()->where('status', 'diterima')->count());
    }
}
