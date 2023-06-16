<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Relations\HasMany;


class kategori extends Model
{
    use HasFactory,sluggable;

    protected $guarded=['id'];
    protected $table='kategori';

    public function berita():HasMany
    {
        return $this->hasMany(berita::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
