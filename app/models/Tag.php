<?php

class Tag extends Eloquent {
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
}
