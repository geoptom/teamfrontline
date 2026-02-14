<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    {{-- {{$contactMessage}} --}}
    <h2>New Contact Message</h2>

<p><strong>Name:</strong> {{ $contactMessage->name }}</p>
<p><strong>Email:</strong> {{ $contactMessage->email }}</p>
<p><strong>Phone:</strong> {{ $contactMessage->phone }}</p>
<p><strong>Subject:</strong> {{ $contactMessage->subject }}</p>
<p><strong>Message:</strong></p>
<p>{{ $contactMessage->message }}</p>
<p>IP Address: {{ $contactMessage->ip_address }}</p>
<p>Sent on: {{ $contactMessage->created_at->format('d M Y h:i A') }}</p>

</body>
</html>
