<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Category extends Model
{
    public function events()
    {
        return $this->belangsToMany(Event::class);
    }
}
