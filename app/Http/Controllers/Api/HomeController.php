<?php

namespace App\Http\Controllers\Api;

use App\Entities\Brand;
use App\Entities\Category;
use App\Http\Controllers\Controller;
use App\Repositories\BannerRepositoryEloquent;
use App\Repositories\BrandRepositoryEloquent;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\PostRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{

    /**
     * Trang chủ
     * @group Trang chủ
     * @param Request $request
     * @param ProductRepositoryEloquent $productRepository
     * @param BannerRepositoryEloquent $bannerRepository
     * @param PostRepositoryEloquent $postRepository
     * @param BrandRepositoryEloquent $brandRepository
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return \Illuminate\Http\JsonResponse
     *
     * @queryParam keyword Từ khóa tìm kiếm
     * @queryParam category_id Id chuyên mục
     * @queryParam brand_id Id thương hiệu
     * @queryParam sort_id Sắp xếp theo product mới(cũ) nhất
     * @queryParam sort_price Sắp xếp theo giá tăng(giảm) dần
     * @response 200 {
     * "status": true,
     * "msg": "List product",
     * "products": [
     * {
     * "id": 1,
     * "code": "123123",
     * "name": "Xe o t123aaaaaaaaq",
     * "slug": "xe-o-to-1",
     * "description": "description",
     * "content": "content",
     * "image": "/storage/products/8yZeqjdUq9I0UNLaQxs7cyBqTeRBl6NuECXplMqk.jpg",
     * "images": "[\"\\/storage\\/products\\/AZlrbzjRkmAYa9v5hGKmFgYc2kvRvFw6lPFtsMrm.jpg\",\"\\/storage\\/products\\/7Xmc3ig4PSf8dDyr3ZkjtsuF7klm8dSEKsl4qQSf.jpg\"]",
     * "price": 100000000,
     * "brand_id": 1,
     * "status": 1,
     * "created_at": "2021-04-14 05:39:36",
     * "updated_at": "2021-04-14 05:39:36"
     * }
     * ],
     * "brands": [
     * {
     * "id": 2,
     * "name": "toyota",
     * "image": "/storage/brands/BzryU2WXxwMCjgPN1dq9ais0jPdXAhrY2leRq975.jpg",
     * "status": 1,
     * "created_at": "2021-04-14 05:45:25",
     * "updated_at": "2021-04-14 05:45:25",
     * "pivot": {
     * "category_id": 2,
     * "brand_id": 2
     * }
     * },
     * {
     * "id": 3,
     * "name": "toyota bad",
     * "image": "/storage/brands/mBqSbnq5JYuKKYO3WRVvqhcxmyjPeFPUttZ4bVuP.jpg",
     * "status": 1,
     * "created_at": "2021-04-14 06:00:48",
     * "updated_at": "2021-04-14 06:00:48",
     * "pivot": {
     * "category_id": 2,
     * "brand_id": 3
     * }
     * },
     * {
     * "id": 4,
     * "name": "toyota bad",
     * "image": "/storage/brands/p2EzeIykokmUpxtMwxJ56h9K24FhOuRQAGBAc6VU.jpg",
     * "status": 1,
     * "created_at": "2021-04-14 13:27:15",
     * "updated_at": "2021-04-14 13:27:15",
     * "pivot": {
     * "category_id": 2,
     * "brand_id": 4
     * }
     * }
     * ]
     * }
     */
    public function getIndex(ProductRepositoryEloquent $productRepository, BannerRepositoryEloquent $bannerRepository, PostRepositoryEloquent $postRepository, CategoryRepositoryEloquent $categoryRepository,BrandRepositoryEloquent $brandRepository)
    {
        $posts = $postRepository->orderBy('id', 'desc')->where('status', 1)->limit(5)->get();
        $banners = $bannerRepository->get();
        $products = $productRepository->where('status', 1)->orderBy('id',"desc")->paginate(20);
        foreach($products as $key=>$product){
            $product['images'] = json_decode($products[$key]->images);
        }
        $categories = $categoryRepository->findWhere(['status' => 1, 'parent_id' => null]);
        $brands = $brandRepository->findWhere(['status' => 1]);
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách sản phẩm',
            'data'=>[
                'banners' => $banners,
                'categories' => $categories,
                'brands' => $brands,
                'products' => $products,
                'posts' => $posts,
            ]
        ], Response::HTTP_OK);
    }
}
