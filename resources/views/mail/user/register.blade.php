<x-mail::message>
    # Welcome to {{ config('app.name') }}
    Dear {{ $user->name }},

    We're thrilled to welcome you to {{ config('app.name') }}! You have successfully registered and are now part of our community.

    Thank you for choosing us. At {{ config('app.name') }}, our mission is simple: to offer a convenient service for our users to submit requests for gas based on their schedule and location. We exist to eliminate the 
    annoying task of filling up and completing it for you so that you can get in your car and go with no worry.
    If you have any questions, feedback, or need assistance at any point, please don't hesitate to contact us at Ezfuel365@gmail.com. We're here to help!

    Once again, welcome aboard, {{ $user->name }}!

<x-mail::button :url="route('index')">
    {{ config('app.name') }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

