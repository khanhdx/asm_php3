<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    public $danh_muc;
    public function __construct()
    {
        $this->danh_muc = new DanhMuc();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhMuc = DanhMuc::all();
        return view('admin.danhmuc.index', ['danh_mucs' => $danhMuc]);
        // dd($danhMuc);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        //hiện thị view add
        return view('admin.danhmuc.add');
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
            $filename = $request->file('hinh_anh')->store('uploads/danhmuc', 'public');
        } else {
            $filename = null;
        }

        $dataInsert = [
            'hinh_anh' => $filename,
            'ten_danh_muc' => $request->ten_danh_muc,
            'mo_ta' => $request->mo_ta,
        ];
        // dd($dataInsert);

        $this->danh_muc->createdanhMuc($dataInsert);
        return redirect()->route('danhmuc.index');
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
        $danhMuc = $this->danh_muc->find($id);
        // $danh_mucs = DB::table('danh_mucs')->get();

        if (!$danhMuc) {
            return redirect()->route('danhmuc.index');
        }
        return view('admin.danhmuc.update', compact('danhMuc'));
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
        $danhMuc = $this->danh_muc->find($id);
        //xử lý và lưu ảnh neus có ảnh mới upload
        if ($request->hasFile('hinh_anh')) {
            if ($danhMuc->hinh_anh) {
                Storage::disk('public')->delete($danhMuc->hinh_anh);
            }
            //lưu ảnh mới
            $filename = $request->file('hinh_anh')->store('uploads/danhmuc', 'public');
        } else {
            $filename = $danhMuc->hinh_anh;
        }

        $dataUpdate = [
            'hinh_anh' => $filename,
            'ten_danh_muc' => $request->ten_danh_muc,
            'mo_ta' => $request->mo_ta,
        ];

        $danhMuc->updatedanhMuc($dataUpdate, $id);
        return redirect()->route('danhmuc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //xử lý logic xóa sản phẩm
        //tìm sản phẩm
        $danhMuc = $this->danh_muc->find($id);
        if (!$danhMuc) {
            return redirect()->route('danhmuc.index');
        }
        //xáo hình ảnh của sản phẩm
        if ($danhMuc->hinh_anh) {
            Storage::disk('public')->delete($danhMuc->hinh_anh);
        }
        //xóa sản phẩm trong db
        $danhMuc->delete();

        return redirect()->route('danhmuc.index');
    }
}
