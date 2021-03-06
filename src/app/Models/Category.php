<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'parent_id',
    ];

    /**
     * categorie belong to & has many articles
     *
     * @return belongsToMany # 1-n associate
     */
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article', 'article_categories', 'category_id', 'article_id');
    }

    public function get_all_categories()
    {
        return Category::all();
    }
}
