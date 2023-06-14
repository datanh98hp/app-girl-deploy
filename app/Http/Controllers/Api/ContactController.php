<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Contact\CreateFindRequest;
use App\Http\Requests\Api\Contact\CreateRequest;
use App\Http\Requests\Api\Contact\UpdateRequest;
use App\Repositories\ContactRepositoryEloquent;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Danh sách
     * @group Liên hệ
     * @response 200{
     * "status": true,
     * "msg": "Danh sách liên hệ",
     * "data": [
     * {
     * "id": 2,
     * "member_id": 7,
     * "name": "Câu hỏi 16",
     * "email": "esmeralda.boehm@example.net",
     * "phone": 236597896,
     * "content": "Nội dung 7",
     * "status": 1,
     * "created_at": "2021-04-26 02:38:38",
     * "updated_at": "2021-04-26 02:38:38"
     * },
     * {
     * "id": 1,
     * "member_id": 8,
     * "name": "Câu hỏi 13",
     * "email": "katelin69@example.net",
     * "phone": 501574981,
     * "content": "Nội dung 4",
     * "status": 1,
     * "created_at": "2021-04-26 02:38:38",
     * "updated_at": "2021-04-26 02:38:38"
     * }
     * ]
     * }
     *
     *
     * @param ContactRepositoryEloquent $contactRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(ContactRepositoryEloquent $contactRepository)
    {
        $contacts = $contactRepository->orderBy('id', 'desc')->get();
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách liên hệ',
            'data' => $contacts
        ], Response::HTTP_OK);
    }

    /**
     * Thêm mới
     * @group Liên hệ
     * @response 200 {
     * "status": true,
     * "msg": "Thêm mới thành công!",
     * "data": {
     * "name": "hoir casi",
     * "member_id": "2",
     * "email": "a@gmail.com",
     * "phone": "123456789",
     * "content": "content",
     * "status": "1",
     * "updated_at": "2021-04-28 13:54:18",
     * "created_at": "2021-04-28 13:54:18",
     * "id": 41
     * }
     * }
     *
     * @param ContactRepositoryEloquent $contactRepository
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function sendContact(ContactRepositoryEloquent $contactRepository, CreateRequest $request)
    {
        try {
            $data['name'] = $request->get('name');
            $data['email'] = $request->get('email');
            $data['phone'] = $request->get('phone');
            $data['address'] = $request->get('address');
            $data['content'] = $request->get('content');
            $data['status'] = 0;
            $contact = $contactRepository->create($data);
            return response()->json([
                'status' => true,
                'msg' => 'Gửi liên hệ thành công!',
                'data' => $contact,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'msg' => 'Gửi liên hệ thất bại!',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function sendContactFindProduct(ContactRepositoryEloquent $contactRepository, CreateFindRequest $request)
    {
        try {
            $data['name'] = $request->get('name');
            $data['content'] = $request->get('content');
            $data['member_id'] = auth('api')->id();
            $data['phone'] = $request->get('phone');
            $data['type'] = 2;
            $data['status'] = 0;
            $contact = $contactRepository->create($data);
            Mail::send('api.mail.find_product', ['contacts' => $data], function ($message) use ($request) {
                $message->to("binhyentranvu@gmail.com")->subject('Tìm sản phẩm!');
            });
            return response()->json([
                'status' => true,
                'msg' => 'Gửi yêu cầu thành công!',
                'data' => $contact,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'msg' => 'Gửi yêu cầu thất bại!',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Chi tiết
     * @group Liên hệ
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Chỉnh sửa liên hệ: Câu hỏi 13",
     * "data": {
     * "id": 1,
     * "member_id": 8,
     * "name": "Câu hỏi 13",
     * "email": "katelin69@example.net",
     * "phone": 501574981,
     * "content": "Nội dung 4",
     * "status": 1,
     * "created_at": "2021-04-26 02:38:38",
     * "updated_at": "2021-04-26 02:38:38",
     * "member": null
     * }
     * }
     *
     *
     *
     * @param $id
     * @param ContactRepositoryEloquent $contactRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUpdate($id, ContactRepositoryEloquent $contactRepository)
    {
        $contact = $contactRepository->with(['member'])->find($id);
        if (is_object($contact)) {
            return response()->json([
                'status' => true,
                'msg' => 'Chỉnh sửa liên hệ: ' . $contact->name,
                'data' => $contact
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy liên hệ!',
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Chỉnh sửa
     * @group Liên hệ
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Cập nhật thành công!",
     * "data": {
     * "id": 1,
     * "member_id": "2",
     * "name": "hoir casi update",
     * "email": "a@gmail.com",
     * "phone": "123456789",
     * "content": "content",
     * "status": "1",
     * "created_at": "2021-04-26 02:38:38",
     * "updated_at": "2021-04-28 14:00:06"
     * }
     * }
     *
     *
     *
     * @param $id
     * @param ContactRepositoryEloquent $contactRepository
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate($id, ContactRepositoryEloquent $contactRepository, UpdateRequest $request)
    {
        $contact = $contactRepository->find($id);
        if (is_object($contact)) {
            $data['name'] = $request->get('name');
            $data['member_id'] = $request->get('member_id');
            $data['email'] = $request->get('email');
            $data['phone'] = $request->get('phone');
            $data['content'] = $request->get('content');
            $data['status'] = $request->get('status');
            $contact->update($data);
            $categories = $request->get('categories');
            if (is_array($categories) && !empty($categories)) {
                $contact->categories()->sync($categories);
            }
            return response()->json([
                'status' => true,
                'msg' => 'Cập nhật thành công!',
                'data' => $contact
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Cập nhật thất bại!'
        ], Response::HTTP_BAD_REQUEST);

    }

    /**
     * Xóa
     * @group Liên hệ
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Xóa thành công!"
     * }
     *
     *
     *
     * @param $id
     * @param ContactRepositoryEloquent $contactRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function postDelete($id, ContactRepositoryEloquent $contactRepository)
    {
        $contact = $contactRepository->find($id);
        if (is_object($contact)) {
            $contact->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Xóa thành công!',
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => "Xóa thất bại",
        ], Response::HTTP_BAD_REQUEST);
    }
}
