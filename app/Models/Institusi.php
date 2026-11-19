<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    protected $table = 'institusi';
    protected $fillable = ['nama_institusi', 'wilayah_id'];
    public function wilayah() { return $this->belongsTo(Wilayah::class); }
    public function users()   { return $this->hasMany(User::class); }
}
