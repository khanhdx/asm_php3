<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    public $san_pham;
    public function __construct()
    {
        $this->san_pham = new SanPham();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listSanPham = $this->san_pham->getAll();
        // dd($listSanPham);
        //gọi đến view muốn hiển thị ra
        return view('admin.sanpham.index', ['san_phams' => $listSanPham]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //lấy ra danh mục
        //sử dụng query builder
        $danh_mucs = DB::table('danh_mucs')->get();
        //hiện thị view add
        return view('admin.sanpham.add', ['danh_mucs' => $danh_mucs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //sử lý ảnh
        if ($request->hasFile('hinh_anh')) {
            //nếu có đẩy hình ảnh
            $filename = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
        } else {
            $filename = null;
        }

        $dataInsert = [
            'ten_san_pham' => $request->ten_san_pham,
            'hinh_anh' => $filename,
            'so_luong' => $request->so_luong,
            'gia_san_pham' => $request->gia_san_pham,
            'gia_khuyen_mai' => $request->gia_khuyen_mai,
            'ngay_nhap' => $request->ngay_nhap,
            'mo_ta' => $request->mo_ta,
            'danh_muc_id' => $request->danh_muc_id,
            'trang_thai' => $request->trang_thai,
        ];
        // dd($dataInsert);

        $this->san_pham->createsanPham($dataInsert);
        return redirect()->route('sanpham.index');
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
        $sanPham = $this->san_pham->find($id);
        $danh_mucs = DB::table('danh_mucs')->get();

        if (!$sanPham) {
            return redirect()->route('sanpham.index');
        }
        return view('admin.sanpham.update', compact('sanPham', 'danh_mucs'));
        // dd($san_pham);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //sử lý logic update
        //lấy lại thông tin sản phẩm
        $sanPham = $this->san_pham->find($id);
        //xử lý và lưu ảnh neus có ảnh mới upload
        if ($request->hasFile('hinh_anh')) {
            if ($sanPham->hinh_anh) {
                Storage::disk('public')->delete($sanPham->hinh_anh);
            }
            //lưu ảnh mới
            $filename = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
        } else {
            $filename = $sanPham->hinh_anh;
        }

        $dataUpdate = [
            'ten_san_pham' => $request->ten_san_pham,
            'hinh_anh' => $filename,
            'so_luong' => $request->so_luong,
            'gia_san_pham' => $request->gia_san_pham,
            'gia_khuyen_mai' => $request->gia_khuyen_mai,
            'ngay_nhap' => $request->ngay_nhap,
            'mo_ta' => $request->mo_ta,
            'danh_muc_id' => $request->danh_muc_id,
            'trang_thai' => $request->trang_thai,
        ];

        $sanPham->updateSanPham($dataUpdate, $id);
        return redirect()->route('sanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //xử lý logic xóa sản phẩm
        //tìm sản phẩm
        $sanPham = $this->san_pham->find($id);
        if (!$sanPham) {
            return redirect()->route('sanpham.index');
        }
        //xáo hình ảnh của sản phẩm
        if ($sanPham->hinh_anh) {
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }
        //xóa sản phẩm trong db
        $sanPham->delete();

        return redirect()->route('sanpham.index');
    }
}
