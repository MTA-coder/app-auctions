<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    protected $hidden = ['updated_at', 'deleted_at'];

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
