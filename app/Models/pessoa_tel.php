<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pessoa_tel extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = "pessoa_tels";

    protected $fillable = [
        "id_pessoa",
        "num_tel"
    ];

    protected $date = ['delete_at'];


    /* App\Models\pessoa_tel::create(["id_pessoa"=>"1","num_tel"=>"(21)99887-0969"]); 
           
           
           use App\Models\pessoa_tel;
           $p = new App\Models\pessoa_tel;
           $p = App\Models\pessoa_tel::find(1);
           $p->num_tel = "21998870969";
           $p->save();

           use App\Models\pessoa_tel;
           $p = new App\Models\pessoa_tel;
           $p = App\Models\pessoa_tel::find(1);
           $p->forcedelete();

           $p->all();
        
        */
}
