<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Product;
use App\Http\Requests\Locate\CreateRequest;
use App\Http\Requests\Locate\UpdateRequest;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class LocateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.locate.index');
    }

    public function data()
    {
        $data = Product::select('*')->where('type', 6)->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('image', function ($data) {
                return '<img src="' . $data->image . '" width="150px">';
            })
            ->editColumn('price', function ($data) {
                return number_format($data->price, 0, '', ',');
            })
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Hoạt động" : "Tạm dừng";
            })
            ->addColumn('action', function ($data) {
                return '
                        <a href="' . route('admin.locate.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                        <a data-url_delete="' . route('admin.locate.delete', $data->id) . '" class="btn btn-xs btn-danger delete-confirm" ><i class="fa fa-times"></i> Delete</a>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoryRepositoryEloquent $categoryRepository
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CategoryRepositoryEloquent $categoryRepository)
    {
        $data = [];
        $categories = $categoryRepository->findWhere(['type' => 1, 'status' => 1]);
        if (count($categories) > 0) {
            $data['categories'] = $categories;
        }
        return view('admin.locate.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param ProductRepositoryEloquent $productRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateRequest $request, ProductRepositoryEloquent $productRepository)
    {
        $data = array_merge(['type' => 6], $request->only(['code', 'name', 'status', 'year', 'description', 'content', 'price', 'price_old']));

        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('public/sims');
            $url = Storage::url($file);
            $data['image'] = $url;
        }
        $product = $productRepository->create($data);
        if (!empty($request->get('categories_id'))) {
            $product->categories()->attach($request->get('categories_id'));
        }
        Alert::success('Thêm mới thiết bị định vị thành công');
        return redirect()->route('admin.locate.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @param ProductRepositoryEloquent $productRepository
     * @param CategoryRepositoryEloquent $categoryRepository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, ProductRepositoryEloquent $productRepository, CategoryRepositoryEloquent $categoryRepository)
    {
        $data['locate'] = $productRepository->find($id);
        $data['categories'] = $categoryRepository->findWhere(['status' => 1, 'type' => 1]);
        $data['categories_id'] = $data['locate']->categories->pluck('id')->toArray();

        return view('admin.locate.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param UpdateRequest $request
     * @param ProductRepositoryEloquent $productRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateRequest $request, ProductRepositoryEloquent $productRepository)
    {
        $product = $productRepository->find($id);
        $data = array_merge(['type' => 6], $request->only(['code', 'name', 'status', 'year', 'description', 'content', 'price', 'price_old']));
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('public/sims');
            $url = Storage::url($file);
            $data['image'] = $url;
        }
        $update = $product->update($data);
        if ($update) {
            if (!empty($request->get('categories_id'))) {
                $product->categories()->sync($request->get('categories_id'));
            }
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.locate.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param ProductRepositoryEloquent $productRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id, ProductRepositoryEloquent $productRepository)
    {
        $product = $productRepository->find($id);
        $delete_bill = $product->bills->each->delete();
        if ($delete_bill) {
            $productRepository->delete($id);
        }
    }
}
