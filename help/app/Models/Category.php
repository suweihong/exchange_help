<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Category extends Model
{

    public function hasManyArticle()
{
	return $this->hasMany('App\Models\Article');
}

}

