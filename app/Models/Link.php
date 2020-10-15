<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Link extends Model
{
    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'slug',
        'visits',
        'delete_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'delete_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->slug = self::uniqSlug();
        });
    }

    protected static function uniqSlug() {
        $slug = Str::random(7);
        while (self::where('slug', '=', $slug)->exists()) {
            $slug = Str::random(7);
        }

        return $slug;
    }

}
