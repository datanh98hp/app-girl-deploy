<?php

namespace App\Http\Controllers\Api;

use App\Entities\LoveProduct;
use App\Entities\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\CreateRequest;
use App\Http\Requests\Api\Product\UpdateRequest;
use App\Repositories\NotificationRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //    /**
    //     * Danh sách products
    //     * @group Product
    //     * @response 200 {
    //     * "status": true,
    //     * "msg": "Danh sách sản phẩm",
    //     * "data": [
    //     * {
    //     * "id": 2,
    //     * "code": "7794",
    //     * "name": "product 6195",
    //     * "slug": "product-3154-7682",
    //     * "description": "Mô tả 7606",
    //     * "content": "Nội dung 1456",
    //     * "image": "/storage/products/4550jpg",
    //     * "images": "[\"\\/storage\\/products\\/gdUi1VzDkAxArwVRN1TYhoPxHvxw7PejM80CY3Rx.jpg\",\"\\/storage\\/products\\/9YpYHPebNX8azYgsRJO0DwlKdGWz8kKI6ytWJxT2.jpg\"]",
    //     * "price": 1000000,
    //     * "brand_id": 12,
    //     * "status": 1,
    //     * "created_at": "2021-04-26 02:57:03",
    //     * "updated_at": "2021-04-26 02:57:03"
    //     * },
    //     * {
    //     * "id": 1,
    //     * "code": "8256",
    //     * "name": "product 1091",
    //     * "slug": "product-1247-7779",
    //     * "description": "Mô tả 8896",
    //     * "content": "Nội dung 1527",
    //     * "image": "/storage/products/3917jpg",
    //     * "images": "[\"\\/storage\\/products\\/gdUi1VzDkAxArwVRN1TYhoPxHvxw7PejM80CY3Rx.jpg\",\"\\/storage\\/products\\/9YpYHPebNX8azYgsRJO0DwlKdGWz8kKI6ytWJxT2.jpg\"]",
    //     * "price": 1000000,
    //     * "brand_id": 5,
    //     * "status": 1,
    //     * "created_at": "2021-04-26 02:57:03",
    //     * "updated_at": "2021-04-26 02:57:03"
    //     * }
    //     * ]
    //     * }
    //     * @param Request $request
    //     * @param ProductRepositoryEloquent $productRepository
    //     * @return \Illuminate\Http\JsonResponse
    //     */
    //    public function getList(Request $request, ProductRepositoryEloquent $productRepository)
    //    {
    //        $products = $productRepository->orderBy('id', 'desc')->get();
    //        return response()->json([
    //            'status' => true,
    //            'msg' => 'Danh sách sản phẩm',
    //            'data' => $products
    //        ], Response::HTTP_OK);
    //    }

    //    /**
    //     * Thêm mới product
    //     * @group Product
    //     *
    //     * @response 200 {
    //     * "status": true,
    //     * "msg": "Thêm mới thành công!",
    //     * "data": {
    //     * "image": "http://127.0.0.1:8000/storage/products/NBd6uEKLZRCawSRuXpBmhXvn0aTFcatWFM9T27lK.jpg",
    //     * "images": "[\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/qqHU1uq0IkReC1Ik6qiz3aKE4SNrYi8HiB92AxWG.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/GytbXbvBBfMZbWkz44FignvudTedkHIvm64q78Ai.jpg\"]",
    //     * "name": "Xe o to ngon",
    //     * "slug": "xe-o-to-31",
    //     * "code": "1231232123",
    //     * "description": "description",
    //     * "content": "content",
    //     * "price": "200000000",
    //     * "brand_id": "1",
    //     * "status": "1",
    //     * "updated_at": "2021-04-28 15:17:29",
    //     * "created_at": "2021-04-28 15:17:29",
    //     * "id": 22
    //     * }
    //     * }
    //     *
    //     *
    //     * @param ProductRepositoryEloquent $productRepository
    //     * @param NotificationRepositoryEloquent $notificationRepository
    //     * @param Request $request
    //     * @return \Illuminate\Http\JsonResponse
    //     *
    //     */
    //    public function postAdd(ProductRepositoryEloquent $productRepository, NotificationRepositoryEloquent $notificationRepository, CreateRequest $request)
    //    {
    //        try {
    //            if ($request->hasFile('image')) {
    //                $file = $request->file('image')->store('public/products');
    //                $url = Storage::url($file);
    //                $data['image'] = asset($url);
    //            }
    //            if ($request->hasFile('images')) {
    //                $images = $request->file('images');
    //                $url_images = [];
    //                foreach ($images as $image) {
    //                    $file = $image->store('public/products');
    //                    $url_images[] = asset(Storage::url($file));
    //                }
    //                $data['images'] = json_encode($url_images);
    //            }
    //            $data['name'] = $request->get('name');
    //            $data['slug'] = $request->get('slug');
    //            $data['code'] = $request->get('code');
    //            $data['description'] = $request->get('description');
    //            $data['content'] = $request->get('content');
    //            $data['price'] = $request->get('price');
    //            $data['brand_id'] = $request->get('brand_id');
    //            $data['status'] = $request->get('status');
    //
    //            $product = $productRepository->create($data);
    //            $categories = $request->get('categories');
    //            if (is_array($categories) && !empty($categories)) {
    //                $product->categories()->sync($categories);
    //            }
    //
    //            $notificationRepository->create([
    //                'product_id' => $product->id
    //            ]);
    //            return response()->json([
    //                'status' => true,
    //                'msg' => 'Thêm mới thành công!',
    //                'data' => $product,
    //            ], Response::HTTP_OK);
    //        } catch (\Exception $exception) {
    //            return response()->json([
    //                'status' => false,
    //                'msg' => 'Thêm mới thất bại'
    //            ], Response::HTTP_BAD_REQUEST);
    //        }
    //    }


    public function getDetail($id): \Illuminate\Http\JsonResponse
    {
        $product = Product::with(['categories', 'brand'])->find($id);
        if (is_object($product)) {
            $product->update(['views' => $product->views + 1]);
            $product_arr = $product->toArray();
            $product_arr['images'] = json_decode($product_arr['images'], true);
            return response()->json([
                'status' => true,
                'msg' => 'Chi tiết: ' . $product->name,
                'data' => $product_arr,
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy sản phẩm'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function getSearch(Request $request): \Illuminate\Http\JsonResponse
    {
        if ($request->has("keyword")) {
            $keyword = $request->get("keyword");
            if (!empty($keyword)) {
                $data = Product::where("name", 'like', "%" . $keyword . "%");
                if ($request->has("price")) {
                    $price_order_by = $request->get("price");
                    if (!empty($price_order_by)) {
                        $data->orderBy("price", $price_order_by);
                    }
                }
                if ($request->has("condition")) {
                    $condition = $request->get("condition");
                    if (!empty($condition)) {
                        $data->where("condition", $condition);
                    }
                }
                if ($request->has("category_id")) {
                    $category_id = $request->get("category_id");
                    if (!empty($category_id)) {
                        $data->whereHas("categories", function ($q) use ($category_id) {
                            $q->where("category_id", $category_id);
                        });
                    }
                }
                $items = $data->paginate(12);
                if ($items->total() > 0) {
                    $products = [];
                    foreach ($items as $k => $item) {
                        $products[$k] = $item->toArray();
                        $products[$k]['images'] = json_decode($item->images, true);
                    }
                    return response()->json([
                        'status' => true,
                        'msg' => "Danh sách lọc xe",
                        'data' => $products,
                    ], Response::HTTP_OK);
                }
            }
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy xe phù hợp!'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function pushLoveProduct(Request $request)
    {
        try {
            $member  = auth('api')->user();
            LoveProduct::firstOrCreate([
                'member_id' => $member->id,
                'product_id' => $request->product_id
            ]);

            $list = [];

            $products = Product::all();

            $products_check = LoveProduct::all();

            foreach ($products as $product) {
                foreach ($products_check as $product_check) {
                    if ($product_check->member_id === $member->id && $product_check->product_id === $product->id) {
                        if (!in_array($product, $list)) {
                            array_push($list, $product);
                        }
                    }
                }
            }
            return response()->json([
                "status" => true,
                "list" => $list,
                "msg" => "Đã thêm sản phẩm vào mục yêu thích!",
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "msg" => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ListLoveProduct(){
        try{
            $member  = auth('api')->user();
            $list = [];

            $products = Product::all();

            $products_check = LoveProduct::all();

            foreach ($products as $product) {
                foreach ($products_check as $product_check) {
                    if ($product_check->member_id === $member->id && $product_check->product_id === $product->id) {
                        if (!in_array($product, $list)) {
                            array_push($list, $product);
                        }
                    }
                }
            }
            return response()->json([
                "status" => true,
                "list" => $list,
            ], Response::HTTP_OK);
        }catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                "msg" => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Chỉnh sửa product
     * @group Product
     *
     * @response 200 {
     * "status": true,
     * "msg": "Cập nhật thành công!",
     * "data": {
     * "id": 3,
     * "code": "123456",
     * "name": "Xe tay gaa",
     * "slug": "tay-ga",
     * "description": "moo tar",
     * "content": "noi dung",
     * "image": "http://127.0.0.1:8000/storage/products/oKKHGOozqXYwOHTpmDMMfSWPmjbMmhYtKMLUr9jM.jpg",
     * "images": "[\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/xs1JvAK31XbeiqqEmH8gAfrKdZs1cOzhzJ5dZf5B.jpg\"]",
     * "price": "12391230",
     * "brand_id": "10",
     * "status": "1",
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-28 15:23:47"
     * }
     * }
     *
     * @param $id
     * @param ProductRepositoryEloquent $productRepository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    //    public function postUpdate($id, UpdateRequest $request)
    //    {
    //        try {
    //            $product = Product::find($id);
    //            if (is_object($product)) {
    //                if ($request->hasFile('image')) {
    //                    $file = $request->file('image')->store('public/products');
    //                    $url = Storage::url($file);
    //                    $data['image'] = asset($url);
    //                }
    //
    //                if ($request->hasFile('images')) {
    //                    $images = $request->file('images');
    //                    $url_images = [];
    //                    foreach ($images as $image) {
    //                        $file = $image->store('public/products');
    //                        $url_images[] = asset(Storage::url($file));
    //                    }
    //                    $data['images'] = json_encode($url_images);
    //                }
    //                $data['name'] = $request->get('name');
    //                $data['slug'] = $request->get('slug');
    //                $data['code'] = $request->get('code');
    //                $data['description'] = $request->get('description');
    //                $data['content'] = $request->get('content');
    //                $data['price'] = $request->get('price');
    //                $data['brand_id'] = $request->get('brand_id');
    //                $data['status'] = $request->get('status');
    //                $product->update($data);
    //                $categories = $request->get('categories');
    //                if (is_array($categories) && !empty($categories)) {
    //                    $product->categories()->sync($categories);
    //                }
    //
    //                return response()->json([
    //                    'status' => true,
    //                    'msg' => 'Cập nhật thành công!',
    //                    'data' => $product,
    //                ], Response::HTTP_OK);
    //            }
    //        } catch (\Exception $exception) {
    //            return response()->json([
    //                'status' => false,
    //                'msg' => 'Cập nhật thất bại!'
    //            ], Response::HTTP_BAD_REQUEST);
    //        }
    //    }

    /**
     * Xóa product
     * @group Product
     * @urlParam id Id product
     * @response 200 {
     * "status": true,
     * "msg": "Xóa thành công!"
     * }
     *
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    //    public function postDelete($id)
    //    {
    //        try {
    //            $product = Product::find($id);
    //            if (is_object($product)) {
    //                Storage::disk('public')->delete(str_replace('/storage/', '', $product->image));
    //                $images = json_decode($product->images,true);
    //                if (!empty($images)){
    //                    foreach ($images as $img){
    //                        Storage::disk('public')->delete(str_replace('/storage/', '', $img));
    //                    }
    //                }
    //                $product->categories()->detach();
    //                $product->delete();
    //                return response()->json([
    //                    'status' => true,
    //                    'msg' => 'Xóa thành công!'
    //                ], Response::HTTP_OK);
    //            }
    //            return response()->json([
    //                'status' => false,
    //                'msg' => "XÓa thất bại"
    //            ], Response::HTTP_BAD_REQUEST);
    //        } catch (\Exception $exception) {
    //            return response()->json([
    //                'status' => false,
    //                'msg' => "XÓa thất bại"
    //            ], Response::HTTP_BAD_REQUEST);
    //        }
    //    }
}
