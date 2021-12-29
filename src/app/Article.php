<?php

namespace App;

use App\Helper\Helper;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    const PUBLIC_IMAGE_ARTICLE_PATH = '/assets/image/articles/';
    protected $fillable = [
        'title',
        'thumbnail_id',
        'content',
        'author_id',
    ];
    /**
     * article belongs to author
     *
     * @return belongsTo #1-1 associate
     */
    public function author()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }

    /**
     * articles has many images
     *
     * @return hasMany #1-n associate
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * article belongs to & has many categories
     *
     * @return belongsToMany #1-n associate
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'article_categories', 'article_id', 'category_id')->withTimestamps();
    }

    /**
     * getting all article from database
     *
     * @return array
     */
    public function get_all_articles()
    {
        return Article::select(
            'articles.id',
            'title',
            'thumbnail_id',
            'articles.created_at',
            'src',
            'authors.fullname'
        )->leftJoin('images', 'images.id', '=', 'articles.thumbnail_id')->join('authors', 'authors.id', '=', 'articles.author_id')->orderBy('created_at', Config::get("gVar.sort_desc"))->get();
    }

    /**
     * getting article by id
     *
     * @param  int $id
     * @return $article|false
     */
    public function get_article_by_id($id)
    {
        $article = Article::findOrFail($id);
        if ($article) {
            $article->page_view += 1;
            if ($article->save()) {
                return $article->load('author:id,fullname')->load('images');
            }
        }
        return false;
    }

    /**
     * inserting new article into database
     *
     * @param  string $title
     * @param  mixed $images
     * @param  mixed $thumbnail
     * @param  mixed $content
     * @param  mixed $categories_id
     * @param  mixed $author_id
     * @return $article|false
     */
    public function store_new_article($images, $thumbnail, $categories_id)
    {
        DB::beginTransaction();
        try {
            $filename = [];
            $location = '';
            if ($this->save()) {
                // save image if images exist
                if ($images && $thumbnail) {
                    foreach ($images as $img) {
                        $location = public_path(self::PUBLIC_IMAGE_ARTICLE_PATH);
                        $image_name = Helper::store_image($img, $location);
                        $filename[] = $image_name;
                        $img_db_obj = $this->images()->create(['src' => $image_name]); //attach images
                        if ($img->getClientOriginalName() == $thumbnail) {
                            $this->update(['thumbnail_id' => $img_db_obj->id]);
                        }
                    }
                }
                $this->categories()->attach($categories_id);
                DB::commit();
                return $this;
            } else {
                DB::rollBack();
                return false;
            }
        } catch (Exception $e) {
            Helper::remove_image_from_storage($filename, $location);
            DB::rollBack();
            echo 'Error: ' . $e->getMessage();
        }
    }

    /**
     * Getting article's title, content by $id for edit
     *
     * @param  int $id
     * @return $article|false
     */
    public function get_article_for_edit($id)
    {
        if (Article::find($id))
            return Article::find($id, ['id', 'title', 'content', 'author_id'])->load('author:id');
        return false;
    }

    /**
     * Updating article's title & content by $id
     *
     * @param  int $id
     * @param  string $title
     * @param  string $content
     * @return bool
     */
    public function update_article($id, $title, $content)
    {
        return Article::find($id)->update([
            'title' => $title,
            'content' => $content,
        ]);
    }

    /**
     * Deleting aricle by $id
     *
     * @param  int $id
     * @return bool
     */
    public function delete_article($id)
    {
        DB::beginTransaction();
        try {
            $article_delete = Article::find($id);
            $images_path = $article_delete->images()->pluck('src')->toArray();
            if ($article_delete && $article_delete->delete()) {
                if (!empty($images_path)) {
                    if (Helper::remove_image_from_storage($images_path, public_path(self::PUBLIC_IMAGE_ARTICLE_PATH))) {
                        DB::commit();
                        return true;
                    } else {
                        DB::rollBack();
                        return false;
                    }
                }
                DB::commit();
                return true;
            }
        } catch (Exception $e) {
            DB::rollBack();
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
