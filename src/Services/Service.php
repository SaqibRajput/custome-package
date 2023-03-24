<?php

    namespace SR\Leads\Services;

    use GuzzleHttp\Client;

    use App\Http\Controllers\AuthenticatateController;

    class Service
    {
        public $timeOut;
        public $secret;

        public function __construct()
        {
            $this->timeOut = env("SERVICE_TIME_OUT", 30);
        }

        public function callOtherService($method, $requestUrl, $formParams = [], $headers = [])
        {
            $response = null;

            try
            {
                $timeOutArray = [
                    'timeout' => $this->timeOut,
                    'connect_timeout' => $this->timeOut
                ];

                $endPoint = $this->baseUri.$requestUrl;
                $headers['service-secret-token'] = $this->secret;

                if(!empty($_SERVER['HTTP_AUTHORIZATION']) && !isset($headers['authorization'])) {
                    $headers['authorization'] = $_SERVER['HTTP_AUTHORIZATION'];
                }

                $requestData = [
                    'form_params' => $formParams,
                    'headers'     => $headers
                ];

                $client   = new Client($timeOutArray);
                $curlResponse = $client->request($method, $endPoint, $requestData);

                $response = $curlResponse->getBody()->getContents();

                // check response is json to decode
                // $response = (isJson($content)) ? json_decode($content, true) : $content;

                lumenLog(json_decode($response, true));

            }
            catch (\Exception $ex)
            {
                // response set as null to handle same in all project.

                lumenLog('Exception: callOtherService : Start');
                lumenLog('$timeOut: '.$this->timeOut);
                lumenLog('$method: '.$method);
                lumenLog('$endPoint: '.$endPoint);
                lumenLog('$params: '.json_encode($requestData));
                lumenLog($ex->getLine().' - '.$ex->getMessage());
                // lumenLog($ex->getTrace());
                lumenLog('Exception: callOtherService : End');
            }

            return $response;
        }

        public function HeaderValues($method)
        {
            $auth = new AuthenticatateController();
            return '';
        }
        
    }
