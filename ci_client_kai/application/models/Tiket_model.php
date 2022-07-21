<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Tiket_model extends CI_Model
{

    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/rest_server_kai/tiket/tkt',
            // You can set any number of default request options.
            'auth'  => ['ulbi', 'pemrograman3'],
        ]);
    }

    public function getAll()
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'kai'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }
    public function getById($id_tiket)
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'KEY' => 'kai',
                'id_tiket' => $id_tiket
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }
    public function save($data)
    {
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function update($data)
    {
        $response = $this->_guzzle->request('PUT', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function delete($id_tiket)
    {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
                'http_errors' => false,
                'KEY' => 'kai',
                'id_tiket' => $id_tiket
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}
