<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\TrangThaiDonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DonHangController extends Controller
{
    public $don_hang;
    public function __construct()
    {
        $this->don_hang = new DonHang();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $listSanPham = $this->san_pham->getAll();
        $listDonHang = DonHang::with('trangThaiDonHang:id,ten_trang_thai')
        ->orderBy('id', 'DESC')
        ->get();
        // dd($listSanPham);
        //gọi đến view muốn hiển thị ra
        return view('admin.donhang.index', ['don_hangs' => $listDonHang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //lấy ra danh mục
        //sử dụng query builder
        $trang_thai_don_hangs = DB::table('trang_thai_don_hangs')->get();
        //hiện thị view add
        return view('admin.donhang.add', ['trang_thai_don_hangs' => $trang_thai_don_hangs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //sử lý ảnh
        $dataInsert = [
            'ma_don_hang' => $request->ma_don_hang,
            'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
            'email_nguoi_nhan' => $request->email_nguoi_nhan,
            'so_dien_thoai_nguoi_nhan' => $request->so_dien_thoai_nguoi_nhan,
            'dia_chi_nguoi_nhan' => $request->dia_chi_nguoi_nhan,
            'ngay_dat' => $request->ngay_dat,
            'tong_tien' => $request->tong_tien,
            'ghi_chu' => $request->ghi_chu,
            'trang_thai_id' => $request->trang_thai_id,
        ];
        // dd($dataInsert);

        $this->don_hang->createdonHang($dataInsert);
        return redirect()->route('donhang.index');
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
        $donHang = $this->don_hang->find($id);
        $trang_thai_don_hangs = DB::table('trang_thai_don_hangs')->get();

        if (!$donHang) {
            return redirect()->route('donhang.index');
        }
        return view('admin.donhang.update', compact('donHang', 'trang_thai_don_hangs'));
        // dd($san_pham);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //sử lý logic update
        //lấy lại thông tin sản phẩm
        $donHang = $this->don_hang->find($id);
        //xử lý và lưu ảnh neus có ảnh mới upload
        $dataUpdate = [
           'ma_don_hang' => $request->ma_don_hang,
            'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
            'email_nguoi_nhan' => $request->email_nguoi_nhan,
            'so_dien_thoai_nguoi_nhan' => $request->so_dien_thoai_nguoi_nhan,
            'dia_chi_nguoi_nhan' => $request->dia_chi_nguoi_nhan,
            'ngay_dat' => $request->ngay_dat,
            'tong_tien' => $request->tong_tien,
            'ghi_chu' => $request->ghi_chu,
            'trang_thai_id' => $request->trang_thai_id,
        ];

        $donHang->updateDonHang($dataUpdate, $id);
        return redirect()->route('donhang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //xử lý logic xóa sản phẩm
        //tìm sản phẩm
        $donHang = $this->don_hang->find($id);
        if (!$donHang) {
            return redirect()->route('donhang.index');
        }
        //xóa sản phẩm trong db
        $donHang->delete();

        return redirect()->route('donhang.index');
    }
}
