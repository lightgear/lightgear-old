<?php

class UsersController extends ResourceController {

    protected $user;

    protected $input;

    public function __construct(User $user)
    {
        $this->user = $user;

        $this->input = Input::all();

        /*$this->beforeFilter('@filterInput', array('only' => array('store', 'update')));
        $this->beforeFilter('@getUserBySlug', array('except' => array('index', 'create', 'store')));*/
    }

    public function index()
    {
        $users = $this->user->all();

        View::share('title', 'Users index (i18n)');

        return View::make('users.index', compact('users'));
    }

    public function create()
    {
        View::share('title', 'Create new user (i18n)');

        $users = Tag::allNames();

        return View::make('users.create', compact('users'));
    }

    public function store()
    {
        if ($this->user->fill($this->input)->save())
        {
            return Redirect::route('users.index');
        }

        return Redirect::route('users.create')
            ->withInput()
            ->withErrors($this->user->errors());
    }

    public function show($id)
    {
        View::share('title', $this->user->title);

        $user = $this->user->find($id);

        return View::make('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->user->find($id);

        if (is_null($user))
        {
            return Redirect::route('users.index');
        }

        View::share('title', 'Editing user (i18n) "' . $user->username . '"');

        return View::make('users.edit', array('user' => $user));
    }

    public function update($slug)
    {
        if ($this->user->update($this->input))
        {
            return Redirect::route('users.show', $slug);
        }

        return Redirect::route('users.edit', $slug)
            ->withInput()
            ->withErrors($this->user->errors());
    }

    public function delete($slug)
    {
        View::share('title', 'Deleting user (i18n) "' . $this->user->title . '"');

        return View::make('users.delete', array('user' => $this->user));
    }

    public function destroy($slug)
    {
        $this->user->delete();

        return Redirect::route('users.index');
    }

    public function filterInput()
    {
        if ( ! isset($this->input['published']))
        {
            $this->input['published'] = 0;
        }
    }
}
