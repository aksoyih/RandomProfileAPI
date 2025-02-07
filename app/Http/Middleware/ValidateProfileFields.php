<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateProfileFields
{
    private array $allowedFields = [
        'gender',
        'name',
        'surname',
        'tckn',
        'serialNumber',
        'birthdate',
        'age',
        'titles',
        'email',
        'phone',
        'loginCredentials',
        'miscellaneous',
        'networkInfo',
        'maritalInfo',
        'children',
        'address',
        'bankAccount',
        'images',
        'job'
    ];

    public function getAllowedFields(): array
    {
        return $this->allowedFields;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $fields = $request->query('fields');
        
        if ($fields) {
            $fieldsArray = explode(',', $fields);

            foreach ($fieldsArray as $customField) {
                if (!in_array($customField, $this->allowedFields)) {
                    return response()->json([
                        'error' => 'Invalid field name: ' . $customField
                    ], 400);
                }
            }
        }

        return $next($request);
    }
}
