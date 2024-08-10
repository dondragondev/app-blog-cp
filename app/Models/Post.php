<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title`,'excerpt','body' ];
    protected $guarded = ['id'];
    protected $with = ['catagory', 'author'];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     $search = '%' . $filters['search'] . '%';
        //     return $query->where('title', 'like', $search)->orWhere('body', 'like', $search);
        // }
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', $search)->orWhere('body', 'like', $search);
        });

        $query->when($filters['catagory'] ?? false, function ($query, $catagory) {
            return $query->whereHas('catagory', function ($query) use ($catagory) {
                $query->where('slug',  $catagory);
            });
        });
        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas(
            'author',
            fn ($query) =>
            $query->where('username',  $author)

        ));
    }

    public function catagory()
    {
        return $this->belongsTo(Catagory::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
