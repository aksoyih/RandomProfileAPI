<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function stats()
    {
        $totalRequests = Log::count();
        $totalProfiles = Log::sum('nProfiles');
        $uniqueUsers = Log::distinct('ip')->count('ip');

        $genderStats = Log::select(
            'gender',
            DB::raw('COUNT(*) as requests'),
            DB::raw('SUM(nProfiles) as profiles')
        )
        ->whereNotNull('gender')
        ->groupBy('gender')
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item->gender => [
                'requests' => $item->requests,
                'profiles' => $item->profiles
            ]];
        })
        ->toArray();

        // Ensure all gender categories exist in response
        $genderBreakdown = array_merge([
            'female' => ['requests' => 0, 'profiles' => 0],
            'male' => ['requests' => 0, 'profiles' => 0],
            'random' => ['requests' => 0, 'profiles' => 0],
        ], $genderStats);

        return response()->json([
            'total_requests' => $totalRequests,
            'total_profiles_generated' => $totalProfiles,
            'unique_users' => $uniqueUsers,
            'gender_breakdown' => $genderBreakdown
        ]);
    }
}
