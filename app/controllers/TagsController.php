<?php

class TagsController extends ResourceController {

    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {
        $tags = $this->tag->all();

        View::share('title', 'Tags index (i18n)');

        return View::make('tags.index', compact('tags'));
    }

    public function create()
    {
        View::share('title', 'Create new tag (i18n)');

        return View::make('tags.create');
    }

    public function store()
    {
        if ($this->tag->fill(Input::all())->save())
        {
            return Redirect::route('tags.index');
        }

        return Redirect::route('tags.create')
            ->withInput()
            ->withErrors($this->tag->errors());
    }

    public function show($slug)
    {
        $tag = $this->getTagBySlug($slug);

        View::share('title', $tag->title);

        return View::make('tags.show', compact('tag'));
    }

    public function edit($slug)
    {
        $tag = $this->getTagBySlug($slug);

        if (is_null($tag))
        {
            return Redirect::route('tags.index');
        }

        View::share('title', 'Editing tag (i18n) "' . $tag->title . '"');

        return View::make('tags.edit', compact('tag'));
    }

    public function update($slug)
    {
        $tag = $this->getTagBySlug($slug);

        if ($tag->update(Input::all()))
        {
            return Redirect::route('tags.show', $slug);
        }

        return Redirect::route('tags.edit', $slug)
            ->withInput()
            ->withErrors($tag->errors());
    }

    public function delete($slug)
    {
        //$this->getTagBySlug($slug)->delete();

        return Redirect::route('tags.index');
    }

    public function destroy($slug)
    {
        $this->getTagBySlug($slug)->delete();

        return Redirect::route('tags.index');
    }

    protected function getTagBySlug($slug)
    {
        return $this->tag->where('slug', '=', $slug)->first();
    }

}
