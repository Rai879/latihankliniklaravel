<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;   
use Nicolaslopezj\Searchable\SearchableTrait;

class Daftar extends Model
{
    use HasFactory;
    use SearchableTrait;
    protected $guarded = [];

    protected $searchable = [
   
      'columns' => [
          'pasiens.nama' => 1,
          'pasiens.no_pasien' => 10,
          'polis.nama' => 3,
      ],
      'joins' => [
          'pasiens' => ['pasiens.id','daftars.pasien_id'],
          'polis' => ['polis.id','daftars.poli_id'],
      ],
  ];

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
