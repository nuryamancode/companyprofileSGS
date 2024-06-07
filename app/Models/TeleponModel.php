<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeleponModel extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'telepon';
    protected $fillable = [
        'id',
        'nama',
        'no_hp',
        'contact_id',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function contact()
    {
        return $this->belongsTo(ContactModel::class, 'contact_id' , 'id');
    }
}
