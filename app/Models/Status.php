<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    public $timestamps = false;
    protected $fillable = ['nama_status'];
    public function tasks() { return $this->hasMany(Task::class); }
}
