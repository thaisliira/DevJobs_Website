<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_listing_id', 
        'user_id',
        'resume_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function jobListing()
    {
        return $this->belongsTo(JobListing::class);
    }
}
