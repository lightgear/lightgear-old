<?php

class BaseModel extends \Eloquent {

    protected $errors;

    public static function boot()
    {
        parent::boot();

        // cannot validate only on "saving"
        // otherwise other listener don't get
        static::creating(function($model)
        {
            return $model->validate();
        });

        static::updating(function($model)
        {
            return $model->validate();
        });
    }

    public function validate()
    {
        $validation = \Validator::make($this->attributes, static::$rules);

        if ($validation->passes()) {
            return true;
        }

        $this->errors = $validation->messages();

        return false;
    }

    public function errors()
    {
        return $this->errors;
    }
}
