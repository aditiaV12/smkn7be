<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class staff_kategori extends Model
{
    use HasFactory;
    protected $table='staff_kategori';
    protected $guarded=['id'];
    public $timestamps=false;

    public function staff():HasMany
    {
        return $this->hasMany(staff::class);
    }
}
