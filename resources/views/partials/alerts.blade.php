@php
    $timeout = config('notifications.alerts_timeout')
@endphp

@if ($message = session('success'))
    <div class="uk-alert-primary alert-timeout" @if($timeout) data-timeout="{{ $timeout }}" @endif uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>{!! $message !!}</p>
    </div>
@endif

@if ($message = session('warning'))
    <div class="uk-alert-warning alert-timeout" @if($timeout) data-timeout="{{ $timeout }}" @endif uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>{!! $message !!}</p>
    </div>
@endif

@if ($message = session('danger'))
    <div class="uk-alert-danger alert-timeout" @if($timeout) data-timeout="{{ $timeout }}" @endif uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>{!! $message !!}</p>
    </div>
@endif
