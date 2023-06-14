<?php

namespace App\Http\Controllers\Api;

use App\Entities\Category;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\PostRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewController extends Controller
{
    /**
     * Tin tức
     * @group Tin tức
     * @queryParam category_id
     * @response 200 {
     * "status": true,
     * "msg": "Danh sách tức",
     * "categories": [
     * {
     * "id": 1,
     * "name": "Chuyên mục 1206",
     * "image": "/storage/categories/7640jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 3,
     * "name": "Chuyên mục 4509",
     * "image": "/storage/categories/1731jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 4,
     * "name": "Chuyên mục 6998",
     * "image": "/storage/categories/3327jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 5,
     * "name": "Chuyên mục 8210",
     * "image": "/storage/categories/5596jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 6,
     * "name": "Chuyên mục 6758",
     * "image": "/storage/categories/8378jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 7,
     * "name": "Chuyên mục 2336",
     * "image": "/storage/categories/7489jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 8,
     * "name": "Chuyên mục 5321",
     * "image": "/storage/categories/5040jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 9,
     * "name": "Chuyên mục 4159",
     * "image": "/storage/categories/3195jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 10,
     * "name": "Chuyên mục 7495",
     * "image": "/storage/categories/6859jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 14,
     * "name": "Chuyên mục 8132",
     * "image": "/storage/categories/8717jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 17,
     * "name": "Chuyên mục 5810",
     * "image": "/storage/categories/4576jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * {
     * "id": 19,
     * "name": "Chuyên mục 7218",
     * "image": "/storage/categories/2201jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * }
     * ],
     * "category": {
     * "id": 1,
     * "name": "Chuyên mục 1206",
     * "image": "/storage/categories/7640jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2
     * },
     * "posts": [
     * {
     * "id": 3,
     * "name": "Post 4",
     * "slug": "post-45031",
     * "image": "/storage/posts/19jpg",
     * "description": "Mô tả 8",
     * "content": "Nội dung Post 16",
     * "views": 8657,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "pivot": {
     * "category_id": 1,
     * "post_id": 3
     * }
     * },
     * {
     * "id": 2,
     * "name": "Post 20",
     * "slug": "post-121538",
     * "image": "/storage/posts/7jpg",
     * "description": "Mô tả 14",
     * "content": "Nội dung Post 9",
     * "views": 8196,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "pivot": {
     * "category_id": 1,
     * "post_id": 2
     * }
     * },
     * {
     * "id": 1,
     * "name": "Post 6",
     * "slug": "post-74164",
     * "image": "/storage/posts/9jpg",
     * "description": "Mô tả 13",
     * "content": "Nội dung Post 20",
     * "views": 1070,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "pivot": {
     * "category_id": 1,
     * "post_id": 1
     * }
     * }
     * ]
     * }
     *
     *
     * @param Request $request
     * @param PostRepositoryEloquent $postRepository
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIndex(Request $request, PostRepositoryEloquent $postRepository, CategoryRepositoryEloquent $categoryRepository)
    {
        $categories = $categoryRepository->findWhere(['status' => 1, 'type' => 2]);
        $posts = $postRepository->orderBy('id', 'desc')->findWhere(['status' => 1]);
        if ($request->has('category_id')) {
            $cate = Category::find($request->get('category_id'));
            if (is_object($cate)) {
                $posts = $cate->posts()->orderBy('id', 'desc')->where('status', 1)->get();
            } else {
                $posts = null;
            }
        }
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách tin tức',
            'data'=>[
                'categories' => $categories,
                'posts' => $posts,
            ]
        ], Response::HTTP_OK);
    }

    /**
     * Chi tiết bài viết
     * @group Tin tức
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Chi tiết bài viêt!",
     * "posts": [
     * {
     * "id": 3,
     * "name": "Xe o t123aaaas",
     * "slug": "xe-o-to-2",
     * "image": "/storage/posts/IhlEhEA2jRboHbViKp3y8w3MSmgeSpiZcattlXZe.jpg",
     * "description": "description",
     * "content": "content",
     * "views": 1,
     * "status": 1,
     * "created_at": "2021-04-14 14:58:58",
     * "updated_at": "2021-04-14 14:58:58"
     * }
     * ]
     * }
     *
     *
     * @param $id
     * @param PostRepositoryEloquent $postRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetailPost($id, PostRepositoryEloquent $postRepository)
    {
        $post = $postRepository->findWhere(['id' => $id]);
        return response()->json([
            'status' => true,
            'msg' => 'Chi tiết bài viêt!',
            'data'=>[
                'posts' => $post,
            ]

        ], Response::HTTP_OK);

    }

}
