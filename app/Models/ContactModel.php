<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'contact';
    protected $fillable = [
        'id',
        'address',
        'email',
        'link_gmaps',
        'link_iframe',
    ];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];

    public function telepon()
    {
        return $this->hasMany(TeleponModel::class, 'contact_id', 'id');
    }
}
