<?php

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PayPalWebhook
{
    public function handleWebhook(Request $request)
    {
        // Verify that the webhook is authentic
        if (!$this->isValidWebhook($request)) {
            Log::error('Received invalid webhook');
            return response('Invalid webhook', 400);
            exit();
        }

        // Get the webhook data from the request
        $webhookData = $request->all();
        $event_type = $webhookData["event_type"];

        // Handle the event based on its type
        switch ($event_type) {
            case "BILLING.SUBSCRIPTION.ACTIVATED":
                $this->onSubscriptionCreate($webhookData);
                break;
            case "BILLING.SUBSCRIPTION.CANCELLED":
                $this->onSubscriptionCancel($webhookData);
                break;
            case "PAYMENT.SALE.COMPLETED":
                $this->onPaymentCompleted($webhookData);
                break;
            case "BILLING.SUBSCRIPTION.PAYMENT.FAILED":
                $this->onPaymentFailed($webhookData);
                break;
            case "BILLING.SUBSCRIPTION.SUSPENDED":
                $this->onSubscriptionSuspended($webhookData);
                break;
        }
    }

    protected function isValidWebhook()
    {
        // get request headers
        $headers = apache_request_headers();
        // Log::info($headers);

        // get http payload
        $body = file_get_contents('php://input');

        $data =
            $headers['Paypal-Transmission-Id'] . '|' .
            $headers['Paypal-Transmission-Time'] . '|' .
            env('PAYPAL_WEBHOOK_ID') . '|' . crc32($body);


        // load certificate and extract public key
        $pubKey = openssl_pkey_get_public(file_get_contents($headers['Paypal-Cert-Url']));
        $key = openssl_pkey_get_details($pubKey)['key'];

        // verify data against provided signature
        $result = openssl_verify(
            $data,
            base64_decode($headers['Paypal-Transmission-Sig']),
            $key,
            'sha256WithRSAEncryption'
        );


        if ($result == 1) {
            // webhook notification is verified
            Log::info('webhook verified');
            return true;
        } elseif ($result == 0) {
            // webhook notification is NOT verified
            Log::info('webhook not verified');
            return false;
        } else {
            // there was an error verifying this
            Log::info('webhook verification error');
            return false;
        }
    }
    protected function onSubscriptionCreate(array $webhookData)
    {
        $user_data = explode("-", $webhookData['resource']['subscriber']['shipping_address']['name']['full_name']);
        $uid = (int) $user_data[0];
        $coupon_user_id = (int) $user_data[1];
        $method = 'Paypal';
        $paypalPlanId = $webhookData['resource']['plan_id'];
        $plan = Plan::where('paypal_plan_id', $paypalPlanId)->first();
        $status = Subscription::SUBSCRIPTION_STATUS_ACTIVE;
        $subscription_id = $webhookData['resource']['id'];
        $ends_at = date('Y-m-d H:i:s', strtotime($webhookData['resource']['billing_info']['next_billing_time']));
        $paidAt = date('Y-m-d H:i:s', strtotime($webhookData['resource']['create_time']));
        $amount = $plan->total_amount;

        if ($coupon_user_id > 0) {
            // get coupon info
        }

        $sub = Subscription::where('user_id', $uid)->first();

        if (!$sub) {
            // new subscription logic here

            $type = 'new';
        } else {
            // subscription updated
            $type = 'updated';

            // updated subscription logic here
        }

        // create receipt logic here

        Log::info('Subscription Created');
    }

    protected function onSubscriptionCancel(array $webhookData)
    {
        $subscription_id = $webhookData['resource']['id'];

        // cancel subscription logic

        Log::info('Subscription Cancelled');
    }

    protected function onPaymentCompleted(array $webhookData)
    {
        $subscription_id = $webhookData['resource']['billing_agreement_id'];
        $amount = $webhookData['resource']['amount']['total'];
        $subscription = Subscription::where('subscription_id', $subscription_id)->first() ?? exit();
        $plan = Plan::where('id', $subscription->plan_id)->first();
        if ($subscription && $subscription->plan_id === $plan->id) {
            // recurring payment logic here
        }
    }

    protected function onSubscriptionSuspended(array $webhookData)
    {
        $sid = $webhookData['resource']['id'];

        // pause subscription logic here

    }

    protected function onPaymentFailed(array $webhookData)
    {
        $subscription_id = $webhookData['resource']['id'];
        // logic here

    }
}
