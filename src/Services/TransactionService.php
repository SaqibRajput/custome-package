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

        /* Authenticate Controller */
        // create new api for internal services call

        public function deleteIncompleteSignup($companyId)
        {
            $param = ['company_id' => $companyId];
            return $this->callOtherService('POST', 'account/delete-incomplete-signup', $param);
        }

        // need to fix this function
        public function getCompaniesListByDomain($email)
        {
            $param = ['email' => $email];
            return $this->callOtherService('POST', 'account/companies-list-by-domain', $param);
        }
        // create new api for internal services call

    }
