<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tasks;
class Projects extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
