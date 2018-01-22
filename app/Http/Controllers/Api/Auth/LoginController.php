<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    private const BAD_REQUEST = 500;
    private const UNAUTHORIZED = 401;
    private const SUCCESS = 200;

    private $rules = [
        'phone' => 'required|phone:RU,UA,BY',
        'password' => 'required|string|min:6'
    ];

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        return $this->login($request);
    }

    /**
     * Login
     *
     * @param Request $request
     * @return JsonResponse
     */
    private function login(Request $request) : JsonResponse
    {
        $validate = $this->validate($request->all());

        if ($validate->failed()) return $this->validationErrorResponse($validate);

        if (!$this->auth($request->except('_token'))) return $this->authErrorResponse();

        return $this->successResponse();
    }

    /**
     * Validate request
     *
     * @param array $data
     * @return Validator
     */
    private function validate(Array $data) : Validator
    {
        return validator($data, $this->rules, $this->messages ?? []);
    }

    /**
     * Authenticate with given credentials
     *
     * @param array $data
     * @return bool
     */
    private function auth(Array $data) : bool
    {
        return auth()->attempt($data);
    }

    /**
     * Return error response with validation's errors
     *
     * @param Validator $validator
     * @return \Illuminate\Http\JsonResponse
     */
    private function validationErrorResponse(Validator $validator) : JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => $validator->getMessageBag()
        ], self::BAD_REQUEST);
    }

    /**
     * Return auth error response
     *
     * @return JsonResponse
     */
    private function authErrorResponse() : JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => [Lang::get('auth.failed')]
        ], self::UNAUTHORIZED);
    }

    /**
     * Return success response
     *
     * @return JsonResponse
     */
    private function successResponse() : JsonResponse
    {
        return response()->json([
            'success' => true
        ], self::SUCCESS);
    }
}
