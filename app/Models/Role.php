<?php

namespace App\Models;

use App\Models\Collaborator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    public function Collaborator(): HasMany
    {
        return $this->hasMany(Collaborator::class);
    }
}
