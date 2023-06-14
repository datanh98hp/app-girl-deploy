<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ForgotMemberRequest;
use App\Repositories\MemberRepositoryEloquent;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendMailForgot(ForgotMemberRequest $request, MemberRepositoryEloquent $memberRepository)
    {
       if ($request->has('email') && !empty($request->get('email'))) {
        $member = $memberRepository->where('email', $request->get('email'))->first();
        if (is_object($member)) {
            $member->update(['otp' => random_int(100000, 999999)]);
            Mail::send('api.mail.forgot_password', ['member' => $member], function ($message) use ($member) {
                $message->to($member->email, $member->name)->subject('Forgot password');
            });
            return response()->json([
                "status" => true,
                "msg" => 'Mã OTP đã được gửi tới email của bạn!',
                "otp" => $member->otp
            ], Response::HTTP_OK);
        }
        return response()->json([
            "status" => false,
            "msg" => 'Email này chưa được đăng ký!'
        ], Response::HTTP_BAD_REQUEST);
       }

       return response()->json([
           "status" => false,
           "msg" => 'Bạn chưa nhập Email!'
       ], Response::HTTP_BAD_REQUEST);

    }

    public function reSendMailForgot(Request $request, MemberRepositoryEloquent $memberRepository)
    {
        if ($request->has('email') && !empty($request->get('email'))) {
            $member = $memberRepository->where('email', $request->get('email'))->first();

            if (is_object($member)) {
                $member->update(['otp' => random_int(100000, 999999)]);
                Mail::send('api.mail.resend_forgot_password', ['member' => $member], function ($message) use ($member) {
                    $message->to($member->email, $member->name)->subject('Forgot password');
                });
                return response()->json([
                    "status" => true,
                    "msg" => 'Mã OTP đã được gửi tới email của bạn!',
                    "otp" => $member->otp
                ], Response::HTTP_OK);
            }
            return response()->json([
                "status" => false,
                "msg" => 'Email này chưa được đăng ký!'
            ], Response::HTTP_BAD_REQUEST);
        }
        return response()->json([
            "status" => false,
            "msg" => 'Bạn chưa nhập Email!'
        ], Response::HTTP_BAD_REQUEST);

    }

    public function resetPassword(Request $request, MemberRepositoryEloquent $memberRepository)
    {
        $member = $memberRepository->where('email', $request->get('email'))
            ->where('otp', $request->get('otp'))->first();

        if (is_object($member)) {
            // $member->update(['password' => bcrypt($request->get('password')), 'otp' => random_int(100000, 999999)]);
            $member->update(['password' => bcrypt($request->get('password')), 'otp' => null]);
            return response()->json([
                "status" => true,
                "msg" => 'Tạo mật khẩu mới thành công!',
            ], Response::HTTP_OK);
        }
        return response()->json([
            "status" => false,
            "msg" => "Sai email hoặc mã otp",
        ], Response::HTTP_BAD_REQUEST);
    }
}
