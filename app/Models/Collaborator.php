<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Collaborator extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'bio' . 'role_id'];
    public static function generateSlug($name)
    {
        $collaborator_slug = Str::slug($name);
        return $collaborator_slug;
    }

    public function Role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
