<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Post;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Repositories\BrandRepositoryEloquent;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\NotificationRepositoryEloquent;
use App\Repositories\PostRepositoryEloquent;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    public function data()
    {
        $data = Post::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('image', function ($data) {
                return '<img src="' . Storage::url($data->image) . '" width="150px">';
            })
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Hoạt động" : "Tạm dừng";
            })
            ->addColumn('action', function ($data) {
                return '
                        <form action="' . route('admin.post.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.post.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function create(CategoryRepositoryEloquent $categoryRepository, BrandRepositoryEloquent $brandRepository)
    {
        $data = [];
//        $categories = $categoryRepository->findWhere(['status' => 1]);
//        if (count($categories) > 0) {
//            $data['categories'] = $categories;
//        }
//        $brands = $brandRepository->findWhere(['status' => 1]);
//        if (count($categories) > 0) {
//            $data['brands'] = $brands;
//        }
        return view('admin.posts.add', $data);
    }

    public function store(CreateRequest $request, PostRepositoryEloquent $postRepository, NotificationRepositoryEloquent $notificationRepository)
    {
        $data = $request->only(['name', 'status', 'views', 'description', 'content', 'link']);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('posts');
            $data['image'] = $file;
        }
        $post = $postRepository->create($data);
        if ($post) {
//            if (!empty($request->get('category_id'))) {
//                $post->categories()->attach($request->get('category_id'));
//            }
            $notificationRepository->create([
                'post_id' => $post->id,
                'status' => 1,
            ]);
        }
        Alert::success('Thêm mới thành công');
        return redirect()->route('admin.post.index');
    }


    public function edit($id, PostRepositoryEloquent $postRepository, CategoryRepositoryEloquent $categoryRepository)
    {
        $data['post'] = $postRepository->find($id);
//        $data['categories'] = $categoryRepository->findWhere(['status' => 1]);
//        $data['categories_id'] = $data['post']->categories->pluck('id')->toArray();
        return view('admin.posts.update', $data);
    }

    public function update($id, UpdateRequest $request, PostRepositoryEloquent $postRepository)
    {
        $post = $postRepository->find($id);
        $data = $request->only(['name', 'status', 'views', 'description', 'content', 'link']);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('posts');
            $data['image'] = $file;
        }
        $update = $post->update($data);
        if ($update) {
//            if (!empty($request->get('category_id'))) {
//                $post->categories()->sync($request->get('category_id'));
//            }
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.post.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param PostRepositoryEloquent $postRepository
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, PostRepositoryEloquent $postRepository)
    {
        $postRepository->delete($id);
        Alert::success('Xóa thành công!');
        return redirect()->back();
    }
}
