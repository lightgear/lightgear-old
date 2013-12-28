<?php

class PagesController extends ResourceController {

    protected $page;

    protected $input;

    public function __construct(Page $page)
    {
        $this->page = $page;

        $this->input = Input::all();

        $this->beforeFilter('@filterInput', array('only' => array('store', 'update')));
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

        return View::make('pages.create');
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
        $page = $this->getPageBySlug($slug);

        View::share('title', $page->title);

        return View::make('pages.show', compact('page'));
    }

    public function edit($slug)
    {
        $page = $this->getPageBySlug($slug);

        if (is_null($page))
        {
            return Redirect::route('pages.index');
        }

        View::share('title', 'Editing page (i18n) "' . $page->title . '"');

        return View::make('pages.edit', compact('page'));
    }

    public function update($slug)
    {
        $page = $this->getPageBySlug($slug);

        if ($page->update($this->input))
        {
            return Redirect::route('pages.show', $slug);
        }

        return Redirect::route('pages.edit', $slug)
            ->withInput()
            ->withErrors($page->errors());
    }

    public function delete($slug)
    {
        //$this->getPageBySlug($slug)->delete();

        return Redirect::route('pages.index');
    }

    public function destroy($slug)
    {
        $this->getPageBySlug($slug)->delete();

        return Redirect::route('pages.index');
    }

    public function filterInput()
    {
        if ( ! isset($this->input['published']))
        {
            $this->input['published'] = 0;
        }
    }

    protected function getPageBySlug($slug)
    {
        return $this->page->where('slug', '=', $slug)->first();
    }
}
