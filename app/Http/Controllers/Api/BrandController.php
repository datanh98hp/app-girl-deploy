<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Brand\CreateRequest;
use App\Http\Requests\Api\Brand\UpdateRequest;
use App\Repositories\BrandRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function getList(Request $request, BrandRepositoryEloquent $brandRepository)
    {
        $brands = $brandRepository->orderBy('id', 'desc')->with(['categories',"products"])->get();
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách thương hiệu!',
            'data' => $brands
        ], Response::HTTP_OK);
    }

    public function postAdd(BrandRepositoryEloquent $brandRepository, CreateRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('public/brands');
            $url = Storage::url($file);
            $data['image'] = asset($url);
        }
        $data['name'] = $request->get('name');

        $brand = $brandRepository->create($data);
        $categories = $request->get('categories');
        if (is_array($categories) && !empty($categories)) {
            $brand->categories()->attach($categories);
        }
        $brand->categories;
        return response()->json([
            'status' => true,
            'msg' => 'Thêm mới thành công!',
            'data' => ['brand' => $brand]
        ], Response::HTTP_OK);

    }

    public function getUpdate($id, BrandRepositoryEloquent $brandRepository)
    {
        $brand = $brandRepository->with(['categories',"products"])->find($id);
        $products = $brand->products()->paginate(20);
        if (is_object($brand)) {
            return response()->json([
                'status' => true,
                'msg' => 'Chi tiết: ' . $brand->name,
                'data' => array_merge($brand->toArray(),["products"=>$products])
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy thương hiệu',
        ], Response::HTTP_BAD_REQUEST);
    }


    /**
     * Cập nhật
     * @group Thương hiệu
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Cập nhật thành công!",
     * "data": {
     * "id": 1,
     * "name": "honda 11",
     * "image": "http://127.0.0.1:8000/storage/brands/1WqsmdGOaMp3PbSuPVIu8y8JDO4UhHruRVbovx0W.jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-28 13:28:41",
     * "categories": [
     * {
     * "id": 1,
     * "name": "Chuyên mục 1206",
     * "image": "/storage/categories/7640jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2,
     * "pivot": {
     * "brand_id": 1,
     * "category_id": 1
     * }
     * },
     * {
     * "id": 2,
     * "name": "Chuyên mục 8810",
     * "image": "/storage/categories/7304jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 1,
     * "pivot": {
     * "brand_id": 1,
     * "category_id": 2
     * }
     * },
     * {
     * "id": 5,
     * "name": "Chuyên mục 8210",
     * "image": "/storage/categories/5596jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2,
     * "pivot": {
     * "brand_id": 1,
     * "category_id": 5
     * }
     * }
     * ]
     * }
     * }
     *
     *
     *
     *
     * @param $id
     * @param BrandRepositoryEloquent $brandRepository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate($id, BrandRepositoryEloquent $brandRepository, UpdateRequest $request)
    {
        $brand = $brandRepository->find($id);
        if (is_object($brand)) {
            $brand->categories;
            if ($request->hasFile('image')) {
                $file = $request->file('image')->store('public/brands');
                $url = Storage::url($file);
                $data['image'] = asset($url);
            }
            $data['name'] = $request->get('name');
            $brand->update($data);
            $categories = $request->get('categories');
            if (is_array($categories) && !empty($categories)) {
                $brand->categories()->sync($categories);
            }
            return response()->json([
                'status' => true,
                'msg' => 'Cập nhật thành công!',
                'data' => $brand
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Cập nhật thất bại!',
            'data' => $brand
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Xóa
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Xóa thành công!"
     * }
     * @param $id
     * @param BrandRepositoryEloquent $brandRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function postDelete($id, BrandRepositoryEloquent $brandRepository)
    {
        $brand = $brandRepository->find($id);
        if (is_object($brand)) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $brand->image));
            $brand->categories()->detach();
            $brand->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Xóa thành công!',
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy id!',
        ], Response::HTTP_BAD_REQUEST);
    }
}
