<x-mail::message>
Hello Dear!

we got a request to reset your password click the below button to reset it,
if you did not request for this simply ignore this email.

<x-mail::button :url="$url">
Reset Password
</x-mail::button>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
