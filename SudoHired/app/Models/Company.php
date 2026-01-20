<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'description', 
        ];

        // função de relacionamento, indica que uma empresa tem varios trabalhos listados, evita colocar condiçoes no controller
        public function jobs()
    {
        return $this->hasMany(JobListing::class, 'company_id');
    }
}
