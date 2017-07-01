@component('mail::message')
# {{ $content['title'] }}

{{ $content['body'] }}

@component('mail::panel')
<strong>{{ $content['password'] }}</strong>
@endcomponent

@component('mail::button', ['url' => $content['url']])
{{ $content['button'] }}
@endcomponent

Obrigado,
{{ config('app.name') }}
@endcomponent