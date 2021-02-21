<?php

namespace App\Services;

use App\Services\BaseService;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ApiService
{
    /**
     * @vars
     */
    protected $client;

    /**
     * ApiService constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri'      => config('app_academic.api.url'),
            'timeout'       => config('app_academic.api.timeout'),
            'http_errors'   => false
        ]);
    }

    /**
     * Analize comment
     * @param $id
     * @return string|mixed
     */
    public function sendIdComment($id)
    {
        // Data for logs
        $data_for_log = [
            'url'       => request()->fullUrl(),
            'IP'        => $_SERVER['REMOTE_ADDR'],
            'message'   => '',
        ];

        try {
            $response = $this->client->post(config('app_academic.api.comment'), [
                'headers' => [
                    'Content-Type'  => 'application/json'
                ],
                'json'    => [
                    'user'          => config('app_academic.api.user'),
                    'comment_id'    => $id,
                    'password'      => config('app_academic.api.password'),
                ]
            ]);

            $response = json_decode($response->getBody()->getContents());
            return $response;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            Log::error('guzzle_connect_exception', $data_for_log + ['message' => $e->getMessage()]);
            return 'Conexión fallida.';
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('guzzle_connection_timeout', $data_for_log + ['message' => $e->getMessage()]);
            return 'Conexión fallida.';
        } catch (\Exception $e) {
            Log::error('guzzle_error', $data_for_log + ['message' => $e->getMessage()]);
            return 'Conexión fallida.';
        }
        return false;
    }
}
