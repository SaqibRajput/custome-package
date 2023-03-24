<?php
    /**
     * Developed by Saqib Rajput.
     * Email: rajput.saqib@hotmail.com
     * Mobile: 00-92-300-6710419
     * Date: 12/01/2022
     * Time: 15:16
     */

    namespace SR\Leads\Services;

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

        public function bankCreate($params)
        {
            return $this->callOtherService('POST', 'bank/create', $params);
        }

        public function bankGet($params)
        {
            return $this->callOtherService('GET', 'bank/get', $params);
        }

        public function bankStatusChange($params)
        {
            return $this->callOtherService('PUT', 'bank/status-change', $params);
        }

        public function bankDelete($params)
        {
            return $this->callOtherService('DELETE', 'bank/delete', $params);
        }

        public function paymentTransactionsHistory($userId)
        {
            return $this->callOtherService('GET', "payment/transactions-history/$userId");
        }

    }
