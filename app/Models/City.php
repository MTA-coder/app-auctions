<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'state_id'];

    protected $hidden = ['updated_at', 'deleted_at'];

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
