<?php

namespace App\Services\V1\GateWayRequest;

use App\Traits\ConsumesExternalService;

class GateWayRequest
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Departments service
     * @var string
     */
    public $baseUri;

    /**
     * The username for Oauth2 Passport
     * @var string
     */
    public $username;

    /**
     * The password for Oauth2 Passport
     * @var string
     */
    public $password;

    public function __construct()
    {
        $this->baseUri = config('services.api_gateway.base_uri');
        $this->username = config('services.api_username.username');
        $this->password = config('services.api_password.password');
    }

    /**
     * Check the user credinatial and obtian token
     * @return string
     */
    public function obtainToken()
    {
        $data['username'] = $this->username;
        $data['password'] = $this->password;

        return json_decode($this->performRequest('POST', 'gateway/users/sign-in', $data));
    }

    /**
     * Obtain the full list of  Departments 
     * @return string
     */
    public function obtainDepartments()
    {
        $access_token['Authorization']['Bearer Token'] = "Bearer" . " " . $this->obtainToken()->access_token;
        dd($access_token);
        $dummy[]= "dummy";
        $data = json_decode($this->performRequest('GET', 'gateway/departments', $dummy, $access_token));

        return collect($data->data);
    }
}
