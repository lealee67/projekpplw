<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'no_wa', 'deskripsi',
        'status_akun', 'institusi_id', 'wilayah_id',
    ];
    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return ['password' => 'hashed', 'status_akun' => 'boolean'];
    }

    public function keahlian()   { return $this->belongsToMany(Keahlian::class, 'keahlian_user'); }
    public function institusi()  { return $this->belongsTo(Institusi::class); }
    public function wilayah()    { return $this->belongsTo(Wilayah::class); }
    public function rooms()      { return $this->hasMany(Room::class); }            // room yang dibuat
    public function requests()   { return $this->hasMany(RequestJoin::class); }
    public function keanggotaan(){ return $this->hasMany(AnggotaRoom::class); }
    public function roomsDiikuti(){ return $this->belongsToMany(Room::class, 'anggota_room'); }
}
