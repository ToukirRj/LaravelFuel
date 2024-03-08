<x-mail::message>
# Order Confirmation: {{ $order->service->short_name ?? $order->service->name }} Delivery Request Received

Dear {{ $user->name }},

We hope this message finds you well.

We are writing to confirm that we have received your recent order for diesel/gas supply through our platform. Your request is important to us, and we want to assure you that we are already processing it diligently.

Here are the details of your order:
- Order ID: #{{ $order->id }}
- Product: {{ $order->service->short_name ?? $order->service->name }}
- Quantity: {{  $order->qty }} {{ $order->service->unit }}
- Price: ${{  $order->price }} per {{ $order->service->unit }}
- Total: ${{  $order->total }}
- Delivery Address: {{ $order->address }}
- Delivery Date and Time: {{ $order->delivery_date_time }}

Our team is now working on scheduling the delivery of your requested fuel type at the specified location and time. We will keep you informed about the progress of your order every step of the way.

If you have any questions, concerns, or need further assistance regarding your order, please don't hesitate to reach out to us. You can reply directly to this email or contact us at Ezfuel365@gmail.com.

Thank you for choosing us for your fuel supply needs. We appreciate your business and look forward to serving you soon.


<x-mail::button :url="route('index')">
    {{ config('app.name') }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
