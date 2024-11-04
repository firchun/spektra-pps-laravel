<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendudukDistrik extends Model
{
    use HasFactory;
    protected $table = 'penduduk_distrik';
    protected $guarded = [];

    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten');
    }
    public function distrik(): BelongsTo
    {
        return $this->belongsTo(Distrik::class, 'id_distrik');
    }
}
