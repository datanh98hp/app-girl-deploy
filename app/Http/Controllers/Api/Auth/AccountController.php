<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;

class AccountController extends Controller
{
    /**
     * Đăng xuất
     * @group Auth
     * @queryParam token
     * @response 200 {
     * "status": true,
     * "message": "Đăng xuất thành công!"
     * }
     */
    public function logout(Request $request)
    {
        try {
            $this->validate($request, [
                'token' => 'required'
            ]);
            auth('api')->logout();
            return response()->json([
                'status' => true,
                'message' => 'Đăng xuất thành công!'
            ], Response::HTTP_OK);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Không thể đăng xuất'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Đổi mật khẩu
     * @group Auth
     * @queryParam old_password
     * @queryParam new_password
     * @queryParam confirm_password
     * @queryParam token
     * @response 200 {
     * "status": true,
     * "msg": "Đổi mật khẩu thành công!"
     * }
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function change(ChangePasswordRequest $request)
    {
        try {
            $user = auth('api')->user();
            if ((Hash::check($request->get('old_password'), $user->password)) == false) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Mật khẩu không đúng',
                ], Response::HTTP_BAD_REQUEST);
            } else if ((Hash::check(request('new_password'), $user->password)) == true) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Mật khẩu mới không được giống với mật khẩu hiện tại',
                ], Response::HTTP_BAD_REQUEST);
            } else {
                $user->update(['password' => Hash::make($request->get('new_password'))]);
                return response()->json([
                    'status' => true,
                    'msg' => 'Đổi mật khẩu thành công!',
                ], Response::HTTP_OK);
            }
        } catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            } else {
                $msg = $ex->getMessage();
            }
            return response()->json([
                'status' => false,
                'msg' => $msg,
            ], Response::HTTP_BAD_REQUEST);
        }
    }

}
