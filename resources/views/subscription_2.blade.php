<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Card</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway&display=swap');

:root {
  --light-grey: #F6F9FC;
  --dark-terminal-color: #0A2540;
  --accent-color: #635BFF;
  --radius: 3px;
}

body {
  padding: 20px;
  font-family: 'Raleway';
  display: flex;
  justify-content: center;
  font-size: 1.2em;
  color: var(--dark-terminal-color);
}

main {
  width: 480px;
}

form > * {
  margin: 10px 0;
}

button {
  background-color: var(--accent-color);
}

button {
  background: var(--accent-color);
  border-radius: var(--radius);
  color: white;
  border: 0;
  padding: 12px 16px;
  margin-top: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s ease;
  display: block;
}
button:hover {
  filter: contrast(115%);
}
button:active {
  transform: translateY(0px) scale(0.98);
  filter: brightness(0.9);
}
button:disabled {
  opacity: 0.5;
  cursor: none;
}

input, select {
  display: block;
  font-size: 1.1em;
  width: 100%;
  margin-bottom: 10px;
}

label {
  display: block;
}

a {
  color: var(--accent-color);
  font-weight: 900;
}

small {
  font-size: .6em;
}

fieldset, input, select {
  border: 1px solid #efefef;
}

#payment-form {
  border: #F6F9FC solid 1px;
  border-radius: var(--radius);
  padding: 20px;
  margin: 20px 0;
  box-shadow: 0 30px 50px -20px rgb(50 50 93 / 25%), 0 30px 60px -30px rgb(0 0 0 / 30%);
}

#messages {
  font-family: source-code-pro, Menlo, Monaco, Consolas, 'Courier New';
  display: none; /* hide initially, then show once the first message arrives */
  background-color: #0A253C;
  color: #00D924;
  padding: 20px;
  margin: 20px 0;
  border-radius: var(--radius);
  font-size:0.7em;
}
    </style>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Helper for displaying status messages.
        const addMessage = (message) => {
        const messagesDiv = document.querySelector('#messages');
        messagesDiv.style.display = 'block';
        const messageWithLinks = addDashboardLinks(message);
        messagesDiv.innerHTML += `> ${messageWithLinks}<br>`;
        console.log(`Debug: ${message}`);
        };

        // Adds links for known Stripe objects to the Stripe dashboard.
        const addDashboardLinks = (message) => {
        const piDashboardBase = 'https://dashboard.stripe.com/test/payments';
        return message.replace(
            /(pi_(\S*)\b)/g,
            `<a href="${piDashboardBase}/$1" target="_blank">$1</a>`
        );
        };
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', async () => {
        const stripe = Stripe('{{ env('STRIPE_KEY') }}', {
          apiVersion: '2020-08-27',
        });

        const elements = stripe.elements({
          clientSecret: '{{ $intent->client_secret }}'
        });
        const paymentElement = elements.create('payment');
        paymentElement.mount('#payment-element');

        const paymentForm = document.querySelector('#payment-form');
        paymentForm.addEventListener('submit', async (e) => {
          // Avoid a full page POST request.
          e.preventDefault();

          // Disable the form from submitting twice.
          paymentForm.querySelector('button').disabled = true;

          // Confirm the card payment that was created server side:
          const {error} = await stripe.confirmSetup({
            elements,
            confirmParams: {
              return_url: "{{ route("subscription.create",["plan"=>$plan->id]) }}"
            }
          });
          if(error) {
            addMessage(error.message);

            // Re-enable the form so the customer can resubmit.
            paymentForm.querySelector('button').disabled = false;
            return;
          }
        });
      });
    </script>
  </head>
  <body>
    <main>
      <a href="{{ route("index") }}">Home</a>
      <a href="{{ route("dashboard") }}">Dashboard</a>
      <h1>Payment</h1>

      <form id="payment-form">
        <label for="payment-element">Payment details</label>
        <div id="payment-element">
          <!-- Elements will create input elements here -->
        </div>

        <!-- We'll put the error messages in this element -->
        <div id="payment-errors" role="alert"></div>

        <button id="submit">Pay</button>
      </form>

      <div id="messages" role="alert" style="display: none;"></div>
    </main>
  </body>
</html>
