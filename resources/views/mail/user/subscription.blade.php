<x-mail::message>
# Welcome to Our Standard Plan Subscription!

Dear {{ $user->name }},

Congratulations on subscribing to our {{$plan->name}}! We are thrilled to have you on board and look forward to providing you with the best quality support and service.

## Subscription Details:
- **Plan**: {{$plan->name}}
- **Duration**:  {{$plan->type}}
- **Price**: ${{$plan->price}}
- **Date**: {{date("Y-M-d h:i A")}}

@php

$pattern = '/<li>(.*?)<\/li>/s';
    preg_match_all($pattern, $plan->details, $matches);
@endphp
@if(count($matches[1]))
### Plan Features:
@foreach($matches[1] as $row)
- {{$row}}
@endforeach
@endif

Thank you for choosing us to meet your needs. We are committed to ensuring you have a seamless experience throughout your subscription period.

If you have any questions or need assistance, feel free to contact us at Ezfuel365@gmail.com. We're here to help you make the most out of your subscription.

<x-mail::button :url="route('index')">
    {{ config('app.name') }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>




