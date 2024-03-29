<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function getSlug($name)
    {
        $slug = Str::of($name)->slug("-");
        $count = 1;

        while (Category::where("slug", $slug)->first()) {
            $slug = Str::of($name)->slug("-") . "-{$count}";
            $count++;
        }

        return $slug;
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
}
