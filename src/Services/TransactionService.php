<?php
    /**
     * Developed by Saqib Rajput.
     * Email: rajput.saqib@hotmail.com
     * Mobile: 00-92-300-6710419
     * Date: 12/01/2022
     * Time: 15:16
     */

    namespace SR\Leads\Services;

    use Illuminate\Http\Request;

    class TransactionService extends Service
    {
        public $baseUri;
        public $secret;

        public function __construct()
        {
            parent::__construct();
            $this->baseUri = config('services.transaction.base_uri');
            $this->secret  = config('services.transaction.secret');
        }

        public function HelloWorld($request)
        {
            return $this->callOtherService('GET', 'hello-world', $request);
        }

        public function paymentTransactionsHistory($userId)
        {
            return $this->callOtherService('GET', 'payment-transactions-history', $userId);
        }

    }
