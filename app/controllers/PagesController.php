<?php

class PagesController extends ResourceController {

    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
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
        if ($this->page->fill(Input::all())->save())
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

        if ($page->update(Input::all()))
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

    protected function getPageBySlug($slug)
    {
        return $this->page->where('slug', '=', $slug)->first();
    }

}
