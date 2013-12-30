<?php

class PagesController extends ResourceController {

    protected $page;

    protected $input;

    public function __construct(Page $page)
    {
        $this->page = $page;

        $this->input = Input::all();

        $this->beforeFilter('@filterInput', array('only' => array('store', 'update')));
        $this->beforeFilter('@getPageBySlug', array('except' => array('index', 'create', 'store')));
    }

    public function index()
    {
        $pages = $this->page->all();

        View::share('title', 'Pages index (i18n)');

        return View::make('pages.index', compact('pages'));
    }

    public function create()
    {
        View::share('title', 'Create new page (i18n)');

        $tags = Tag::allNames();

        return View::make('pages.create', compact('tags'));
    }

    public function store()
    {
        if ($this->page->fill($this->input)->save())
        {
            return Redirect::route('pages.index');
        }

        return Redirect::route('pages.create')
            ->withInput()
            ->withErrors($this->page->errors());
    }

    public function show($slug)
    {
        View::share('title', $this->page->title);

        return View::make('pages.show', array('page' => $this->page));
    }

    public function edit($slug)
    {
        $tags = Tag::allNames();

        if (is_null($this->page))
        {
            return Redirect::route('pages.index');
        }

        View::share('title', 'Editing page (i18n) "' . $this->page->title . '"');

        return View::make('pages.edit', array('page' => $this->page, 'tags' => $tags));
    }

    public function update($slug)
    {
        if ($this->page->update($this->input))
        {
            return Redirect::route('pages.show', $slug);
        }

        return Redirect::route('pages.edit', $slug)
            ->withInput()
            ->withErrors($this->page->errors());
    }

    public function delete($slug)
    {
        View::share('title', 'Deleting page (i18n) "' . $this->page->title . '"');

        return View::make('pages.delete', array('page' => $this->page));
    }

    public function destroy($slug)
    {
        $this->page->delete();

        return Redirect::route('pages.index');
    }

    public function filterInput()
    {
        if ( ! isset($this->input['published']))
        {
            $this->input['published'] = 0;
        }
    }


    public function getPageBySlug($route)
    {
        $this->page = $this->page->where('slug', '=', $route->parameter('pages'))->first();
    }
}
