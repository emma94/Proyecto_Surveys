<?php  namespace App;

use App;
use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Tag extends Model
{
    protected $fillable = [
        'id','nombre',
    ];
    
    public function encuestas(){
        return $this->belongsToMany(Encuesta::class);
    }
}