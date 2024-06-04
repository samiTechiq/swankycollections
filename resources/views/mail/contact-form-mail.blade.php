<x-mail::message>
Contact Form Message:
<br>
Sender Name: <b>{{ $contact->name }}</b>
<br>
Sender Email: <b>{{ $contact->email }}</b>
<br>
Sender Phone: <b>{{ $contact->phone }}</b>
<br>
Subject: <b>{{ $contact->subject }}</b>
<br>
Message: <br>
<b>{{ $contact->message }}</b>
<br><br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
