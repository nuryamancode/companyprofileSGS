<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'about';
    protected $fillable = [
        'id',
        'judul',
        'description',
        'visi',
        'misi',
        'image1',
        'image2',
        'image3',
        'image4',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function misi()
    {
        return $this->hasMany(MissionModel::class, 'about_id', 'id');
    }
}
