<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kyslik\ColumnSortable\Sortable;


class staff extends Model
{
    use HasFactory,Sortable;
    
    protected $table='staff';
    protected $guarded=['id'];
    public $timestamps=false;
    public $sortable=['nama','jabatan','nama',];

    public function staff_kategori():BelongsTo
    {
        return $this->belongsTo(staff_kategori::class);
    }
}
