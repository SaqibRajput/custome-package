<?php

    return [
        'account'   =>  [
            'base_uri'  =>  env('ACCOUNTS_SERVICE_BASE_URL', 'http://microservices-gateway.local/'),
            'secret'  =>  env('ACCOUNTS_SERVICE_SECRET', 'wSrCOTIbxjRU8WS5xIj3T8Bk8Xl8o3vN4kfUc11h'),
        ],
        'transaction'   =>  [
            'base_uri'  =>  env('TRANSACTIONS_SERVICE_BASE_URL', 'http://payment-transactions.local/'),
            'secret'  =>  env('TRANSACTIONS_SERVICE_SECRET', 'gnAFEjmcqMC2vAnlrGLAKzIQuYHq7c85Nbl37YMU'),
        ]
    ];
