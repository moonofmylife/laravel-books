<div id="offcanvas-overlay" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <ul class="uk-nav uk-nav-primary">
            <li {{ conditionClass(isRequest('renters*'), 'uk-active', true) }}>
                <a href="{{ route('renters.index') }}">@lang('menu.renters')</a>
            </li>
            <li {{ conditionClass(isRequest('books*'), 'uk-active', true) }}>
                <a href="{{ route('books.index') }}">@lang('menu.books')</a></li>
            <li {{ conditionClass(isRequest('history*'), 'uk-active', true) }}>
                <a href="#">@lang('menu.history.main')</a>
                <ul class="uk-nav-sub">
                    <li {{ conditionClass(isRequest('history/active-readers*'), 'uk-active', true) }}>
                        <a href="{{ route('history.activeReaders') }}">@lang('menu.history.active_readers')</a>
                    </li>
                    <li {{ conditionClass(isRequest('history/last-books*'), 'uk-active', true) }}>
                        <a href="{{ route('history.lastBooks') }}">@lang('menu.history.last_books')</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
