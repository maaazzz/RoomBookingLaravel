@component('mail::message')
# Feedback Mail

From: {{ $feedback->email }}

Message: {{ $feedback->message }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
