<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $fillable = [
        'title', 
        'image', 
        'salary', 
        'release_date', 
        'inscription_end_date', 
        'company_id'
    ];

    // funcao de relacionamento e que cada vaga pertence a uma unica empresa
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
