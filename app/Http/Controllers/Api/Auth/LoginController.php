<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginMemberRequest;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /**
     * Đăng nhập
     * @group Auth
     * @queryParam email
     * @queryParam password
     * @response 200 {
     * "status": true,
     * "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYxODUwMTk0NiwiZXhwIjoxNjE4NTA1NTQ2LCJuYmYiOjE2MTg1MDE5NDYsImp0aSI6IklmNTZVQ1hqanNXR01NaFoiLCJzdWIiOjEsInBydiI6IjE4ZjM0M2FmNDdiNDMxZTk4OGJkYzNjNzcwMDRkNzUwMTFiMDBhODcifQ.-I6yC1vZW10Bg2SllTMkcAgNb3ur2JwbkjQh7mZMCqU",
     * "msg": "Login successfully!"
     * }
     *
     * @param LoginMemberRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginMemberRequest $request)
    {
        try {
            if($request->get('user_name')){
                $user_name = ['user_name' => $request->get('user_name'), 'password' => $request->get('password')];
            }

            if($request->get('email')){
                $user_name = ['email' => $request->get('email'), 'password' => $request->get('password')];
            }

            $token = null;
            if (!$token = auth('api')->attempt($user_name)) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Sai mật khẩu hoặc tên tài khoản!',
                ], Response::HTTP_BAD_REQUEST);

            }

//            if ($member->status ==1){
            return response()->json([
                'status' => true,
                'token' => $token,
                'msg' => 'Đăng nhập thành công!',
                'data' => auth('api')->user()
            ], Response::HTTP_OK);
//            }else{
//                return response()->json([
//                    'status' => false,
//                    'token' => $token,
//                    'msg' => 'Tài khoản của bạn chưa được xác thực!',
//                    'data'=>auth('api')->user()
//                ], Response::HTTP_OK);
//            }

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'token' => null,
                'msg' => 'Đăng nhập thất bại!',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
