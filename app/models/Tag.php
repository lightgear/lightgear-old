<?php

class Tag extends BaseModel {

	protected $guarded = array();

	public static $rules = array(
        'name' => 'required',
    );

    public static $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug'
    );

    public function pages()
    {
        return $this->belongsToMany('Page');
    }

    public static function allNames()
    {
        $tags = array();

        foreach (self::all() as $tag) {
            $tags[$tag->id] = $tag->name;
        }

        return $tags;
    }
}
