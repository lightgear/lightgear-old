<?php

class Page extends BaseModel {

    protected $fillable = array(
        'title',
        'body',
        'slug',
        'published',
    );

    public static $rules = array(
        'title' => 'required',
        'body' => 'required'
    );

    public static $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug'
    );

    public function tags()
    {
        return $this->belongsToMany('Tag', 'pages_tags')->withTimestamps();
    }

    public static function boot()
    {
        parent::boot();

        static::saved(function($model)
        {
            $input = Input::all();
            $tags = isset($input['tags']) ? $input['tags'] : array();

            return $model->tags()->sync($tags);
        });

        static::deleted(function($model)
        {
            return $model->tags()->sync(array());
        });
    }
}
