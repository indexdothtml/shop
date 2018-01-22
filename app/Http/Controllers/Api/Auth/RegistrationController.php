<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    private const BAD_REQUEST = 500;
    private const SUCCESS = 200;

    private $rules = [
        'phone' => 'required|phone:RU,UA,BY|unique:users,phone',
        'password' => 'required|string|min:6'
    ];

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        return $this->register($request);
    }

    /**
     * Register
     *
     * @param Request $request
     * @return JsonResponse
     */
    private function register(Request $request) : JsonResponse
    {
        $validate = $this->validate($request->all());

        if ($validate->failed()) return $this->validationErrorResponse($validate);

        try {
            $this->reg($request->except('_token'));
        } catch (\Exception $e) {
            return $this->regErrorResponse($e->getMessage());
        }

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
     * Create user with given credentials and authenticate
     *
     * @param array $data
     * @return bool
     */
    private function reg(Array $data) : bool
    {
        $user = User::create($data);

        return auth()->login($user);
    }

    /**
     * Return error response with validation errors
     *
     * @param Validator $validator
     * @return JsonResponse
     */
    private function validationErrorResponse(Validator $validator) : JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => $validator->getMessageBag()
        ], self::BAD_REQUEST);
    }

    /**
     * Return error response with reg's errors
     *
     * @param string $message
     * @return JsonResponse
     */
    private function regErrorResponse(string $message) : JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => [$message]
        ]);
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
