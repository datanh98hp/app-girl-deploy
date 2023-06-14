<?php

namespace App\Http\Controllers\Api;

use App\Entities\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\CreateRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Repositories\NotificationRepositoryEloquent;
use App\Repositories\PostRepositoryEloquent;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Danh sách
     * @group Bài viết
     * @response 200 {
     * "status": true,
     * "msg": "Danh sách bài viết",
     * "data": [
     * {
     * "id": 20,
     * "name": "Post 4",
     * "slug": "post-82803",
     * "image": "/storage/posts/5jpg",
     * "description": "Mô tả 14",
     * "content": "Nội dung Post 4",
     * "views": 3801,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 19,
     * "name": "Post 10",
     * "slug": "post-92252",
     * "image": "/storage/posts/20jpg",
     * "description": "Mô tả 9",
     * "content": "Nội dung Post 2",
     * "views": 7602,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 18,
     * "name": "Post 5",
     * "slug": "post-125069",
     * "image": "/storage/posts/18jpg",
     * "description": "Mô tả 7",
     * "content": "Nội dung Post 20",
     * "views": 3047,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 17,
     * "name": "Post 13",
     * "slug": "post-125716",
     * "image": "/storage/posts/15jpg",
     * "description": "Mô tả 2",
     * "content": "Nội dung Post 16",
     * "views": 5312,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 16,
     * "name": "Post 19",
     * "slug": "post-136813",
     * "image": "/storage/posts/20jpg",
     * "description": "Mô tả 13",
     * "content": "Nội dung Post 5",
     * "views": 3345,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 15,
     * "name": "Post 14",
     * "slug": "post-55128",
     * "image": "/storage/posts/18jpg",
     * "description": "Mô tả 11",
     * "content": "Nội dung Post 6",
     * "views": 8109,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 14,
     * "name": "Post 19",
     * "slug": "post-36235",
     * "image": "/storage/posts/14jpg",
     * "description": "Mô tả 11",
     * "content": "Nội dung Post 19",
     * "views": 5788,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 13,
     * "name": "Post 1",
     * "slug": "post-178917",
     * "image": "/storage/posts/15jpg",
     * "description": "Mô tả 1",
     * "content": "Nội dung Post 8",
     * "views": 3804,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 12,
     * "name": "Post 18",
     * "slug": "post-77233",
     * "image": "/storage/posts/1jpg",
     * "description": "Mô tả 10",
     * "content": "Nội dung Post 8",
     * "views": 1296,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 11,
     * "name": "Post 4",
     * "slug": "post-33763",
     * "image": "/storage/posts/7jpg",
     * "description": "Mô tả 8",
     * "content": "Nội dung Post 1",
     * "views": 6069,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 10,
     * "name": "Post 3",
     * "slug": "post-192867",
     * "image": "/storage/posts/10jpg",
     * "description": "Mô tả 7",
     * "content": "Nội dung Post 17",
     * "views": 4228,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 9,
     * "name": "Post 10",
     * "slug": "post-101867",
     * "image": "/storage/posts/2jpg",
     * "description": "Mô tả 9",
     * "content": "Nội dung Post 8",
     * "views": 6635,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 8,
     * "name": "Post 1",
     * "slug": "post-24112",
     * "image": "/storage/posts/3jpg",
     * "description": "Mô tả 14",
     * "content": "Nội dung Post 3",
     * "views": 1811,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 7,
     * "name": "Post 4",
     * "slug": "post-186677",
     * "image": "/storage/posts/10jpg",
     * "description": "Mô tả 17",
     * "content": "Nội dung Post 15",
     * "views": 5038,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 6,
     * "name": "Post 7",
     * "slug": "post-68795",
     * "image": "/storage/posts/8jpg",
     * "description": "Mô tả 20",
     * "content": "Nội dung Post 7",
     * "views": 1270,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": []
     * },
     * {
     * "id": 5,
     * "name": "Post 13",
     * "slug": "post-43841",
     * "image": "/storage/posts/20jpg",
     * "description": "Mô tả 3",
     * "content": "Nội dung Post 18",
     * "views": 6811,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": [
     * {
     * "id": 3,
     * "name": "Chuyên mục 4509",
     * "image": "/storage/categories/1731jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2,
     * "pivot": {
     * "post_id": 5,
     * "category_id": 3
     * }
     * }
     * ]
     * },
     * {
     * "id": 4,
     * "name": "Post 19",
     * "slug": "post-94815",
     * "image": "/storage/posts/13jpg",
     * "description": "Mô tả 6",
     * "content": "Nội dung Post 7",
     * "views": 3678,
     * "status": 1,
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-26 02:57:05",
     * "categories": [
     * {
     * "id": 3,
     * "name": "Chuyên mục 4509",
     * "image": "/storage/categories/1731jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2,
     * "pivot": {
     * "post_id": 4,
     * "category_id": 3
     * }
     * }
     * ]
     * },
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
     * "categories": [
     * {
     * "id": 2,
     * "name": "Chuyên mục 8810",
     * "image": "/storage/categories/7304jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 1,
     * "pivot": {
     * "post_id": 3,
     * "category_id": 2
     * }
     * }
     * ]
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
     * "categories": [
     * {
     * "id": 2,
     * "name": "Chuyên mục 8810",
     * "image": "/storage/categories/7304jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 1,
     * "pivot": {
     * "post_id": 2,
     * "category_id": 2
     * }
     * },
     * {
     * "id": 3,
     * "name": "Chuyên mục 4509",
     * "image": "/storage/categories/1731jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2,
     * "pivot": {
     * "post_id": 2,
     * "category_id": 3
     * }
     * }
     * ]
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
     * "categories": [
     * {
     * "id": 2,
     * "name": "Chuyên mục 8810",
     * "image": "/storage/categories/7304jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 1,
     * "pivot": {
     * "post_id": 1,
     * "category_id": 2
     * }
     * },
     * {
     * "id": 3,
     * "name": "Chuyên mục 4509",
     * "image": "/storage/categories/1731jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2,
     * "pivot": {
     * "post_id": 1,
     * "category_id": 3
     * }
     * }
     * ]
     * }
     * ]
     * }
     *
     *
     *
     * @param PostRepositoryEloquent $postRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(PostRepositoryEloquent $postRepository)
    {
        $posts = $postRepository->orderBy('id','desc')->get();
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách bài viết',
            'data' => $posts
        ], Response::HTTP_OK);
    }

    /**
     * Thêm mới
     * @group Bài viết
     * @response 200 {
     * "status": true,
     * "msg": "Thêm mới thành công!",
     * "data": {
     * "image": "http://127.0.0.1:8000/storage/posts/Y1B7CgwtvsCOR7ZdZ4WWvsOA73r1rmymQ0B89jb5.jpg",
     * "name": "Xe o t123aaaaaaaaq",
     * "slug": "xe-o-to-1",
     * "description": "description",
     * "content": "content",
     * "views": "1",
     * "status": "1",
     * "updated_at": "2021-04-28 14:51:37",
     * "created_at": "2021-04-28 14:51:37",
     * "id": 21
     * }
     * }
     *
     * @param PostRepositoryEloquent $postRepository
     * @param NotificationRepositoryEloquent $notificationRepository
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postAdd(PostRepositoryEloquent $postRepository, NotificationRepositoryEloquent $notificationRepository, CreateRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('public/posts');
            $url = Storage::url($file);
            $data['image'] = asset($url);
        }
        $data['name'] = $request->get('name');
        $data['slug'] = $request->get('slug');
        $data['description'] = $request->get('description');
        $data['content'] = $request->get('content');
        $data['link'] = $request->get('link');
        $data['views'] = $request->get('views');
        $data['status'] = $request->get('status');

        $post = $postRepository->create($data);
        if ($post) {
            $categories = $request->get('categories');
            if (is_array($categories) && !empty($categories)) {
                $post->categories()->attach($categories);
            }
            $notificationRepository->create([
                'post_id' => $post->id
            ]);
            return response()->json([
                'status' => true,
                'msg' => 'Thêm mới thành công!',
                'data' => $post
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Thêm mới thất bại!'
        ], Response::HTTP_BAD_REQUEST);

    }

    /**
     * Chi tiết
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Chỉnh sửa bài viết: Post 6",
     * "data": {
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
     * "categories": [
     * {
     * "id": 2,
     * "name": "Chuyên mục 8810",
     * "image": "/storage/categories/7304jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 1,
     * "pivot": {
     * "post_id": 1,
     * "category_id": 2
     * }
     * },
     * {
     * "id": 3,
     * "name": "Chuyên mục 4509",
     * "image": "/storage/categories/1731jpg",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03",
     * "type": 2,
     * "pivot": {
     * "post_id": 1,
     * "category_id": 3
     * }
     * }
     * ]
     * }
     * }
     *
     * @param $id
     * @param PostRepositoryEloquent $postRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUpdate($id)
    {

        $post = Post::find($id);
        if (is_object($post)) {
            return response()->json([
                'status' => true,
                'msg' => 'Chi tiết bài viết: ' . $post->name,
                'data' => $post
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy bài viết',
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Chỉnh sửa
     * @group Bài viết
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Cập nhật bài viết thành công!",
     * "data": {
     * "id": 1,
     * "name": "Xe tay gaa",
     * "slug": "tay-ga1123123",
     * "image": "/storage/posts/9jpg",
     * "description": "moo tar",
     * "content": "noi dung",
     * "views": "12391230",
     * "status": "1",
     * "created_at": "2021-04-26 02:57:05",
     * "updated_at": "2021-04-28 15:01:42"
     * }
     * }
     * @param $id
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate($id, UpdateRequest $request)
    {
        $post = Post::find($id);
        if (is_object($post)) {
            if ($request->hasFile('image')) {
                $file = $request->file('image')->store('public/posts');
                $url = Storage::url($file);
                $data['image'] = asset($url);
            }
            $data['name'] = $request->get('name');
            $data['slug'] = $request->get('slug');
            $data['description'] = $request->get('description');
            $data['content'] = $request->get('content');
            $data['link'] = $request->get('link');
            $data['views'] = $request->get('views');
            $data['status'] = $request->get('status');
            $post->update($data);
            $categories = $request->get('categories');
            if (is_array($categories) && !empty($categories)) {
                $post->categories()->sync($categories);
            }

            return response()->json([
                'status' => true,
                'msg' => 'Cập nhật bài viết thành công!',
                'data' => $post,
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => "Không tìm thất bài viết!"
        ], Response::HTTP_BAD_REQUEST);

    }

    /**
     * Xóa
     * @group Bài viết
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

        $post = Post::find($id);
        if (is_object($post)) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $post->image));
            $post->categories()->detach();
            $post->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Xóa thành công!'
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => "Xóa thất bại!"
        ], Response::HTTP_BAD_REQUEST);

    }
}
