<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Category;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Repositories\CategoryRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    public function data()
    {
        $data = Category::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('image', function ($data) {
                return '<img src="' . Storage::url($data->image) . '" width="150px">';
            })
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Hoạt động" : "Tạm dừng";
            })
//            ->editColumn('type', function ($data) {
//                return $data->type == 1 ? "Sản phẩm" : "Tin tức";
//            })
            ->addColumn('action', function ($data) {
                return '
                        <form action="' . route('admin.category.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.category.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRepositoryEloquent $categoryRepository)
    {
        $categories = $categoryRepository->findByField("status", 1);
        return view('admin.categories.add', compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return void
     */
    public function store(CreateRequest $request, CategoryRepositoryEloquent $categoryRepository)
    {
        $data = array_merge($request->only(['name', 'status']));
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('categories');
            $data['image'] = $file;
        }
        $category = $categoryRepository->create($data);
        if ($category) {
            Alert::success('Thêm mới thành công');
            return redirect()->route('admin.category.index');
        }
        Alert::error('Thêm mới Thất bại');
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return
     */
    public function edit($id, CategoryRepositoryEloquent $categoryRepository)
    {

        $data['category'] = $categoryRepository->find($id);
//        $data['categories'] = $categoryRepository->findByField("status", 1);

        return view('admin.categories.update', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param $id
     * @param UpdateRequest $request
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateRequest $request, CategoryRepositoryEloquent $categoryRepository)
    {
        $category = $categoryRepository->find($id);
        $data = array_merge($request->only(['name', 'status']));
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('posts');
            $data['image'] = $file;
        }
        $update = $category->update($data);
        if ($update) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.category.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, CategoryRepositoryEloquent $categoryRepository)
    {
        try {
            $categoryRepository->delete($id);
            Alert::success('Xóa thành công!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::success('Xóa Thất bại!');
            return redirect()->back();
        }

    }
}
