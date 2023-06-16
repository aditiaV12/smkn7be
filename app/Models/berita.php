<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class berita extends Model
{
    use HasFactory,sluggable,Sortable;
    
    
    protected $table='berita';
    protected $guarded=['id'];
    public $sortable = ['judul','author','nama'];

    public function kategori():BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
