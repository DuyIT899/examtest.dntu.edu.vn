<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHocPhan extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_IndependentClass';

    protected $primaryKey = 'IndependentClassID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('vnk_IndependentClass.del', '=' , 0);

        });
    }

    public function Khoa(){
        return $this->hasOne(Khoa::class, 'DepartmentID', 'DepartmentID');
    }

    public function Mon(){
        return $this->hasOne(Mon::class, 'ModulesID', 'ModulesID');
    }

    public function KhoaHoc(){
        return $this->hasOne(KhoaHoc::class, 'CourseID', 'CourseID');
    }

    public function SinhViens(){
        return $this->belongsToMany(SinhVien::class, 'vnk_IndependentClassUser', 'IndependentClassID', 'UserID');
    }

    public function scopeKhoiTao($query)
    {
        return $query->where('Status', 0);
    }

    public function scopeDaPhanCongGiangDay($query)
    {
        return $query->where('Status', 1);
    }

    public function scopeDangNhapDiemThanhPhan($query)
    {
        return $query->where('Status', 2);
    }

    public function scopeDangXetDieuKienDuThi($query)
    {
        return $query->where('Status', 3);
    }

    public function scopeDaGuiDiemThanhPhan($query)
    {
        return $query->where('Status', 4);
    }

    public function scopeDaLapDanhSachThi($query)
    {
        return $query->where('Status', 5);
    }

    public function scopeDangDuThi($query)
    {
        return $query->where('Status', 6);
    }

    public function scopeDaLamPhach($query)
    {
        return $query->where('Status', 7);
    }

    public function scopeDaDonTuiBaiThi($query)
    {
        return $query->where('Status', 8);
    }

    public function scopeDaChamDiem($query)
    {
        return $query->where('Status', 9);
    }

    public function scopeDaTongHopDiemL1($query)
    {
        return $query->where('Status', 10);
    }

    public function scopeDaTongHopDiemL2($query)
    {
        return $query->where('Status', 11);
    }

    public function scopeDaXacNhanHoanThanh($query)
    {
        return $query->where('Status', 12);
    }

    public function scopeDaChuyenDiemTinhTBCTL($query)
    {
        return $query->where('Status', 13);
    }

    public function TrangThai()
    {
        $Status = $this->Status;
        if($Status == 0) return 'Khởi tạo';
        if($Status == 1) return 'Đã phân công giảng dạy';
        if($Status == 2) return 'Đang nhập điểm thành phần';
        if($Status == 3) return 'Đang xét điều kiện thi' ;
        if($Status == 4) return 'Đã gửi điểm thành phần';
        if($Status == 5) return 'Đã lập danh sách thi';
        if($Status == 6) return 'Đang dự thi';
        if($Status == 7) return 'Đã làm phách';
        if($Status == 8) return 'Đã dồn túi bài thi';
        if($Status == 9) return 'Đã chấm điểm';
        if($Status == 10) return 'Đã tổng hợp điểm L1';
        if($Status == 11) return 'Đã tổng hợp điểm L2';
        if($Status == 12) return 'Đã xác nhận hoàn thành';
        if($Status == 13) return 'Đã chuyển điểm tính TBCTL';
        return;
    }

    public function TrangThaiDangKy()
    {
        $StatusID = $this->StatusID;
        if($StatusID == 0) return 'Khởi tạo';
        if($StatusID == 1) return 'Cho phép đăng ký';
        if($StatusID == 2) return 'Khóa đăng ký';
        if($StatusID == 3) return 'Đã ra quyết định';
        return;
    }
}
