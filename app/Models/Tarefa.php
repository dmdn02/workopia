<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'titulo', 'descricao', 'data_fim', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
