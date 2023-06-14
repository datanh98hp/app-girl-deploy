<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Post;
use App\Entities\Product;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Repositories\BrandRepositoryEloquent;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
//        $data = Product::find(39)->with();
//        dd($data);
        return view('admin.products.index');
    }

    public function data()
    {

        $data = Product::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('image', function ($data) {
                return '<img src="' . Storage::url($data->image) . '" width="150px">';
            })
            ->editColumn('price', function ($data) {
                return number_format($data->price, 0, '', ',');
            })
            ->editColumn('views', function ($data) {
                return number_format($data->views, 0, '', ',');
            })
            ->editColumn('brand_id', function ($data) {
                return $data->brand->name ?? "Null";
            })
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Hoạt động" : "Tạm dừng";
            })
            ->addColumn('action', function ($data) {
                return '
                        <a href="' . route('admin.product.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                        <a data-url_delete="' . route('admin.product.delete', $data->id) . '" class="btn btn-xs btn-danger delete-confirm" ><i class="fa fa-times"></i> Delete</a>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoryRepositoryEloquent $categoryRepository
     * @param BrandRepositoryEloquent $brandRepository
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CategoryRepositoryEloquent $categoryRepository, BrandRepositoryEloquent $brandRepository)
    {
        $data = [];
        $categories = $categoryRepository->findWhere(['status' => 1]);

        if (count($categories) > 0) {
            $data['categories'] = $categories;
        }
        $brands = $brandRepository->findWhere(['status' => 1]);
        if (count($categories) > 0) {
            $data['brands'] = $brands;
        }
        return view('admin.products.add', $data);
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

        $data = $request->only(['code', 'name', 'status', 'link_video', 'description', 'content', 'price', 'brand_id', 'price_old', 'condition']);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('products');
            $data['image'] = $file;
        }
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $url_images = [];
            foreach ($images as $image) {
                $file = $image->store('products');
                $url_images[] = $file;
            }
            $data['images'] = json_encode($url_images);
        }
        $product = $productRepository->create($data);
        if (!empty($request->get('categories_id'))) {
            $product->categories()->attach($request->get('categories_id'));
        }
        Alert::success('Thêm mới thành công');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @param ProductRepositoryEloquent $productRepository
     * @param CategoryRepositoryEloquent $categoryRepository
     * @param BrandRepositoryEloquent $brandRepository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, ProductRepositoryEloquent $productRepository, CategoryRepositoryEloquent $categoryRepository, BrandRepositoryEloquent $brandRepository)
    {
        $data['product'] = $productRepository->find($id);
        $data['images'] = json_decode($data['product']->images, true);

        $data['brands'] = $brandRepository->findWhere(['status' => 1]);
        $data['categories'] = $categoryRepository->findWhere(['status' => 1]);
        $data['categories_id'] = $data['product']->categories->pluck('id')->toArray();
        return view('admin.products.update', $data);
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
        $data = $request->only(['code', 'name', 'status', 'link_video', 'description', 'content', 'price', 'brand_id', 'price_old', 'condition']);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('products');
            $data['image'] = $file;
        }
        $update = $product->update($data);
        if ($update) {
            if (!empty($request->get('categories_id'))) {
                $product->categories()->sync($request->get('categories_id'));
            }
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.product.index');
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
        $productRepository->delete($id);
    }


    //up ảnh images của cars
    public function uploadFile(Request $request)
    {
        $product = Product::select('id', 'images')->find($request->get('product_id'));
        if (is_object($product)) {
            if ($request->hasFile('images')) {
                $file = $request->file('images')->store('products');
                $image = $file;
                $images = json_decode($product->images, true) ?? [];
                array_push($images, $image);
                $images = json_encode($images);
                if (!empty($images)) {
                    $product->update(['images' => $images]);
                    return response()->json([
                        'success' => true,
                    ]);
                }
            }
        }
        return response()->json([
            'success' => false,
        ]);
    }

    public function deleteFile(Request $request)
    {
        $product = Product::select('id', 'images')->find($request->get('product_id'));
        if (is_object($product)) {
            $images = json_decode($product->images, true);
            if (is_array($images) && count($images) > 0) {
                $file = str_replace(config('app.url') . '/storage/', '', $request->get('url_image'));
                $exists_file = Storage::exists($file);
                if ($exists_file) {
                    $delete = Storage::delete($file);
                    if ($delete) {
                        $key_exits = array_search($request->get('url_image'), $images);
                        if ($key_exits !== false) {
                            unset($images[$key_exits]);
                            $product->update(['images' => json_encode($images)]);
                            return response()->json([
                                'success' => true,
                            ]);
                        }
                    }
                } else {
                    $k = array_search($file, $images);
                    unset($images[$k]);
                    $product->update(['images' => json_encode($images)]);
                }
            }
        }
        return response()->json([
            'success' => false,
        ]);
    }

    public function resetFile()
    {
        $products = Product::select("id", "images")->whereNotNull("images")->get();
        foreach ($products as $product) {
            $images = json_decode($product->images, true);
            foreach ($images as $k => $img) {
                $exists_file = Storage::exists($img);
                if (!$exists_file) {
                    unset($images[$k]);
                }
            }
            $images = array_values($images);
            $product->update(['images' => json_encode($images)]);
        }
        Alert::success('Cập nhật thành công');
        return redirect()->back();
    }

}
