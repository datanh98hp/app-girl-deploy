<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Repositories\UserRepositoryEloquent;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function data()
    {
        $data = User::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('avatar', function ($data) {
                return '<img src="' . Storage::url($data->avatar) . '" width=150px>';
            })
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Hoạt động" : "Tạm dừng";
            })
            ->addColumn('action', function ($data) {
                return '
                        <form action="' . route('admin.user.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.user.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['avatar', 'action'])
            ->make(true);
    }

    public function changePassword()
    {
        $data['user'] = Auth::user();
        return view('admin.users.change_password', $data);
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if ((Hash::check($request->get('old_password'), $user->password))) {
            $user->update([
                'password' => bcrypt($request->get('new_password'))
            ]);
            Alert::success('Đổi mật khẩu thành công!');
            return redirect()->route('admin.user.index');
        }
        Alert::error('Nhập sai mật khẩu!');
        return redirect()->back();
    }

    public function create()
    {
        return view('admin.users.add');
    }

    public function store(CreateRequest $request, UserRepositoryEloquent $userRepository)
    {
        $data = array_merge(['password' => bcrypt($request->get('password'))], $request->only(['name', 'email', 'status']));
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar')->store('users');
            $data['avatar'] = $file;
        }
        $user = $userRepository->create($data);
        if ($user) {
            Alert::success('Thêm mới thành công!');
            return redirect()->route('admin.user.index');
        }
        Alert::error('Thêm mới Thất bại');
        return redirect()->back();
    }


    public function edit($id, UserRepositoryEloquent $userRepository)
    {
        $data['user'] = $userRepository->find($id);
        return view('admin.users.update', $data);
    }

    public function update($id, UpdateRequest $request, UserRepositoryEloquent $userRepository)
    {
        $user = $userRepository->find($id);
        $data = $request->only(['name', 'email', 'status']);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar')->store('users');
            $data['avatar'] = $file;
        }
        $update = $user->update($data);
        if ($update) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.user.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param UserRepositoryEloquent $userRepository
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, UserRepositoryEloquent $userRepository)
    {
        try {
            $userRepository->delete($id);
            Alert::success('Xóa thành công!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::success('Xóa Thất bại!');
            return redirect()->back();
        }

    }
}
