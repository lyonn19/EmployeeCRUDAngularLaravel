<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'documentoident';
    public $incrementing = false;

    protected $fillable = array('fechaingreso', 'documentoident', 'nombrepersona','apellidopersona','telefonoprincipalpersona','telefonosecundariopersona','celularpersona','direccionperona','correopersona','fotoempleado','idcargo');
    public $timestamps = true;
    public function cargo()
    {
        return $this->hasOne('App\Cargo');
    }
}
