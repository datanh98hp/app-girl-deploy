<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Banner;
use App\Http\Requests\Banner\CreateRequest;
use App\Http\Requests\Banner\UpdateRequest;
use App\Repositories\BannerRepositoryEloquent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banners.index');
    }

    public function data()
    {
        $data = Banner::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('image', function ($data) {
                return '<img src="' . Storage::url($data->image) . '" width="150px">';
            })
            ->addColumn('action', function ($data) {
                return '<form action="' . route('admin.banner.destroy', $data->id) . '" method="post">' .
                            method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.banner.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.banners.add');
    }

    public function store(CreateRequest $request, BannerRepositoryEloquent $bannerRepository)
    {
        $data = $request->only(['name']);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('banners');
            $data['image'] = $file;
        }
        $banner = $bannerRepository->create($data);
        if ($banner) {
            Alert::success('Thêm mới thành công');
            return redirect()->route('admin.banner.index');
        }
        Alert::error('Thêm mới Thất bại');
        return redirect()->back();
    }

    public function edit($id, BannerRepositoryEloquent $bannerRepository)
    {
        $data['banner'] = $bannerRepository->find($id);
        return view('admin.banners.update', $data);
    }

    public function update($id, UpdateRequest $request, BannerRepositoryEloquent $bannerRepository)
    {
        $banner = $bannerRepository->find($id);
        $data = $request->only(['name']);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('banners');
            $data['image'] = $file;
        }
        $update = $banner->update($data);
        if ($update) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.banner.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    public function destroy($id, BannerRepositoryEloquent $bannerRepository)
    {
        try {
            $bannerRepository->delete($id);
            Alert::success('Xóa thành công!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::success('Xóa Thất bại!');
            return redirect()->back();
        }

    }
}
