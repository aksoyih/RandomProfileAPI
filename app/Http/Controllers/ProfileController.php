<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aksoyih\RandomProfile\Factory\RandomProfileFactory;

class ProfileController extends Controller
{
    private RandomProfileFactory $factory;
    public function __construct()
    {
        $this->factory = new RandomProfileFactory();
    }

    public function profile(Request $request, $gender): \Illuminate\Http\JsonResponse
    {
        $fields = $request->query('fields');
        if ($fields) {
            $fieldsArray = explode(',', $fields);
            $profile = $this->factory->generate(fields: $fieldsArray, gender: $gender);
        } else {
            $profile = $this->factory->generate(gender: $gender);
        }

        return response()->json($profile);
    }

    public function profiles(Request $request, $gender, $nProfiles): \Illuminate\Http\JsonResponse
    {
        $fields = $request->query('fields');
        if ($fields) {
            $fieldsArray = explode(',', $fields);
            $multiProfiles = $this->factory->generateMultiple(count: $nProfiles, fields: $fieldsArray, gender: $gender);
        } else {
            $multiProfiles = $this->factory->generateMultiple(count: $nProfiles, gender: $gender);
        }

        return response()->json($multiProfiles);
    }
}
