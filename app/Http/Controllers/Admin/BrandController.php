<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Brand;
use App\Http\Requests\Brand\CreateRequest;
use App\Http\Requests\Brand\UpdateRequest;
use App\Repositories\BrandRepositoryEloquent;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryEloquent;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brands.index');
    }

    public function data()
    {
        $data = Brand::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('image', function ($data) {
                return '<img src="' . Storage::url($data->image) . '" width="150px">';
            })
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Hoạt động" : "Tạm dừng";
            })
            ->addColumn('action', function ($data) {
                return '
                        <form action="' . route('admin.brand.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.brand.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
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
        $data = [];
        $categories = $categoryRepository->findWhere(['status' => 1]);
        if (count($categories) > 0) {
            $data['categories'] = $categories;
        }
        return view('admin.brands.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param BrandRepositoryEloquent $brandRepository
     * @return void
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateRequest $request, BrandRepositoryEloquent $brandRepository)
    {
        $data = $request->only(['name', 'status']);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('brands');
            $data['image'] = $file;
        }
        $brand = $brandRepository->create($data);
        if ($brand) {
            if (!empty($request->get('categories_id'))){
                $brand->categories()->attach($request->get('categories_id'));
            }
            Alert::success('Thêm mới thành công');
            return redirect()->route('admin.brand.index');
        }
        Alert::error('Thêm mới Thất bại');
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @param BrandRepositoryEloquent $brandRepository
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BrandRepositoryEloquent $brandRepository,CategoryRepositoryEloquent $categoryRepository)
    {
        $data['brand'] = $brandRepository->find($id);
        $data['categories'] = $categoryRepository->findWhere(['status'=>1]);
        $data['categories_id'] = $data['brand']->categories->pluck('id')->toArray();
        return view('admin.brands.update', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param $id
     * @param UpdateRequest $request
     * @param BrandRepositoryEloquent $brandRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateRequest $request, BrandRepositoryEloquent $brandRepository)
    {
        $brand = $brandRepository->find($id);
        $data = $request->only(['name', 'status']);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('brands');
            $data['image'] = $file;
        }
        $update = $brand->update($data);
        if ($update) {
            if (!empty($request->get('categories_id'))){
                $brand->categories()->sync($request->get('categories_id'));
            }
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.brand.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param BrandRepositoryEloquent $brandRepository
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, BrandRepositoryEloquent $brandRepository)
    {
        try {
            $brandRepository->delete($id);
            Alert::success('Xóa thành công!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::success('Xóa Thất bại!');
            return redirect()->back();
        }

    }
}
