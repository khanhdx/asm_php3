<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\ChiTietDonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChiTietDonHangController extends Controller
{
    public $chi_tiet_don_hang;
    public function __construct()
    {
        $this->chi_tiet_don_hang = new ChiTietDonHang();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $listSanPham = $this->san_pham->getAll();
        $listChiTietDonHang = ChiTietDonHang::with('donHang:id,ma_don_hang,ten_nguoi_nhan,email_nguoi_nhan,so_dien_thoai_nguoi_nhan,dia_chi_nguoi_nhan,ngay_dat,tong_tien,ghi_chu,trang_thai_id','sanPham:id,ten_san_pham,hinh_anh,so_luong,gia_san_pham,gia_khuyen_mai,ngay_nhap,mo_ta,danh_muc_id,trang_thai')
        ->orderBy('id', 'DESC')
        ->get();
        // dd($listSanPham);
        //gọi đến view muốn hiển thị ra
        return view('admin.chitietdonhang.index', ['chi_tiet_don_hangs' => $listChiTietDonHang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //lấy ra danh mục
        //sử dụng query builder
        $don_hangs = DB::table('don_hangs')->get();
        $san_phams = DB::table('san_phams')->get();
        //hiện thị view add
        return view('admin.chitietdonhang.add', ['don_hangs' => $don_hangs],['san_phams' => $san_phams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //sử lý ảnh
        $dataInsert = [
            'don_hang_id' => $request->don_hang_id,
            'san_pham_id' => $request->san_pham_id,
            'so_luong' => $request->so_luong,
            'gia' => $request->gia,
            'thanh_tien' => $request->thanh_tien,
        ];
        // dd($dataInsert);

        $this->chi_tiet_don_hang->createchiTietDonHang($dataInsert);
        return redirect()->route('chitietdonhang.index');
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
        $chiTietDonHang = $this->chi_tiet_don_hang->find($id);
        $don_hangs = DB::table('don_hangs')->get();
        $san_phams = DB::table('san_phams')->get();
        if (!$chiTietDonHang) {
            return redirect()->route('chitietdonhang.index');
        }
        return view('admin.chitietdonhang.update', compact('chiTietDonHang','don_hangs','san_phams'));
        // dd($san_pham);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //sử lý logic update
        //lấy lại thông tin sản phẩm
        $chiTietDonHang = $this->chi_tiet_don_hang->find($id);
        //xử lý và lưu ảnh neus có ảnh mới upload
        $dataUpdate = [
            'don_hang_id' => $request->don_hang_id,
            'san_pham_id' => $request->san_pham_id,
            'so_luong' => $request->so_luong,
            'gia' => $request->gia,
            'thanh_tien' => $request->thanh_tien,
        ];

        $chiTietDonHang->updateChiTietDonHang($dataUpdate, $id);
        return redirect()->route('chitietdonhang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //xử lý logic xóa sản phẩm
        //tìm sản phẩm
        $chiTietDonHang = $this->chi_tiet_don_hang->find($id);
        if (!$chiTietDonHang) {
            return redirect()->route('chitietdonhang.index');
        }
        //xóa sản phẩm trong db
        $chiTietDonHang->delete();

        return redirect()->route('chitietdonhang.index');
    }
}
