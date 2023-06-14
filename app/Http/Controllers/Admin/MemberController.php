<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Member;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\CreateRequest;
use App\Http\Requests\Member\UpdateRequest;
use App\Repositories\MemberRepositoryEloquent;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class MemberController extends Controller
{
    public function index()
    {
        return view('admin.members.index');
    }

    public function data()
    {
        $data = Member::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('avatar', function ($data) {
                return '<img src="' . $data->avatar . '" width="150px">';
            })
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Hoạt động" : "Tạm dừng";
            })
            ->addColumn('action', function ($data) {
                return '
                        <form action="' . route('admin.member.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.member.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['avatar', 'action'])
            ->make(true);
    }

    public function create(MemberRepositoryEloquent $memberRepository)
    {
        return view('admin.members.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param MemberRepositoryEloquent $memberRepository
     * @return void
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateRequest $request, MemberRepositoryEloquent $memberRepository)
    {
        $data = array_merge(['password' => bcrypt($request->get('password'))], $request->only(['name', 'user_name', 'email', 'address', 'description', 'status', 'phone']));
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar')->store('public/members');
            $url = Storage::url($file);
            $data['avatar'] = asset($url);
        }
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image')->store('public/members');
            $url = Storage::url($file);
            $data['cover_image'] = asset($url);
        }
        $brand = $memberRepository->create($data);
        if ($brand) {
            Alert::success('Thêm mới thành công');
            return redirect()->route('admin.member.index');
        }
        Alert::error('Thêm mới Thất bại');
        return redirect()->back();
    }


    public function edit($id, MemberRepositoryEloquent $memberRepository)
    {
        $data['member'] = $memberRepository->find($id);
        return view('admin.members.update', $data);
    }

    public function update($id, UpdateRequest $request, MemberRepositoryEloquent $memberRepository)
    {
        $member = $memberRepository->find($id);
        $data = $request->only(['name', 'user_name', 'email', 'address', 'description', 'status', 'phone']);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar')->store('public/members');
            $url = Storage::url($file);
            $data['avatar'] = asset($url);
        }
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image')->store('public/members');
            $url = Storage::url($file);
            $data['cover_image'] = asset($url);
        }
        $update = $member->update($data);
        if ($update) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.member.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param MemberRepositoryEloquent $memberRepository
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, MemberRepositoryEloquent $memberRepository)
    {
        try {
            $memberRepository->delete($id);
            Alert::success('Xóa thành công!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::success('Xóa Thất bại!');
            return redirect()->back();
        }

    }
}
