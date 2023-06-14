<?php

namespace App\Http\Controllers\Api;

use App\Entities\Image;
use App\Entities\LoveImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepositoryEloquent;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function FilterImage(ImageRepositoryEloquent $imageRepository, Request $request)
    {
        $images = $imageRepository->where('category_id', $request->id)->get();
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách hình ảnh đã lọc',
            'data' => $images
        ], Response::HTTP_OK);
    }

    public function ListImage()
    {
        $list = Image::all();
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách hình ảnh',
            'data' => $list
        ], Response::HTTP_OK);
    }

    public function imageAdd(ImageRepositoryEloquent $categoryRepository, Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('public/images');
            $url = Storage::url($file);
            $data['images'] = asset($url);
        }
        $data['category_id'] = $request->get('category_id');
        $category = $categoryRepository->create($data);
        return response()->json([
            'status' => true,
            'msg' => 'Thêm mới hình ảnh thành công!',
            'data' => $category
        ], Response::HTTP_OK);

    }

    public function getUpdate($id, ImageRepositoryEloquent $imageRepository)
    {
        $image = $imageRepository->find($id);
        if (is_object($image)) {
            return response()->json([
                'status' => true,
                'data' => $image
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false,
                'msg' => 'Hình ảnh không tồn tại',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function imageUpdate($id, ImageRepositoryEloquent $imageRepository, Request $request)
    {
        $image = $imageRepository->find($id);
        if (is_object($image)) {
            if ($request->hasFile('image')) {
                $file = $request->file('image')->store('public/images');
                $url = Storage::url($file);
                $data['images'] = asset($url);
            }
            $data['category_id'] = $request->get('category_id');

            $image->update($data);

            return response()->json([
                'status' => true,
                'msg' => 'Cập nhật thành công!',
                'data' => $image
            ], Response::HTTP_OK);
        }

        return response()->json([
            'status' => false,
            'msg' => 'Không tồn tại hình ảnh!',
        ], Response::HTTP_BAD_REQUEST);
    }

    public function imageDelete($id, ImageRepositoryEloquent $imageRepository)
    {
        $image = $imageRepository->find($id);
        if (is_object($image)) {
            $image->delete();
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

    public function pushLoveImage(Request $request)
    {
        try {
            $member  = auth('api')->user();
            LoveImage::firstOrCreate([
                'member_id' => $member->id,
                'image_id' => $request->image_id
            ]);

            $list = [];

            $images = Image::all();

            $images_check = LoveImage::all();

            foreach ($images as $image) {
                foreach ($images_check as $image_check) {
                    if ($image_check->member_id === $member->id && $image_check->image_id === $image->id) {
                        if (!in_array($image, $list)) {
                            array_push($list, $image);
                        }
                    }
                }
            }
            return response()->json([
                "status" => true,
                "list" => $list,
                "msg" => "Đã thêm ảnh vào mục yêu thích!",
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "msg" => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ListLoveImage()
    {
        try {
            $member  = auth('api')->user();
            $images = LoveImage::where('member_id', $member->id)->get();
            $image_all = Image::all();
            foreach ($image_all as $image_all) {
                foreach ($images as $image) {
                    if ($image->image_id === $image_all->id && $image->member_id === $member->id)
                        $image["item"] = $image_all;
                }
            }
            return response()->json([
                "status" => true,
                "list" => $images,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "msg" => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function RemoveLoveImage($id)
    {
        try {
            $member  = auth('api')->user();
            $list = LoveImage::where(['id' => $id, 'member_id' => $member->id])->delete();
            return response()->json([
                "status" => true,
                'msg' => 'Đã xóa ảnh yêu thích thành công!',
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "msg" => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
