<?php

namespace App\Http\Controllers\Api;

use App\Entities\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Page\CreateRequest;
use App\Http\Requests\Api\Page\UpdateRequest;
use App\Repositories\PageRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{
    /**
     * Danh sách
     * @group Trang
     * @response 200 {
     * "status": true,
     * "msg": "Danh sách trang",
     * "data": [
     * {
     * "id": 1,
     * "name": "Liên hệ",
     * "slug": "xe-o-to-1",
     * "content": "content",
     * "status": 1,
     * "created_at": "2021-04-14 14:49:23",
     * "updated_at": "2021-04-14 14:49:23"
     * }
     * ]
     * }
     *
     *
     * @param PageRepositoryEloquent $pageRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(PageRepositoryEloquent $pageRepository)
    {
        $pages = $pageRepository->orderBy('id','desc')->get();
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách trang',
            'data' => $pages
        ], Response::HTTP_OK);
    }

    /**
     * Thêm mới
     * @group Trang
     * @response 200 {
     * "status": true,
     * "msg": "Thêm mới thành công!",
     * "data": {
     * "name": "Liên hệ",
     * "slug": "xe-o-to-1",
     * "content": "content",
     * "status": "1",
     * "updated_at": "2021-04-28 14:36:10",
     * "created_at": "2021-04-28 14:36:10",
     * "id": 21
     * }
     * }
     *
     *
     * @param PageRepositoryEloquent $pageRepository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postAdd(PageRepositoryEloquent $pageRepository, CreateRequest $request)
    {
        try {
            $data['name'] = $request->get('name');
            $data['slug'] = $request->get('slug');
            $data['content'] = $request->get('content');
            $data['status'] = $request->get('status');

            $page = $pageRepository->create($data);

            return response()->json([
                'status' => true,
                'msg' => 'Thêm mới thành công!',
                'data' => $page
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'msg' => 'Thêm mới thất bại'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Chi tiết
     * @group Trang
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Chỉnh sửa trang: Page 11",
     * "data": {
     * "id": 1,
     * "name": "Page 11",
     * "slug": "page-171658",
     * "content": "Nội dung page 1",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05"
     * }
     * }
     *
     *
     * @param $id
     * @param PageRepositoryEloquent $pageRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUpdate($id)
    {
        $page = Page::find($id);
        if (is_object($page)) {
            return response()->json([
                'status' => true,
                'msg' => 'Chi tiết trang: ' . $page->name,
                'data' => $page,
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy trang!'
        ], Response::HTTP_BAD_REQUEST);

    }

    /**
     * Chỉnh sửa
     * @group Trang
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Chỉnh sửa thành công!",
     * "data": {
     * "id": 1,
     * "name": "Xe tay gaa",
     * "slug": "moo-tar",
     * "content": "noi dung",
     * "status": "1",
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-28 14:38:46"
     * }
     * }
     *
     * @param $id
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate($id, UpdateRequest $request)
    {
        $page = Page::find($id);
        if (is_object($page)) {
            $data['name'] = $request->get('name');
            $data['slug'] = $request->get('slug');
            $data['content'] = $request->get('content');
            $data['status'] = $request->get('status');
            $page->update($data);
            return response()->json([
                'status' => true,
                'msg' => 'Chỉnh sửa thành công!',
                'data' => $page,
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => "Chỉnh sửa thất bại!!"
        ], Response::HTTP_BAD_REQUEST);

    }

    /**
     * Xóa
     * @group Trang
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Xóa thành công!!"
     * }
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postDelete($id)
    {
        $page = Page::find($id);
        if (is_object($page)) {
            $page->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Xóa thành công!!'
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => "Xóa thất bại"
        ], Response::HTTP_BAD_REQUEST);

    }
}
