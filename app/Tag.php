<?php  namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'id','nombre',
    ];
    
    public function encuestas(){
        return $this->belongsToMany(App\Encuesta);
    }
}