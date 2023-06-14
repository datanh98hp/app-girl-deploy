<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Contact;
use App\Repositories\ContactRepositoryEloquent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contacts.index');
    }

    public function data()
    {
        $data = Contact::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Đã xử lý" : "Chưa xử lý";
            })
            ->addColumn('action', function ($data) {
                return '<form action="' . route('admin.contact.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.contact.show', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Xem</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show($id, ContactRepositoryEloquent $contactRepository)
    {
        $data['contact'] = $contactRepository->find($id);
        return view('admin.contacts.show', $data);
    }

    public function update($id, Request $request, ContactRepositoryEloquent $contactRepository)
    {
        $contact = $contactRepository->find($id);
        $data = $request->only(['status']);
        $update = $contact->update($data);
        if ($update) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.contact.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }
    public function destroy($id, ContactRepositoryEloquent $contactRepository)
    {
        try {
            $contactRepository->delete($id);
            Alert::success('Xóa thành công!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::success('Xóa Thất bại!');
            return redirect()->back();
        }

    }
}
