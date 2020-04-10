<li {{ conditionClass(isRequest('renters*'), 'uk-active', true) }}>
    <a href="{{ route('renters.index') }}">@lang('menu.renters')</a>
</li>
<li {{ conditionClass(isRequest('books*'), 'uk-active', true) }}>
    <a href="{{ route('books.index') }}">@lang('menu.books')</a></li>
<li {{ conditionClass(isRequest('history*'), 'uk-active', true) }}>
    <a @click.prevent>@lang('menu.history.main')</a>
    <div class="uk-navbar-dropdown">
        <ul class="uk-nav uk-navbar-dropdown-nav">
            <li {{ conditionClass(isRequest('history/active-readers*'), 'uk-active', true) }}>
                <a href="{{ route('history.activeReaders') }}">@lang('menu.history.active_readers')</a>
            </li>
            <li {{ conditionClass(isRequest('history/last-books*'), 'uk-active', true) }}>
                <a href="{{ route('history.lastBooks') }}">@lang('menu.history.last_books')</a>
            </li>
        </ul>
    </div>
</li>
