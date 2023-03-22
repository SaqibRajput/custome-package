<?php

    use GuzzleHttp\Client;

    if (!function_exists('curlRequest'))
    {
        function curlRequest($method, $endPoint, $params = [], $timeOut = 0)
        {
            $response = null;

            try
            {
                $timeOutArray = [
                    'timeout' => $timeOut,
                    'connect_timeout' => $timeOut
                ];

                $client   = new Client($timeOutArray);
                $response = $client->request($method, $endPoint, $params);

            }
            catch (\Exception $e)
            {
                lumenLog('Exception: curlRequest : Start');
                lumenLog('$timeOut: '.$timeOut);
                lumenLog('$method: '.$method);
                lumenLog('$endPoint: '.$endPoint);
                lumenLog('$params: '.json_encode($params));
                lumenLog($e->getLine().' - '.$e->getMessage());
                lumenLog('Exception: curlRequest : End');
            }

            return $response;
        }
    }

    if (! function_exists('lumenLog'))
    {
        function lumenLog($message)
        {
            \Log::info($message);
        }
    }
