<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterMemberRequest;
use App\Repositories\MemberRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Đăng ký
     * @group Auth
     * @queryParam name
     * @queryParam email
     * @queryParam password
     * @queryParam password_confirmation
     * @response 200 {
     * "status": true,
     * "msg": "Đăng ký thành công! Vui lòng kiểm tra email của bạn để xác thực tài khoản!",
     * "data": {
     * "name": "cong trinh",
     * "email": "congtrinh17111992@gmail.com",
     * "password": "11111111",
     * "status": 0,
     * "otp": 1619271832
     * }
     * }
     * @param RegisterMemberRequest $request
     * @param MemberRepositoryEloquent $memberRepository
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    protected function register(RegisterMemberRequest $request, MemberRepositoryEloquent $memberRepository)
    {
        // try {
            $memberRepository->create([
                'name' => $request->get('name'),
                'user_name' => $request->get('user_name'),
                'email' => $request->get('email'),
                'birthday' => $request->get('birthday') ? $request->get('birthday') : null,
                'status' => 1,
                'password' => bcrypt($request->get('password')),
            ]);
//            Mail::send('api.mail.register', ['member' => $member], function ($message) use ($request) {
//                $message->to($request->get('email'), 'Visitor')->subject('Xác minh email!');
//            });
            return response()->json([
                'status' => true,
                'msg' => 'Đăng ký thành công!',
                'data' => [
                    'name' => $request->get('name'),
                    'user_name' => $request->get('user_name'),
                    'email' => $request->get('email'),
                    'birthday' => $request->get('birthday') ? $request->get('birthday') : null,
                    'password' => $request->get('password'),
                    'status' => 1,
                ]
            ], Response::HTTP_OK);
        // }catch (\Exception $exception){
        //     return response()->json([
        //         'status' => false,
        //         'msg' => 'Đăng ký thất bại!',
        //     ], Response::HTTP_BAD_REQUEST);
        // }
    }

    /**
     * Xác thực OTP
     * @group Auth
     * @queryParam otp
     * @response 200 {
     * "status": true,
     * "msg": "Xác thực thành công!"
     * }
     * @param Request $request
     * @param MemberRepositoryEloquent $memberRepository
     * @return \Illuminate\Http\JsonResponse
     */
   protected function confirmRegister(Request $request, MemberRepositoryEloquent $memberRepository)
   {
       $otp = $request->get('otp');
       $email = $request->get('email');
       $member = $memberRepository->where('otp', $otp)->where('email', $email)->first();
       if (is_object($member)) {
           $member->update(['status' => 1, 'otp' => $request->get('otp')]);
           return response()->json([
               'status' => true,
               'msg' => 'Xác thực thành công',
           ], Response::HTTP_OK);
       }
       return response()->json([
           'status' => false,
           'msg' => 'Xác thực không thành công!',
       ], Response::HTTP_BAD_REQUEST);
   }

   protected function resendOtp(Request $request, MemberRepositoryEloquent $memberRepository)
   {
       $email = $request->get('email');
       $member = $memberRepository->where('status', 0)->where('email', $email)->first();
       if (is_object($member)) {
           $member->update(['otp' => random_int(100000, 999999)]);
           Mail::send('api.mail.register_resend', ['member' => $member], function ($message) use ($request) {
               $message->to($request->get('email'), 'Visitor')->subject('Xác minh email!');
           });
           return response()->json([
               'status' => true,
               'msg' => 'Đã gửi lại OTP! Vui lòng kiểm tra email!',
               'data' => [
                   'name' => $member->name,
                   'email' => $member->email,
                   'phone' => $member->phone,
                   'birthday' => $member->birthday,
                   'status' => 0,
                   'otp' => $member->otp,
               ]
           ], Response::HTTP_OK);
       }

       return response()->json([
           'status' => false,
           'msg' => 'Tài khoản chưa tồn tại!',
       ], Response::HTTP_BAD_REQUEST);
   }
}
