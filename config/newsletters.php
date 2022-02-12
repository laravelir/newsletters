<?php

// config file for laravelir/newsletters
return [
    /**
     * driver
     *
     * available drivers: smtp, mailtrap,
     */
    'driver' => '',


    'email' => [
        'from' => 'email@email.com',
    ],

    /**
     * resend count when message failed
     */
    'retry' => 3,
];
