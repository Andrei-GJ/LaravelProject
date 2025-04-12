<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_documento_id',
        'numero_documento',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'genero_id',
        'departamento_id',
        'municipio_id',
        'correo',
    ];

    // If the primary key is not 'id', specify it here
    protected $primaryKey = 'id';

    // If the primary key is not auto-incrementing, set this to false
    public $incrementing = true;

    // If the primary key is not an integer, set the key type
    protected $keyType = 'int';

    protected $table = 'pacientes'; // Ensure this matches your database table name

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }
    
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
    
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
    
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}
