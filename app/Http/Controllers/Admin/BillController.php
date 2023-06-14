<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Bank;
use App\Entities\Bill;
use App\Http\Requests\Bank\CreateRequest;
use App\Http\Requests\Bank\UpdateRequest;
use App\Repositories\BankRepositoryEloquent;
use App\Http\Controllers\Controller;
use App\Repositories\BillRepositoryEloquent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class BillController extends Controller
{
    public function index()
    {
        return view('admin.bills.index');
    }

    public function data()
    {
        $data = Bill::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('member_id', function ($data) {
                return $data->member->name ?? "Không xác định";
            })
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Đã xử lý" : "Chờ xử lý";
            })
            ->editColumn('product_id', function ($data) {
                return $data->product->name ?? 'Không xác định';
            })
            ->editColumn('price', function ($data) {
                return number_format($data->price, 0, '', ',');
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format("d/m/Y H:i:s");
            })
            ->addColumn('action', function ($data) {
                return '<form action="' . route('admin.bill.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.bill.show', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Chi tiết</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show($id, BillRepositoryEloquent $billRepository)
    {
        $data['bill'] = $billRepository->find($id);
        return view('admin.bills.show', $data);
    }

    public function update($id, Request $request, BillRepositoryEloquent $billRepository)
    {
        $bill = $billRepository->find($id);
        $data = $request->only(['status']);
        $update = $bill->update($data);
        if ($update) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.bill.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    public function destroy($id, BillRepositoryEloquent $billRepository)
    {
        try {
            $billRepository->delete($id);
            Alert::success('Xóa thành công!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::success('Xóa Thất bại!');
            return redirect()->back();
        }

    }
}
