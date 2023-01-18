<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Collaborator extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'bio'];
    public static function generateSlug($name)
    {
        $collaborator_slug = Str::slug($name);
        return $collaborator_slug;
    }
}
