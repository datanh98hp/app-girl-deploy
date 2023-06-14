<?php

namespace App\Http\Controllers\Api;

use App\Entities\Girl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GirlRepositoryEloquent;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GirlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList(Request $request, GirlRepositoryEloquent $girlRepository)
    {
        //
        $list = $girlRepository->orderBy('id', 'desc')->get();
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách sản phẩm',
            'data' => $list
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
        $validate = $request->validate([
            'img' => 'required|mimes:jpeg,png,jpg,gif',
            'video_src' => 'required|mimes:mp4,mov,ogg,qt | max:20000',
        ]);
        //
        $new = new Girl;
        $new->name = $request->name;
        $new->age = $request->age;
        if ($request->hasFile('video_src')) {
            # code...
            $file = $request->file('video_src')->store('public/girls');
            $url = Storage::url($file);
            $new->video_src = asset($url);
        }
        // if ($request->hasFile('img')) {
        //     // new image
        //     $file = $request->file('video_src')->store('public/girls');
        //     $url = Storage::url($file);
            
        // }

        $new->country = $request->country;
        $new->category_id = $request->category_id;
        $new->description = $request->description;
        $new->save();

        return response()->json([
            'status' => true,
            'msg' => 'Đã tạo thành công',
            'data' => $new
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = Girl::find($id);
        
        if (is_object($item)) {
            $item->update(['viewCount' => $item->viewCount + 1]);
            $girls_arr = $item->toArray();
            
            $girls_arr['images'] = json_decode($girls_arr['images'], true);

            return response()->json([
                'status' => true,
                'msg' => 'Chi tiết: ' . $item->name,
                'data' => $girls_arr,
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Không tìm thấy sản phẩm'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUpdate($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDelete($id)
    {
        //
    }
}
