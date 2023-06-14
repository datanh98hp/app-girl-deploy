<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Banners\CreateRequest;
use App\Repositories\BannerRepositoryEloquent;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Danh sách
     * @group Banner
     * @response 200 {
     * "status": true,
     * "msg": "List banner",
     * "data": [
     * {
     * "id": 67,
     * "name": "banner 12222",
     * "image": "http://127.0.0.1:8000/storage/banners/G3iEDApUVHMXXBNVdraiSsLpmrrydLRBl7bGpyEx.jpg",
     * "created_at": "2021-04-28 12:46:59",
     * "updated_at": "2021-04-28 12:46:59"
     * }
     * ]
     * }
     *
     *
     * @param BannerRepositoryEloquent $bannerRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(BannerRepositoryEloquent $bannerRepository)
    {
        $banners = $bannerRepository->orderBy('id','desc')->get();
        return response()->json([
            'status' => true,
            'msg' => 'List banner',
            'data' => $banners
        ], Response::HTTP_OK);
    }

    /**
     * Thêm
     * @group Banner
     * @response 200 {
     * "status": true,
     * "msg": "Add banner successfully!",
     * "data": {
     * "image": "http://127.0.0.1:8000/storage/banners/G3iEDApUVHMXXBNVdraiSsLpmrrydLRBl7bGpyEx.jpg",
     * "name": "banner 12222",
     * "updated_at": "2021-04-28 12:46:59",
     * "created_at": "2021-04-28 12:46:59",
     * "id": 67
     * }
     * }
     * @param BannerRepositoryEloquent $bannerRepository
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postAdd(BannerRepositoryEloquent $bannerRepository, CreateRequest $request)
    {
            if ($request->hasFile('image')) {
                $file = $request->file('image')->store('public/banners');
                $url = Storage::url($file);
                $data['image'] = asset($url);
            }
            $data['name'] = $request->get('name');
            $banner = $bannerRepository->create($data);
        return response()->json([
                'status' => true,
                'msg' => 'Add banner successfully!',
                'data' => $banner
        ], Response::HTTP_OK);

    }

    /**
     * Xóa
     * @group Banner
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Xóa thành công banner có id là 6 !"
     * }
     *
     *
     *
     * @param $id
     * @param BannerRepositoryEloquent $bannerRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function postDelete($id, BannerRepositoryEloquent $bannerRepository)
    {
            $banner = $bannerRepository->find($id);
            if (is_object($banner)){
                Storage::disk('public')->delete(str_replace('/storage/','',$banner->image));
                $banner->delete();
                return response()->json([
                    'status' => true,
                    'msg' => "Xóa thành công banner có id là $id !",
                ], Response::HTTP_OK);
            }
            return response()->json([
                'status' => false,
                'msg' => "Không tìm thấy banner có id là $id !",
            ], Response::HTTP_OK);

    }
}
