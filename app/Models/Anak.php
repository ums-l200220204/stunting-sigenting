<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anak';

    protected $fillable = [
        'user_id',
        'nama_anak',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Relasi ke user (orang tua)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke data pertumbuhan
     */
    public function pertumbuhan()
    {
        return $this->hasMany(DataPertumbuhan::class, 'anak_id');
    }

    /**
     * Relasi ke laporan
     */
    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'anak_id');
    }

    /**
     * Usia anak dalam bulan
     */
    public function getUsiaBulanAttribute()
    {
        if (!$this->tanggal_lahir) {
            return 0;
        }

        return Carbon::parse($this->tanggal_lahir)
            ->diffInMonths(now());
    }
}