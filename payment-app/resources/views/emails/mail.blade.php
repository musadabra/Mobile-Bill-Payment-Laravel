{{-- @component('mail::message') --}}

Dear {{ $contact_name }},
<br>
You have been invited by Admin of NNRA to signup on the NDR application.<br>
Click the link below to complete your signup.<br>
{{ $url }}
{{-- @endcomponent  --}}
Your NDR domain is: https://ndr.nnra.gov.ng
Your sign in email is: {{ $contact_email }}
<br>
Time: {{ date_format(date_create('now'), 'Y-m-d H:i') }}
<br>
{{-- @component('mail::button', ['url' => route("website.home")."/admin"])
Login to Ascent.ng
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
{{-- @endcomponent --}}
