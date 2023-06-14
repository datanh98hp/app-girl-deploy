<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateMemberRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JWTAuth;

class UserController extends Controller
{

    public function register(Request $request)
    {
        return User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'api_token' => Str::random(60),
        ]);
    }
//    public function login(Request $request)
//    {
//        $login = auth('api_admin')->attempt($request->only(['email','password']));
//        return User::create([
//            'name' => $request->get('name'),
//            'email' => $request->get('email'),
//            'password' => Hash::make($request->get('password')),
//            'api_token' => Str::random(60),
//        ]);
//    }

//        try {
//            $user = auth('api')->user();
//            return response()->json([
//                "status" => true,
//                "msg" => "Profile: " . $user->name,
//                'data' => $user
//            ], Response::HTTP_OK);
//        } catch (\Exception $exception) {
//            return response()->json([
//                "status" => false,
//                "msg" => $exception->getMessage(),
//                'data' => null
//            ], Response::HTTP_BAD_REQUEST);
//        }
//    }
//
    public function profile(){
        $member  = auth('api')->user();
        if (is_object($member)){
            return response()->json([
                "status" => true,
                "msg" => "Thông tin cá nhân của: " . $member->name,
                'data' => $member
            ], Response::HTTP_OK);
        }
        return response()->json([
            "status" => false,
            "msg" => "Tài khoản chưa đăng nhập!",
        ], Response::HTTP_FORBIDDEN);

    }
    public function update(Request $request)
    {
        try {
            $user = auth('api')->user();
            if ($request->hasFile('avatar')) {
                $file_avatar = $request->file('avatar')->store('public/avatars');
                $url_avatar = Storage::url($file_avatar);
                $data['avatar'] = asset($url_avatar);
            }
            if ($request->hasFile('cover_image')) {
                $file_cover_image = $request->file('cover_image')->store('public/avatars');
                $url_cover_image = Storage::url($file_cover_image);
                $data['cover_image'] = asset($url_cover_image);
            }
            $data['name'] = $request->get('name')??$user->name;
            $data['description'] = $request->get('description')??$user->description;
            $data['address'] = $request->get('address')??$user->address;
            $data['user_name'] = $request->get('user_name')??$user->user_name;
            $data['phone'] = $request->get('phone')??$user->phone;
            $data['email'] = $request->get('email')??$user->email;
            $data['birthday'] = $request->get('birthday')??$user->birthday;
            $user->update($data);
            return response()->json([
                "status" => true,
                "msg" => "Chỉnh sửa thông tin cá nhân thành công!",
                'data' => $user
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "msg" => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function Recharge(Request $request){
        try{
            $member  = auth('api')->user();
            $total = $request->price + $member->price;
            $data['price'] = (int)$total;
           
            return response()->json([
                "status" => true,
                "msg" => "Nạp tiền thành công!",
            ], Response::HTTP_OK);
        }catch (\Exception $exception){
            return response()->json([
                "status" => false,
                "msg" => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function Deduct(Request $request){
        try{
            $member  = auth('api')->user();
            if($member->price === 0){
                return response()->json([
                    "status" => false,
                    "msg" => "Tài khoản đã hết tiền!",
                ], Response::HTTP_OK);
            }
            $total = $member->price - $request->price;
            if($total < 0){
                $data['price'] = 0;
                $member->update($data);
            }else{
                $data['price'] = (int)$total;
                $member->update($data);
            }
            return response()->json([
                "status" => true,
                "msg" => "Trừ tiền thành công!",
            ], Response::HTTP_OK);
        }catch (\Exception $exception){
            return response()->json([
                "status" => false,
                "msg" => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
