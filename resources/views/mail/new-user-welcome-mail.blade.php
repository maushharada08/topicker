@component('mail::message')
# You registered Topicker

Thank you for joining our app.

@component('mail::button', ['url' => ''])
Start posting
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
