<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function Head()
    {
        return $this->belongsTo(Head::class,'head_id');
    }

}
