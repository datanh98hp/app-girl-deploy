<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SettingRepositoryEloquent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    public function getSetting(SettingRepositoryEloquent $settingRepository): \Illuminate\Http\JsonResponse
    {
        $settings =$settingRepository->pluck("value","key")->toArray();
        return response()->json([
            'status' => true,
            'msg' => 'Thông tin app',
            'data'=>$settings
        ], Response::HTTP_OK);
    }
}
