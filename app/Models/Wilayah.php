<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';
    protected $fillable = ['nama_provinsi', 'nama_kabupaten_kota'];
    public function users()    { return $this->hasMany(User::class); }
    public function institusi(){ return $this->hasMany(Institusi::class); }
}
