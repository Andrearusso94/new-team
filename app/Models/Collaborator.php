<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Collaborator extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'bio'];
    public static function generateSlug($name)
    {
        $collaborator_slug = Str::slug($name);
        return $collaborator_slug;
    }

    /**
     * The roles that belong to the Collaborator
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }
}
