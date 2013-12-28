<?php

class Page extends BaseModel {

    protected $fillable = array(
        'title',
        'body',
        'slug'
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
        return $this->hasMany('Tag');
    }
}
