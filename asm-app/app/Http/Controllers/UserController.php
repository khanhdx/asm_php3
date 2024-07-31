<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $listUser = $this->user->getAll();
        // $listSanPham = SanPham::with('san_phams.*')
        // ->orderBy('id', 'DESC')
        // ->get();
        // dd($listSanPham);
        //gọi đến view muốn hiển thị ra
        return view('admin.user.index', ['users' => $listUser]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //lấy ra danh mục
        //sử dụng query builder
        //hiện thị view add
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataInsert = [
            'name' => $request->password,
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($dataInsert);

        $this->user->createUser($dataInsert);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //form sửa sản phâm/lấy sản phẩm theo id
        $user = $this->user->find($id);

        if (!$user) {
            return redirect()->route('user.index');
        }
        return view('admin.user.update', compact('user'));
        // dd($san_pham);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //sử lý logic update
        //lấy lại thông tin sản phẩm
        $user = $this->user->find($id);
        //xử lý và lưu ảnh neus có ảnh mới upload

        $dataUpdate = [
            'name' => $request->password,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user->updateUser($dataUpdate, $id);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //xử lý logic xóa sản phẩm
        //tìm sản phẩm
        $user = $this->user->find($id);
        if (!$user) {
            return redirect()->route('user.index');
        }
        //xóa sản phẩm trong db
        $user->delete();

        return redirect()->route('user.index');
    }
}
