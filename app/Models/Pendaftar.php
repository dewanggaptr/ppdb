<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';
    protected $primaryKey = 'nisn';

    protected $fillable = [
        'nama',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'alamat',
        'telp',
        'agama',
        'asalSekolah',
        'jurusan',
        'url_foto',
        'nama_ayah',
        'pekerjaan_ayah',
        'pendidikan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'pendidikan_ibu',
    ];

    public function User()
	{
		return $this->belongsTo(User::Class);
	}  


}
