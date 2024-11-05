<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $guarded = [];

    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten');
    }
    public function status_perusahaan(): BelongsTo
    {
        return $this->belongsTo(StatusPerusahaan::class, 'id_status_perusahaan');
    }
    public function skala_objek(): BelongsTo
    {
        return $this->belongsTo(SkalaObjekPengawasan::class, 'id_skala_objek_pengawasan');
    }
    public function status_modal(): BelongsTo
    {
        return $this->belongsTo(StatusModal::class, 'id_status_modal');
    }
    public function sektor(): BelongsTo
    {
        return $this->belongsTo(Sektor::class, 'id_sektor');
    }
    public function kepemilikan_perusahaan(): BelongsTo
    {
        return $this->belongsTo(KepemilikanPerusahaan::class, 'id_kepemilikan_perusahaan');
    }
}
