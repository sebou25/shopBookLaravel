<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Adresse extends Model
{
    // indique les champs à prendre : protected $fillable = ['prenom','nom','adresse','adresse2','code_postal','ville','pays'];
    //indique de prendre tous les champs sauf ['id']
    protected $guarded = ['id'];
}
