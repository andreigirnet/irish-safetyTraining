<x-mail::message>
# Here are your login details:

Login: {{$email}} <br>
Password: {{$password}}

<x-mail::button :url="'https://irish-safetytraining.com/login'">
Login Here
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
