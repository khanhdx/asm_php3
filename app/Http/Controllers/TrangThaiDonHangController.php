<?php

namespace App\Http\Controllers;

use App\Models\TrangThaiDonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TrangThaiDonHangController extends Controller
{
    public $trang_thai_don_hang;
    public function __construct()
    {
        $this->trang_thai_don_hang = new TrangThaiDonHang();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trangThaiDonHang = TrangThaiDonHang::all();
        return view('admin.trangthaidonhang.index', ['trang_thai_don_hangs' => $trangThaiDonHang]);
        // dd($danhMuc);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        //hiện thị view add
        return view('admin.trangthaidonhang.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //sử lý ảnh

        $dataInsert = [
            'ten_trang_thai' => $request->ten_trang_thai,
        ];
        // dd($dataInsert);

        $this->trang_thai_don_hang->createtrangThaiDonHang($dataInsert);
        return redirect()->route('trangthaidonhang.index');
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
        //form sửa sản phâm/lấy danh mục theo id
        $trangThaiDonHang = $this->trang_thai_don_hang->find($id);
        // $danh_mucs = DB::table('danh_mucs')->get();

        if (!$trangThaiDonHang) {
            return redirect()->route('trangthaidonhang.index');
        }
        return view('admin.trangthaidonhang.update', compact('trangThaiDonHang'));
        // , 'danh_mucs'
        // dd($san_pham);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //sử lý logic update
        //lấy lại thông tin sản phẩm
        $trangThaiDonHang = $this->trang_thai_don_hang->find($id);
        //xử lý và lưu ảnh neus có ảnh mới upload
        $dataUpdate = [
           'ten_trang_thai' => $request->ten_trang_thai,
        ];

        $trangThaiDonHang->updatetrangThaiDonHang($dataUpdate, $id);
        return redirect()->route('trangthaidonhang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //xử lý logic xóa sản phẩm
        //tìm sản phẩm
        $trangThaiDonHang = $this->trang_thai_don_hang->find($id);
        if (!$trangThaiDonHang) {
            return redirect()->route('trangthaidonhang.index');
        }
        //xóa sản phẩm trong db
        $trangThaiDonHang->delete();

        return redirect()->route('trangthaidonhang.index');
    }
}
