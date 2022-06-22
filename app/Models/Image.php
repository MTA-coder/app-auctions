<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['url', 'auction_id'];

    protected $hidden = ['updated_at', 'deleted_at'];

    public function auction()
    {
        return $this->belongsTo(Product::class);
    }
}
