<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];

    // ! Creando la relacion del post a su usuario
    public function user()
    {
        return $this -> belongsTo(User::class) -> select(['name', 'username', 'id']) ;
    }

    // !Relacion de Post a sus comentarios
    public function comentarios()
    {
        return $this -> hasMany(Comentario::class);
    }

    // !Relacion post a sus likes
    public function likes()
    {
        return $this -> hasMany(Like::class);
    }

    public function checkLike(User $user)
    {
        return $this -> likes -> contains('user_id', $user -> id);
    }
}
