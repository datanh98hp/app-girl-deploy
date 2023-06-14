<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Bank\CreateRequest;
use App\Http\Requests\Api\Bank\UpdateRequest;
use App\Repositories\BankRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BankController extends Controller
{
    /**
     * Danh sách thẻ ngân hàng
     * @group Bank
     * @response 200 {
     * "status": true,
     * "msg": "List bank",
     * "data": [
     * {
     * "id": 80,
     * "name": "Ngân hàng Hồ Chí Minh",
     * "number": "544362206",
     * "branch": "Hồ Chí Minh",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03"
     * },
     * {
     * "id": 79,
     * "name": "Ngân hàng Hồ Chí Minh",
     * "number": "560748166",
     * "branch": "Hồ Chí Minh",
     * "status": 1,
     * "created_at": "2021-04-26 02:57:03",
     * "updated_at": "2021-04-26 02:57:03"
     * }
     * ]
     * }
     *
     *
     * @param BankRepositoryEloquent $bankRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(BankRepositoryEloquent $bankRepository)
    {
        $banks = $bankRepository->orderBy('id','desc')->get();
        return response()->json([
            'status' => true,
            'msg' => 'Danh sách ngân hàng!',
            'data' => $banks
        ], Response::HTTP_OK);
    }

    /**
     * Thêm mới
     * @group Bank
     * @response 200 {
     * "status": true,
     * "msg": "Thêm mới ngân hàng thành công!",
     * "data": {
     * "name": "Techcombank",
     * "number": "231312313212",
     * "branch": "Hà Nội",
     * "status": "1",
     * "updated_at": "2021-04-28 12:54:38",
     * "created_at": "2021-04-28 12:54:38",
     * "id": 83
     * }
     * }
     * @param BankRepositoryEloquent $bankRepository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function postAdd(BankRepositoryEloquent $bankRepository, CreateRequest $request)
    {
        $data['name'] = $request->get('name');
        $data['number'] = $request->get('number');
        $data['branch'] = $request->get('branch');
        $data['status'] = $request->get('status');
        $bank = $bankRepository->create($data);
        if ($bank) {
            return response()->json([
                'status' => true,
                'msg' => 'Thêm mới ngân hàng thành công!',
                'data' => $bank,
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Thêm mới thất bại!',
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Chi tiết
     * @group Bank
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Chỉnh sửa ngân hàng: Ngân hàng Hồ Chí Minh",
     * "data": {
     * "id": 1,
     * "name": "Ngân hàng Hồ Chí Minh",
     * "number": "700349509",
     * "branch": "Hồ Chí Minh",
     * "status": 1,
     * "created_at": "2021-04-26 01:58:49",
     * "updated_at": "2021-04-26 01:58:49"
     * }
     * }
     *
     * @param $id
     * @param BankRepositoryEloquent $bankRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUpdate($id, BankRepositoryEloquent $bankRepository)
    {
        $bank = $bankRepository->find($id);
        if (is_object($bank)) {
            return response()->json([
                'status' => true,
                'msg' => 'Chỉnh sửa ngân hàng: ' . $bank->name,
                'data' => $bank
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Ngân hàng không tồn tại!',
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Cập nhật
     * @group Bank
     * @urlParam id
     * @response 200 {
     * "status": true,
     * "msg": "Cập nhật thành công!",
     * "data": {
     * "id": 1,
     * "name": "Techcombank",
     * "number": "123456789",
     * "branch": "Hà Nội",
     * "status": "1",
     * "created_at": "2021-04-26 01:58:49",
     * "updated_at": "2021-04-28 13:04:23"
     * }
     * }
     * @param $id
     * @param BankRepositoryEloquent $bankRepository
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate($id, BankRepositoryEloquent $bankRepository, UpdateRequest $request)
    {
        $bank = $bankRepository->find($id);
        if (is_object($bank)) {
            $data['name'] = $request->get('name');
            $data['number'] = $request->get('number');
            $data['branch'] = $request->get('branch');
            $data['status'] = $request->get('status');
            $bank->update($data);
            return response()->json([
                'status' => true,
                'msg' => 'Cập nhật thành công!',
                'data' => $bank
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => true,
            'msg' => 'Cập nhật không thành công!',
            'data' => $bank
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Xóa
     * @group Bank
     * @urlParam id
     * @response 200 {
    * "status": true,
     * "msg": "Xóa thành công!"
     * }
     *
     *
     * @param $id
     * @param BankRepositoryEloquent $bankRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function postDelete($id, BankRepositoryEloquent $bankRepository)
    {
        $bank = $bankRepository->find($id);
        if (is_object($bank)) {
            $bank->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Xóa thành công!',
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => false,
            'msg' => 'Xác thất bại!',
        ], Response::HTTP_BAD_REQUEST);
    }
}
