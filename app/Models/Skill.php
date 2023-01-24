<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Collaborator;

class Skill extends Model
{
    use HasFactory;

    /**
     * The collaborators that belong to the Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function collaborators(): BelongsToMany
    {
        return $this->belongsToMany(Collaborator::class);
    }
}
