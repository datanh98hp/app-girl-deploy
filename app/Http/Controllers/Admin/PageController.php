<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Page;
use App\Http\Requests\Page\CreateRequest;
use App\Http\Requests\Page\UpdateRequest;
use App\Repositories\PageRepositoryEloquent;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index');
    }

    public function data()
    {
        $data = Page::select('*')->orderBy('id', 'desc');
        return DataTables::of($data)
            ->editColumn('status', function ($data) {
                return $data->status == 1 ? "Hoạt động" : "Tạm dừng";
            })
            ->addColumn('action', function ($data) {
                return '
                        <form action="' . route('admin.page.destroy', $data->id) . '" method="post">' .
                    method_field('DELETE') . csrf_field() . '
                            <a href="' . route('admin.page.edit', $data->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Delete</button>
                        </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.pages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param PageRepositoryEloquent $pageRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateRequest $request, PageRepositoryEloquent $pageRepository)
    {
        $data = $request->only(['name', 'content', 'status']);
        $page = $pageRepository->create($data);
        if ($page) {
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
     * @param PageRepositoryEloquent $pageRepository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, PageRepositoryEloquent $pageRepository)
    {
        $data['page'] = $pageRepository->find($id);
        return view('admin.pages.update', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param $id
     * @param UpdateRequest $request
     * @param PageRepositoryEloquent $pageRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateRequest $request, PageRepositoryEloquent $pageRepository)
    {
        $page = $pageRepository->find($id);
        $data = $request->only(['name', 'content', 'status']);
        $update = $page->update($data);
        if ($update) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.page.index');
        }
        Alert::error('Cập nhật thất bại');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param PageRepositoryEloquent $pageRepository
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, PageRepositoryEloquent $pageRepository)
    {
        try {
            $pageRepository->delete($id);
            Alert::success('Xóa thành công!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::success('Xóa Thất bại!');
            return redirect()->back();
        }

    }
}
