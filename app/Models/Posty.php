<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posty extends Model
{
    use HasFactory;
    protected $table = 'posty';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tytul',
        'autor',
        'email',
        'tresc',
    ];
    public function user()
    {
       return $this->belongsTo(User::class,'user_id');
    }
    public function update_user()
    {
       return $this->belongsTo(User::class,'update_user_id');
    }
}
