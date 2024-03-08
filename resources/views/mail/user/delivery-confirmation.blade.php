<x-mail::message>
# Delivery Confirmation: Your {{ $order->service->short_name ?? $order->service->name }} Supply Order has been Delivered

Dear {{ $user->name }},

We are pleased to inform you that your recent order for diesel/gas supply has been successfully delivered to the specified location.

Here are the details of your delivery:
- Order ID: #{{ $order->id }}
- Product: {{ $order->service->short_name ?? $order->service->name }}
- Quantity: {{  $order->qty }} {{ $order->service->unit }}
- Price: ${{  $order->price }} per {{ $order->service->unit }}
- Total: ${{  $order->total }}
- Delivery Address: {{ $order->address }}
- Delivery Date and Time: {{ $order->delivery_date_time }}

We hope that the delivery met your expectations and that you are satisfied with our service. Your trust in us means a lot, and we strive to maintain the highest standards of quality and reliability in every delivery.

If you have any feedback regarding your delivery experience or if there's anything else we can assist you with, please feel free to contact us at Ezfuel365@gmail.com. We are always here to help.

Thank you once again for choosing us for your fuel supply needs. We look forward to serving you again in the future.

<x-mail::button :url="route('index')">
    {{ config('app.name') }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
