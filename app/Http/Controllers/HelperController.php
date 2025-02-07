<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\ValidateProfileFields;

class HelperController extends Controller
{
    public function index()
    {
        $validateProfileFields = new ValidateProfileFields();

        return response()->json([
            'message' => 'Random Profile API',
            'endpoints' => [
                'methods' => [
                    'GET' => [
                        'Get a random profile' => '/api/profile',
                        'Get multiple profiles' => '/api/profiles/{count}',
                        'Get profiles by gender (male or female)' => '/api/profiles/{gender}/{count}',
                    ]
                ],
                'examples' => [
                    'Get random profile' => '/api/profile',
                    'Get multiple profiles' => '/api/profiles/1',
                    'Get profiles by gender (male)' => '/api/profiles/male/2',
                    'Get profiles by gender (female)' => '/api/profiles/female/2',
                    'Get only name, surname and email' => '/api/profile?fields=name,surname,email'
                ]
            ],
            'query_parameters' => [
                'fields' => [
                    'description' => 'Comma-separated list of fields to include in the response',
                    'example' => '?fields=name,surname,email',
                    'available_fields' => $validateProfileFields->getAllowedFields()
                ]
            ],
            "throttle" => [
                "limit" => 60,
                "expires_in_minutes" => 1
            ]
        ]);
    }
}
