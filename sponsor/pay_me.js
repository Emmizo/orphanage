$(document).ready(function () {
    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // Specify the style of the button

        style: {
            label: 'paypal',
            size: 'medium',    // small | medium | large | responsive
            shape: 'rect',     // pill | rect
            color: 'blue',     // gold | blue | silver | black
            tagline: false
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox: 'ASINkU47Nd24zLI0Bppc1fTJlje_QcDSvVUUi-nfMlyKxg1nYFS90Idf1cu8OV_MU_ykePREpb7yBTW3',
            production: 'AReJbOnTvnSGRKAhL3d7IH1UGp8pZXKZm_SESz1dpuwW6oeoIoZWDe7zhTYLEScHwFWianSQ7rvbstP7'
        },

        payment: function (data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '10', currency: 'USD' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function (payment) {
                // window.alert('Payment Complete!');
                var path = "http://localhost/orphanage/sponsor/Pay.php";
                $.ajax({
                    type: 'POST',
                    url: path,
                    data: {
                        tid: payment.id,
                        state: payment.state
                    },
                    success: function (res) {
                        if (res == "success") {


                            $('#success-payment').html("Payment Done Please wait......");
                            setTimeout(() => {
                                window.location.href = "http://localhost/orphanage/sponsor/index.php";
                            }, 2500);
                        }
                    }
                })

            });
        }

    }, '#paypal-button-container');

});