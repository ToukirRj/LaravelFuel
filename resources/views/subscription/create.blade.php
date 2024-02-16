<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
     <style>
        .alert.parsley {
            margin-top: 5px;
            margin-bottom: 0px;
            padding: 10px 15px 10px 15px;
        }
        .check .alert {
            margin-top: 20px;
        }
        .credit-card-box .panel-title {
            display: inline;
            font-weight: bold;
        }
        .credit-card-box .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 100%;
        }
        .credit-card-box .display-tr {
            display: table-row;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body id="app-layout">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-primary text-center">
          <strong>Laravel 8 Stripe Subscription Example - CodeSolutionStuff</strong>
        </h1>
    </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default credit-card-box">
        <div class="panel-heading display-table" >
            <div class="row display-tr" >
                <strong>Laravel 8 Stripe Subscription Example - CodeSolutionStuff</strong>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">

                <form method="POST" action="{{ route('order-post') }}" accept-charset="UTF-8" data-parsley-validate id="payment-form">
                    @csrf

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">?</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="form-group" id="product-group">
                        <label for="plane">Select Plan:</label>
                        <select class="form-control" required="required" data-parsley-class-handler="#product-group" id="plane" name="plane">
                            @foreach ($plans as $plan)
                            <option value="{{ $plan->stripe_plan_id }}">{{ $plan->name }} (${{ number_format($plan->price) }})</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group" id="cc-group">
                        <label for="">Credit card number:</label>
                        <input class="form-control" required="required" data-stripe="number" data-parsley-type="number" maxlength="16" data-parsley-trigger="change focusout" data-parsley-class-handler="#cc-group" type="text">
                    </div>
                    <div class="form-group" id="ccv-group">
                        <label for="">CVC (3 or 4 digit number):</label>
                        <input class="form-control" required="required" data-stripe="cvc" data-parsley-type="number" data-parsley-trigger="change focusout" maxlength="4" data-parsley-class-handler="#ccv-group" type="text">
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="exp-m-group">
                            <label for="">Ex. Month</label>
                            <select class="form-control" required="required" data-stripe="exp-month"><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="exp-y-group">
                            <label for="">Ex. Year</label>
                            <select class="form-control" required="required" data-stripe="exp-year"><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option></select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-lg btn-block btn-primary btn-order" id="submitBtn" style="margin-bottom: 10px;" type="submit" value="Place order!">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

  </div>
</div>

    <script>
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
            errorClass: 'has-error',
            successClass: 'has-success'
        };
    </script>

    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey("<?php echo env('STRIPE_KEY') ?>");
        jQuery(function($) {
            $('#payment-form').submit(function(event) {
                var $form = $(this);
                $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
                    formInstance.submitEvent.preventDefault();
                    alert();
                    return false;
                });
                $form.find('#submitBtn').prop('disabled', true);
                Stripe.card.createToken($form, stripeResponseHandler);
                return false;
            });
        });
        function stripeResponseHandler(status, response) {
            var $form = $('#payment-form');
            if (response.error) {
                $form.find('.payment-errors').text(response.error.message);
                $form.find('.payment-errors').addClass('alert alert-danger');
                $form.find('#submitBtn').prop('disabled', false);
                $('#submitBtn').button('reset');
            } else {
                var token = response.id;
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                $form.get(0).submit();
            }
        };
    </script>
</body>
</html>
