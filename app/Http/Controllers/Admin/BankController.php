<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Bank;
use App\Http\Requests\Bank\CreateRequest;
use App\Http\Requests\Bank\UpdateRequest;
use App\Repositories\BankRepositoryEloquent;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class BankController extends Controller
{
    public function index()
    {
        return view('admin.banks.index');
    }

    public function data()
    {
        $data = Bank::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('status', function ($data) {
                return $data->status == 0 ? "Tạm dừng" : "Hoạt động";
            })
            ->addColumn('action', function ($data) {
                return '<form action="' . route('admin.bank.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.bank.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.banks.add');
    }

    public function store(CreateRequest $request, BankRepositoryEloquent $bankRepository)
    {
        $data = $request->only(['name','account','number','branch','status']);
        $bank = $bankRepository->create($data);
        if ($bank) {
            Alert::success('Thêm mới thành công');
            return redirect()->route('admin.bank.index');
        }
        Alert::error('Thêm mới Thất bại');
        return redirect()->back();
    }

    public function edit($id, BankRepositoryEloquent $bankRepository)
    {
        $data['bank'] = $bankRepository->find($id);
        return view('admin.banks.update', $data);
    }

    public function update($id, UpdateRequest $request, BankRepositoryEloquent $bankRepository)
    {
        $bank = $bankRepository->find($id);
        $data = $request->only(['name','account','number','branch','status']);
        $update = $bank->update($data);
        if ($update) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.bank.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    public function destroy($id, BankRepositoryEloquent $bankRepository)
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
