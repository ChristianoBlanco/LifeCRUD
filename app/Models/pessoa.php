<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pessoa extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = "pessoas";

    protected $fillable = [
        "nome",
        "cpf",
        "email",
        "dt_nasc",
        "nacionalidade"
    ];

    protected $date = ['delete_at'];

    public function telefone(){

        return $this->hasMany(pessoa_tel::class,'id_pessoa','num_tel');

     }


    /* App\Models\pessoa::create(["nome"=>"Christiano","cpf"=>"000.000.000-08","email"=>"christiano.blanco@hotmail.com","dt_nasc"=>"1977-03-26","nacionalidade"=>"Brasileiro"]); 
    /* App\Models\pessoa::create(["nome"=>"Bárbara","cpf"=>"200.000.000-08","email"=>"barbara@hotmail.com","dt_nasc"=>"1990-08-07","nacionalidade"=>"Brasileiro"]); 
    /* App\Models\pessoa::create(["nome"=>"João das Neves","cpf"=>"222.000.000-08","email"=>"jneves@hotmail.com","dt_nasc"=>"2000-10-07","nacionalidade"=>"Norte Americano"]); 
           
           use App\Models\pessoa;
           $p = new App\Models\pessoa;
           $p = App\Models\pessoa::find(1);
           $p->nome = "Christiano Blanco";
           $p->save();

           use App\Models\pessoa;
           $p = new App\Models\pessoa;
           $p = App\Models\pessoa::find(1);
           $p->forcedelete();

           $p->all();
        
        */
}
