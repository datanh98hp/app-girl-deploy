<?php

namespace App\Http\Controllers;

use App\Entities\Brand;
use App\Entities\Category;
use App\Entities\Contact;
use App\Entities\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
class ProductController extends Controller
{
    protected $bathView = 'endUser';
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        return view($this->bathView.'.productList');
    }
    public function brandList(){
        $data['brands'] = Brand::all();
        return view($this->bathView.'.brandList')->with($data);
    }
    public function categoryList(){
        $data['categories'] = Category::all();
        return view($this->bathView.'.categoryList')->with($data);
    }
    public function show($id){
        $data['product'] =  Product::find($id);
        return view($this->bathView.'.productDetail')->with($data);
    }
    public function productByBrand($idBrand){
        $data['products'] =  Product::where('brand_id',$idBrand)->get();
        return view($this->bathView.'.productByBrand')->with($data);
    }
    public function contact(){

        return view($this->bathView.'.contact');
    }

    /**
     * @return string
     */
    public function saveContact(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:contacts',
                'phone' => 'required|min:10',
                'address' => 'required',
        ],[
            'required' => ':attribute không được rỗng',
            'unique' => ':attribute đã tồn tại',
            'email' => ':attribute phải là địa chỉ email hợp lệ',
            'min' => ':attribute phải có ít nhất :min kí tự',
        ],[
            'name' => 'Tài khoản',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'content' => 'Nội dung',
            'address' => 'Địa chỉ',
        ]
        );
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->content = $request->content;
        $contact->save();
        \Session::flash('success', 'Đăng ký thành công,chúng tôi sẽ liên hệ với bạn sớm nhất !');

        return redirect()->back();
    }
   public function search(Request $request){
      $keyword = $request->keyword;
      $data['products'] = Product::where('name', 'like', '%' . $keyword . '%')
          ->orWhere('description', 'like', '%' . $keyword . '%')
          ->orWhere('content', 'like', '%' . $keyword . '%')
          ->get();
      $data['keyword'] = $keyword;
       return view($this->bathView.'.productResult')->with($data);
   }
}
