<?php

namespace App\Http\Controllers\Api;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Bill\AddBillRequest;
use App\Repositories\BillRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Http\Response;

class BillController extends Controller
{
    public function addBill(AddBillRequest $request, BillRepositoryEloquent $billRepository, ProductRepositoryEloquent $productRepository)
    {
        $member = auth('api')->user();
        if (is_object($member)) {
            $product = Product::find($request->get('product_id'));
            if (is_object($product)){
                $billCheck = $billRepository->findWhere(['member_id' => $member->id, 'product_id' => $product->id, 'status' => 0])->first();
                if($member->price >= $product->price){
                    if (!is_object($billCheck)) {
                        $bill = $billRepository->create(array_merge(['member_id' => $member->id, 'product_id' => $product->id, 'price' => $product->price, 'status' => 0], $request->only(['email', 'phone', 'address', 'content'])));
                        if (is_object($bill)) {
                            $total = $member->price - $product->price;
                            $data['price'] = (int)$total;
                            $member->update($data);
                            $bill->member;
                            return response()->json([
                                'status' => true,
                                'msg' => 'Mua hàng thành công!',
                                'data' => $bill
                            ], Response::HTTP_OK);
                        } else {
                            return response()->json([
                                'status' => false,
                                'msg' => 'Mua hàng thất bại!!'
                            ], Response::HTTP_BAD_REQUEST);
                        }
                    } else {
                        return response()->json([
                            'status' => false,
                            'msg' => 'Bạn đã mua sản phẩm này rồi! Vui lòng đợi chúng tôi xử lý!'
                        ], Response::HTTP_CREATED);
                    }
                }else{
                    return response()->json([
                        'status' => false,
                        'msg' => 'Bạn không đủ tiền mua sản phẩm này'
                    ], Response::HTTP_CREATED);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'msg' => 'Sản phẩm không tồn tại!'
                ], Response::HTTP_FORBIDDEN);
            }

        }
        return response()->json([
            'status' => false,
            'msg' => 'Bạn chưa đăng nhập!'
        ], Response::HTTP_FORBIDDEN);
    }

    public function listBill(BillRepositoryEloquent $billRepository)
    {
        try {
            $member = auth('api')->user();
            if (is_object($member)) {
                $bills = $member->bills()->with('product')->get();
                return response()->json([
                    'status' => true,
                    'msg' => 'Danh sách đơn hàng của bạn!',
                    'data' => $bills
                ], Response::HTTP_OK);
            }
            return response()->json([
                'status' => false,
                'msg' => 'Bạn chưa đăng nhập!'
            ], Response::HTTP_FORBIDDEN);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'msg' => 'Lỗi! Vui lòng liên hệ quản trị!'
            ], Response::HTTP_BAD_REQUEST);
        }

    }
}
