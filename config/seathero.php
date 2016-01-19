<?php

return [

    'stripe' => [
        /*
         * Length of "free" trial for those who paid up front in the pre-launch
         * phase. This reference, used to update the 'trial_ends_at' in the local
         * 'subscriptions' table, should match exactly what is entered in the
         * Stripe dashboard when creating this subscription plan on the Stripe side.
         */
        'pre_launch_trial_days' => 90,
        'pre_launch_sign_up_price' => 500,           // in cents as per Stripe's docs
		'secret_key'      => 'sk_test_BQokikJOvBiI2HlWgH4olfQ2',
		'publishable_key' => 'pk_test_6pRNASCoBOKtIshFeQd4XMUh'
    ],

    'theaters' => [
        'distance_in_miles' => 10,                  // theaters within this radius
        'max_number_to_display' => 12,              // max how many theaters for a user to choose from
    ],
    
];
