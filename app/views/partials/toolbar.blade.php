@if (logged_in())
    <div id="toolbar" class="toolbar">
        <span>Sitename</span>
        <div class="user-info">
            Logged in as <strong>"{{ Auth::user()->username }}"</strong>
            {{ link_to_route('logout', 'Logout (i18n)') }}
        </div>
    </div>
@endif
