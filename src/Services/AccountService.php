<?php

    // need to create sub services via controller name
    // to avoid file size increase
    // to face code refactor

    namespace SR\Leads\Services;

    use Illuminate\Http\Request;

    class AccountService extends Service
    {
        public $baseUri;
        public $secret;

        public function __construct()
        {
            parent::__construct();
            $this->baseUri = config('services.account.base_uri');
            $this->secret = config('services.account.secret');
        }

        public function getInfo()
        {
            return $this->callOtherService('GET', '/auth/user-profile');
        }

    }
