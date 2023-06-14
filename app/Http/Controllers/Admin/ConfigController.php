<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Bank;
use App\Entities\Config;
use App\Entities\Widget;
use App\Http\Requests\Bank\CreateRequest;
use App\Http\Requests\Bank\UpdateRequest;
use App\Repositories\BankRepositoryEloquent;
use App\Http\Controllers\Controller;
use App\Repositories\WidgetRepository;
use App\Repositories\ConfigRepositoryEloquent;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class ConfigController extends Controller
{
    public function index()
    {
        return view('admin.configs.index');
    }

    public function data()
    {
        $data = Config::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('status', function ($data) {
                return $data->status == 0 ? "Tạm dừng" : "Hoạt động";
            })
            ->addColumn('action', function ($data) {
                return '<form action="' . route('admin.config.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.config.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.configs.add');
    }

    public function store(CreateRequest $request, ConfigRepositoryEloquent $bankRepository)
    {
        $data = $request->only(['meta_title','meta_description','meta_keywords','hotline','favicon','logo','status']);
        $bank = $bankRepository->create($data);
        if ($bank) {
            Alert::success('Thêm mới thành công');
            return redirect()->route('admin.config.index');
        }
        Alert::error('Thêm mới Thất bại');
        return redirect()->back();
    }

    public function edit($id, ConfigRepositoryEloquent $bankRepository)
    {
        $data['config'] = $bankRepository->find($id);
        return view('admin.configs.update', $data);
    }

    public function update($id, UpdateRequest $request, ConfigRepositoryEloquent $bankRepository)
    {
        $bank = $bankRepository->find($id);
        $data = $request->only(['meta_title','meta_description','meta_keywords','hotline','favicon','logo','status']);
        $update = $bank->update($data);
        if ($update) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.config.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    public function destroy($id, ConfigRepositoryEloquent $bankRepository)
    {
        try {
            $bankRepository->delete($id);
            Alert::success('Xóa thành công!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::success('Xóa Thất bại!');
            return redirect()->back();
        }

    }
}
