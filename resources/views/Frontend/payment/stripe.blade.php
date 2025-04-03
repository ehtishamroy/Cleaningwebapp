@extends('Frontend.app')

@section('content')


    <style>
        #payment-form {
            width: 100%;
            /* min-width: 500px; */
            align-self: center;
            box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
                0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
            border-radius: 7px;
            padding: 40px;
        }

        .hidden {
            display: none;
        }

        #payment-message {
            color: rgb(105, 115, 134);
            font-size: 16px;
            line-height: 20px;
            padding-top: 12px;
            text-align: center;
        }

        #payment-element {
            margin-bottom: 24px;
        }

        /* Buttons and links */
        button {
            background: #5469d4;
            font-family: Arial, sans-serif;
            color: #ffffff;
            border-radius: 4px;
            border: 0;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: block;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
            width: 100%;
        }

        button:hover {
            filter: contrast(115%);
        }

        button:disabled {
            opacity: 0.5;
            cursor: default;
        }

        /* spinner/processing state, errors */
        .spinner,
        .spinner:before,
        .spinner:after {
            border-radius: 50%;
        }

        .spinner {
            color: #ffffff;
            font-size: 22px;
            text-indent: -99999px;
            margin: 0px auto;
            position: relative;
            width: 20px;
            height: 20px;
            box-shadow: inset 0 0 0 2px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }

        .spinner:before,
        .spinner:after {
            position: absolute;
            content: "";
        }

        .spinner:before {
            width: 10.4px;
            height: 20.4px;
            background: #5469d4;
            border-radius: 20.4px 0 0 20.4px;
            top: -0.2px;
            left: -0.2px;
            -webkit-transform-origin: 10.4px 10.2px;
            transform-origin: 10.4px 10.2px;
            -webkit-animation: loading 2s infinite ease 1.5s;
            animation: loading 2s infinite ease 1.5s;
        }

        .spinner:after {
            width: 10.4px;
            height: 10.2px;
            background: #5469d4;
            border-radius: 0 10.2px 10.2px 0;
            top: -0.1px;
            left: 10.2px;
            -webkit-transform-origin: 0px 10.2px;
            transform-origin: 0px 10.2px;
            -webkit-animation: loading 2s infinite ease;
            animation: loading 2s infinite ease;
        }

        @-webkit-keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @media only screen and (max-width: 600px) {
            form {
                width: 80vw;
                min-width: initial;
            }
        }
    </style>

    <!-- Page body -->
    <div class="py-10">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-sm-8 col-lg-8">
                    <form
                        id="payment-form"
                        action="{{ route('frontend.payment.stripe') }}"
                        method="post"
                    >
                        @csrf
                        {{-- <input type="hidden" name="planID" value="{{ $plan->id }}">
                        <input type="hidden" name="couponID" id="coupon">
                        <input type="hidden" name="orderID" value="{{$order_id}}">
                        <input type="hidden" name="payment_method" class="payment-method">
                        <input type="hidden" name="gateway" value="stripe"> --}}
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div id="payment-element">
                                    <!--Stripe.js injects the Payment Element-->
                                </div>

                                <div
                                        class="spinner hidden"
                                        id="spinner"
                                    ></div>

                                <button  id="submit" class="w-full">Pay</button>
                                
                                <div
                                    class="hidden"
                                    id="payment-message"
                                ></div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <p>{{ __('By purchasing you confirm our') }} <a href="{{ url('/') . '/terms' }}">{{ __('Terms and Conditions') }}</a> </p>
                </div>
                
            </div>
        </div>
    </div>
    
    



    <script src="https://js.stripe.com/v3/"></script>
    <script>
    let customer = @json($customer); 

        (() => {
            "use strict";

            const stripe = Stripe(
                "{{ $clientId }}");
            let elements;
            initialize();
            if (!"{{ $paymentIntent['client_secret'] }}".startsWith("set")) {
                checkStatus();
            }
            document.querySelector("#payment-form").addEventListener("submit", handleSubmit);
            async function initialize() {
                const clientSecret = "{{ $paymentIntent['client_secret'] }}";
                elements = stripe.elements({
                    clientSecret
                });
                const paymentElementOptions = {
                    layout: "tabs",
                    business: {
                        name: "{{ config('app.name') }}"
                    },
                };
                const paymentElement = elements.create("payment", paymentElementOptions);
                paymentElement.mount("#payment-element");
            }
            async function handleSubmit(e) {
    e.preventDefault();
    
    const secret = "{{ $paymentIntent['client_secret'] }}";
    let url = `{{ route('frontend.payment.stripe') }}`;                
    if (typeof rewardful !== 'undefined') {
        rewardful('ready', function() {
            if (Rewardful.referral) {
                url = `{{ route('frontend.payment.stripe') }}`;
            }
        });
    }
    
    const confirmParams = {
        elements,
        confirmParams: {
            return_url: url,
            payment_method_data: {
                billing_details: {
                    name: customer.name || 'test',
                    email: customer.email || 'admin@admin.com',
                    phone: customer.phone || '123456789',
                    address: {
                        country: 'USA',
                        city: 'test',
                        line1: customer.address || 'test1',
                        postal_code: '46000',
                        state: 'Texas',
                    }
                }
            },
        },
    };

    const confirmFunction = secret.startsWith("set") ? stripe.confirmSetup : stripe.confirmPayment;

    const { error, paymentIntent } = await confirmFunction(confirmParams);

    if (error) {
        showMessage(error.message);  // Handle the error
    } else if (paymentIntent.status === "succeeded") {
        // Proceed with successful payment, redirect or show success
        showMessage("Payment succeeded!");
    }
}

            async function checkStatus() {
                const clientSecret = "{{ $paymentIntent['client_secret'] }}";
                if (!clientSecret) {
                    return;
                }
                const {
                    paymentIntent
                } = await stripe.retrievePaymentIntent(clientSecret);

                switch (paymentIntent.status) {
                    case "succeeded":
                        showMessage("Payment succeeded!");
                        break;
                    case "processing":
                        showMessage("Your payment is processing.");
                        break;
                    case "requires_payment_method":
                        showMessage("Select a valid payment method to proceed.");
                        break;
                    default:
                        break;
                }
            }

            function showMessage(messageText) {
                const messageContainer = document.querySelector("#payment-message");
                messageContainer.classList.remove("hidden");
                messageContainer.textContent = messageText;
                setTimeout(() => {
                    messageContainer.classList.add("hidden");
                    messageContainer.textContent = "";
                }, 7000);
            }

            function setLoading(isLoading) {
                const submitButton = document.querySelector("#submit");
                const spinner = document.querySelector("#spinner");
                const buttonText = document.querySelector("#button-text");

                submitButton.disabled = isLoading;
                spinner.classList.toggle("hidden", !isLoading);
                buttonText.classList.toggle("hidden", isLoading);
            }

        })();
    </script>
@endsection
