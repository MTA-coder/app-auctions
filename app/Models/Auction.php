<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'minimum_bid', 'end_time', 'user_id', 'category_id', 'tag_id'];

    protected $hidden = ['updated_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function filterData($data)
    {
        return
            self::when(isset($data['tag_id']), function ($query) use ($data) {
                return $query->where('tag_id', $data['tag_id']);
            })
            ->when(isset($data['category_id']), function ($query) use ($data) {
                return $query->where('category_id', $data['category_id']);
            })
            ->when(isset($data['low_price']), function ($query) use ($data) {
                return $query->where('price', '>=', $data['low_price']);
            })
            ->when(isset($data['max_price']), function ($query) use ($data) {
                return $query->where('price', '<=', $data['high_price']);
            })
            ->with(['images', 'categories', 'tags'])
            ->get();
    }
}
