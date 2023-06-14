<?php

namespace App\Http\Controllers\Api;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\CreateRequest;
use App\Http\Requests\Api\Category\UpdateRequest;
use App\Repositories\CategoryRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Danh sách
     * @group Chuyên mục
     * @response 200 {
     * "id": 2,
     * "name": "Chuyên mục 8810",
     * "image": "/storage/categories/7304jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 1
     * },
     * {
     * "id": 1,
     * "name": "Chuyên mục 1206",
     * "image": "/storage/categories/7640jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * }
     * ]
     * }
     *
     *
     *
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(CategoryRepositoryEloquent $categoryRepository)
    {
        $categories = $categoryRepository->orderBy('id', 'desc')->get();
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách chuyên mục',
            'data' => $categories
        ], Response::HTTP_OK);
    }

    /**
     * Thêm mới
     * @group Chuyên mục
     * @response 200 {
     * "status": true,
     * "msg": "Thêm mới chuyên mục thành công!",
     * "data": {
     * "image": "http://127.0.0.1:8000/storage/categories/vl5ypsWHlAGlIemuTZncZDNkCNPq3pEXK9Ta6AB6.jpg",
     * "name": "Xe o to",
     * "status": "1",
     * "type": "1",
     * "updated_at": "2021-04-28 13:38:02",
     * "created_at": "2021-04-28 13:38:02",
     * "id": 21
     * }
     * }
     *
     *
     *
     * @param CategoryRepositoryEloquent $categoryRepository
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postAdd(CategoryRepositoryEloquent $categoryRepository, CreateRequest $request)
    {
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image')->store('public/categories');
        //     $url = Storage::url($file);
        //     $data['image'] = asset($url);
        // }
        $data['name'] = $request->get('name');
        $data['status'] = $request->get('status');
        $data['type'] = $request->get('type');

        $category = $categoryRepository->create($data);
        // $brands = $request->get('brands');
        // if (is_array($brands) && !empty($brands)) {
        //     $category->brands()->attach($brands);
        // }
        return response()->json([
            'status' => true,
            'msg' => 'Thêm mới chuyên mục thành công!',
            'data' => $category
        ], Response::HTTP_OK);

    }

    public function getUpdate($id, CategoryRepositoryEloquent $categoryRepository)
    {
        $category = $categoryRepository->find($id);
        if (is_object($category)) {
            return response()->json([
                'status' => true,
                'msg' => 'Chi tiết chuyên mục: ' . $category->name,
                'data' => $category
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Chuyên mục không tồn tại',
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Chỉnh sửa
     * @group Chuyên mục
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Cập nhật thành công!",
     * "data": {
     * "id": 5,
     * "name": "Xe tay gaa",
     * "image": "http://127.0.0.1:8000/storage/categories/k8Gthh5iIpuUewyC1S04ibDxyrd79mBVqBol6fNo.jpg",
     * "status": "1",
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-28 13:45:40",
     * "type": "2"
     * }
     * }
     *
     *
     *
     * @param $id
     * @param CategoryRepositoryEloquent $categoryRepository
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate($id, CategoryRepositoryEloquent $categoryRepository, UpdateRequest $request)
    {
        $category = $categoryRepository->find($id);
        if (is_object($category)) {
            // if ($request->hasFile('image')) {
            //     $file = $request->file('image')->store('public/categories');
            //     $url = Storage::url($file);
            //     $data['image'] = asset($url);
            // }
            $data['name'] = $request->get('name');
            $data['status'] = $request->get('status');
            $data['type'] = $request->get('type');

            $category->update($data);
            // $brands = $request->get('brands');
            // if (is_array($brands) && !empty($brands)) {
            //     $category->brands()->sync($brands);
            // }

            return response()->json([
                'status' => true,
                'msg' => 'Cập nhật thành công!',
                'data' => $category
            ], Response::HTTP_OK);
        }

        return response()->json([
            'status' => false,
            'msg' => 'Không tồn tại chuyên mục!',
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Xóa
     * @group Chuyên mục
     * @urlParam id
     *@response 200 {
    * "status": true,
     * "msg": "Xóa thành công!"
     * }
     *
     *
     *
     * @param $id
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function postDelete($id, CategoryRepositoryEloquent $categoryRepository)
    {
        $category = $categoryRepository->find($id);
        if (is_object($category)) {
            // Storage::disk('public')->delete(str_replace('/storage/', '', $category->image));
            // $category->brands()->detach();
            $category->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Xóa thành công!',
            ], Response::HTTP_OK);
        }

        return response()->json([
            'status' => false,
            'msg' => 'Xóa thất bại!',
        ], Response::HTTP_BAD_REQUEST);
    }
}
