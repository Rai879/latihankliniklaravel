<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;   

class Daftar extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Get the user that owns the Daftar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  public function Pasien(): BelongsTo
  {
    return $this->belongsTo(Pasien::class)->withDefault();
  }


}
