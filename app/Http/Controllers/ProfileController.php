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

    public function profile(Request $request, $gender = null): \Illuminate\Http\JsonResponse
    {
        if($gender === null) {
            $genders = ['male', 'female'];
            $gender = $genders[array_rand($genders)];
        }

        $fields = $request->query('fields');
        if ($fields) {
            $fieldsArray = explode(',', $fields);
            $profile = $this->factory->generate(fields: $fieldsArray, gender: $gender);
        } else {
            $profile = $this->factory->generate(gender: $gender);
        }

        return response()->json($profile);
    }

    public function profiles(Request $request, $nProfiles, $gender = null): \Illuminate\Http\JsonResponse
    {
        if($gender === null) {
            $genders = ['male', 'female'];
            $gender = $genders[array_rand($genders)];
        }

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
