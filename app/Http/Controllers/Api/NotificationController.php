<?php

namespace App\Http\Controllers\Api;

use App\Entities\Notification;
use App\Http\Controllers\Controller;
use App\Repositories\NotificationRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationController extends Controller
{
    /**
     * Danh sách
     * @group Thông báo
     * @response 200 {
     * "status": true,
     * "msg": "Danh sách thông báo",
     * "data": [
     * {
     * "id": 1,
     * "post_id": 6,
     * "product_id": 19,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "post": {
     * "id": 6,
     * "name": "Post 7",
     * "slug": "post-68795",
     * "image": "/storage/posts/8jpg",
     * "description": "Mô tả 20",
     * "content": "Nội dung Post 7",
     * "views": 1270,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05"
     * },
     * "product": {
     * "id": 19,
     * "code": "3774",
     * "name": "product 2628",
     * "slug": "product-5739-2875",
     * "description": "Mô tả 4127",
     * "content": "Nội dung 8401",
     * "image": "/storage/products/2103jpg",
     * "images": "[\"\\/storage\\/products\\/gdUi1VzDkAxArwVRN1TYhoPxHvxw7PejM80CY3Rx.jpg\",\"\\/storage\\/products\\/9YpYHPebNX8azYgsRJO0DwlKdGWz8kKI6ytWJxT2.jpg\"]",
     * "price": 1000000,
     * "brand_id": 20,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03"
     * }
     * }
     * ]
     * }
     *
     *
     *
     * @param NotificationRepositoryEloquent $notificationRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(NotificationRepositoryEloquent $notificationRepository)
    {
        try {
            $notifications = $notificationRepository->with(['post'])->orderBy('id', 'desc')->get();
            return response()->json([
                'status' => true,
                'msg' => 'Danh sách thông báo',
                'data' => $notifications
            ], Response::HTTP_OK);
        }catch (\Exception $exception){
            return response()->json([
                'status' => false,
                'msg' => 'Có lỗi xảy ra!'
            ], Response::HTTP_OK);
        }
    }

    /**
     * Thêm mới
     * @group Thông báo
     * @response 200 {
     * "status": true,
     * "msg": "Thêm mới thành công!",
     * "data": {
     * "post_id": "2",
     * "product_id": "1",
     * "status": "1",
     * "updated_at": "2021-04-28 14:14:38",
     * "created_at": "2021-04-28 14:14:38",
     * "id": 21
     * }
     * }
     * @param NotificationRepositoryEloquent $notificationRepository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postAdd(NotificationRepositoryEloquent $notificationRepository, Request $request)
    {
        $data['post_id'] = $request->get('post_id');
        $data['product_id'] = $request->get('product_id');
        $data['status'] = $request->get('status');
        $notification = $notificationRepository->create($data);
        return response()->json([
            'status' => true,
            'msg' => 'Thêm mới thành công!',
            'data' => $notification,
        ], Response::HTTP_OK);
    }

    /**
     * Chi tiết
     * @group Thông báo
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Chỉnh sửa thông báo!",
     * "data": {
     * "id": 1,
     * "post_id": 6,
     * "product_id": 19,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "product": {
     * "id": 19,
     * "code": "3774",
     * "name": "product 2628",
     * "slug": "product-5739-2875",
     * "description": "Mô tả 4127",
     * "content": "Nội dung 8401",
     * "image": "/storage/products/2103jpg",
     * "images": "[\"\\/storage\\/products\\/gdUi1VzDkAxArwVRN1TYhoPxHvxw7PejM80CY3Rx.jpg\",\"\\/storage\\/products\\/9YpYHPebNX8azYgsRJO0DwlKdGWz8kKI6ytWJxT2.jpg\"]",
     * "price": 1000000,
     * "brand_id": 20,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03"
     * },
     * "post": {
     * "id": 6,
     * "name": "Post 7",
     * "slug": "post-68795",
     * "image": "/storage/posts/8jpg",
     * "description": "Mô tả 20",
     * "content": "Nội dung Post 7",
     * "views": 1270,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05"
     * }
     * }
     * }
     *
     *
     * @param $id
     * @param NotificationRepositoryEloquent $notificationRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUpdate($id, NotificationRepositoryEloquent $notificationRepository)
    {
        $notification = $notificationRepository->with(['product','post'])->find($id);
        if (is_object($notification)) {
            return response()->json([
                'status' => true,
                'msg' => 'Chỉnh sửa thông báo!',
                'data' => $notification,
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy thông báo',
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Chỉnh sửa
     * @group Thông báo
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Chỉnh sửa thành công!",
     * "data": {
     * "id": 1,
     * "post_id": "1",
     * "product_id": "2",
     * "status": "1",
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-28 14:20:27"
     * }
     * }
     * @param $id
     * @param NotificationRepositoryEloquent $notificationRepository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate($id, NotificationRepositoryEloquent $notificationRepository, Request $request)
    {
        $notification = $notificationRepository->find($id);
        if (is_object($notification)) {
            $data['post_id'] = $request->get('post_id');
            $data['product_id'] = $request->get('product_id');
            $data['status'] = $request->get('status');
            $notification->update($data);
            return response()->json([
                'status' => true,
                'msg' => 'Chỉnh sửa thành công!',
                'data' => $notification,
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy thông báo'
        ], Response::HTTP_BAD_REQUEST);

    }

    /**
     * Xóa
     * @group Thông báo
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Xóa thành công!"
     * }
     *
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postDelete($id)
    {
        $notification = Notification::find($id);
        if (is_object($notification)) {
            $notification->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Xóa thành công!'
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => "Thất bại",
        ], Response::HTTP_BAD_REQUEST);

    }
}
