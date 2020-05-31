<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
    ];
    public function users()
    {
        return $this->morphedByMany(User::class, 'target', 'tags_relation');
    }
    public function vacancies()
    {
        return $this->morphedByMany(Vacancy::class, 'target', 'tags_relation');
    }
}
