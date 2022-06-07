@component('mail::message')
# Thank you for registering!

Welcome to E-card.
You can start create your own business card now.

@component('mail::button', ['url' => ''])
Create now!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
