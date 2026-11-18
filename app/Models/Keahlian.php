<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $table = 'keahlian';
    protected $fillable = ['nama_keahlian', 'keterangan'];
    public function users() { return $this->belongsToMany(User::class, 'keahlian_user'); }
}
