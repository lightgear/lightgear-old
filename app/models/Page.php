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

    public function widgets()
    {
        return $this->hasMany('Lightgear\Content\Models\Widget');
    }

    /*public static function boot()
    {
        parent::boot();
    }*/
}
