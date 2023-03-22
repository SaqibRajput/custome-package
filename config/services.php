<?php

    return [
        'account'   =>  [
            'base_uri'  =>  env('ACCOUNTS_SERVICE_BASE_URL', 'http://microservices-gateway.local/'),
            'secret'  =>  env('ACCOUNTS_SERVICE_SECRET', 'qB20xFEIaSEW8ZAsEimIIn7mBA0x68LB0TcER1FE'),
        ],
        'transaction'   =>  [
            'base_uri'  =>  env('TRANSACTIONS_SERVICE_BASE_URL', 'http://payment-transactions.local/'),
            'secret'  =>  env('TRANSACTIONS_SERVICE_SECRET', 'qB20xFEIaSEW8ZAsEimIIn7mBA0x68LB0TcER1FE'),
        ]
    ];
