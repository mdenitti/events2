<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Event extends Model
{

   protected $fillable = ['name', 'description', 'start_date', 'end_date'];

   public function categories()
   {
       return $this->belongsToMany(Category::class)->withPivot('featured');
   }
}
