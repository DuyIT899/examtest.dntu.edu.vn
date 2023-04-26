<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoanThu extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'ChannelAmount';

    protected $primaryKey = 'ChannelAmountID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });

        static::addGlobalScope(function ($query) {
            $query->where('IsLock', '=' , 0);

        });
    }

    public function SoTien(){
        return $this->hasOne(KhoanThuSoTien::class, 'ChannelAmountID', 'ChannelAmountID')
                    ->orderBy('ApplicateDate','DESC');

    }
}

// Thư viện, tài liệu học vụ, thẻ sinh viên
// Đồng phục thể dục thể thao
// Bảo hiểm y tế
// Bảo hiểm tai nạn
// Tiếng Anh căn bản 1
// Ký túc xá (10 tháng)
// Ký túc xá (5 tháng)
// Học phí
// Giao dịch tài khoản
// Nạp thẻ tài khoản
// Thanh toán tiền nội trú
// KTX tiền Điện
// KTX tiền Nước
// Lệ phí phúc khảo
// Lệ phí thi cải thiện
// Lệ phí thi
// Làm lại thẻ sinh viên
// Xin giấy xác nhận sinh viên
// Xác nhận lịch học
// Xin chuyển lớp danh nghĩa
// Xin chuyển lớp học phần
// Chuyển ngành học
// Đăng ký học phần (quá hạn)
// Hủy học phần đã đăng ký
// Xin chuyển điểm
// Xin miễn học phần
// Xin hoãn thi kết thúc học phần
// Đơn xin bổ sung thi cuối kỳ
// Xin Bảo lưu
// Đề nghị xác nhận học phí
// Xin cấp giấy hoàn thành chương trình học
// Xin cấp giấy chứng nhận tốt nghiệp tạm thời
// Xin cấp chứng chỉ Tin học
// Xin cấp chứng chỉ Ngoại ngữ
// Xin cấp chứng chỉ Kỹ năng mềm
// Xin thi lại kết thúc học phần (áp dụng cho trường hợp hoãn thi được duyệt, đơn gửi trước ngày thi 01 tuần)
// Phúc khảo điểm thi kết thúc học phần
// Đăng ký học cải thiện
// Đơn xin gia hạn học phí
// Cấp bản sao văn bằng chứng chỉ
// Cấp bảng điểm quá trình
// Cấp bảng điểm tốt nghiệp
// Cấp bản sao bằng tốt nghiệp
// Xin học môn học thay thế
// Xác nhận vay vốn
// Xác nhận cấp bù tiền miễn giảm học phí
// Xác nhận sổ ưu đãi trong giáo dục
// Đăng ký xét tốt nghiệp
// Đăng ký học lại (đối với sinh viên liên thông)
// Bổ sung ôn thi tiếng Anh chuẩn đầu ra
// Kiểm tra năng lực tiếng Anh
// Đăng ký thi lại kỹ năng mềm
// Cấp giấy giới thiệu thực tập
// Bảo hiểm y tế
// Thư viện và tiện ích thư viện năm học 2017-2018
// Kiểm tra năng lực tiếng Anh
// Thư viện, tài liệu học vụ, thẻ sinh viên (LT)
// Sao y bản chính hoặc xác nhận lý lịch nội bộ
// Chứng chỉ Giáo dục thể chất
// Chứng chỉ Giáo dục Quốc phòng
// Xác nhận điểm GDTC/ GDQP
// Khoản thu xét tốt nghiệp
// Lệ phí nhập học Cao học
// Lệ phí đăng ký xét tuyển (Học bạ)
// Lệ phí đăng ký xét tuyển (Phiếu điểm)
// Lệ phí đăng ký dự thi liên thông
// Lệ phí đăng ký ôn thi Liên thông (NN)
// Lệ phí đăng ký ôn thi Liên thông (CS)
// Lệ phí đăng ký ôn thi Liên thông (CN)
// Lệ phí đăng ký dự thi cao học (3 môn)
// Lệ phí đăng ký dự thi cao học (2 môn)
// Lệ phí đăng ký ôn thi cao học (NN)
// Lệ phí đăng ký ôn thi cao học (CS)
// Lệ phí đăng ký ôn thi cao học (CN)
// Bảo hiểm tai nạn
// Bảo hiểm y tế 2017 (3 tháng)
// Bảo hiểm y tế (3 tháng)
// Sinh viên học bổ sung
// Đề nghị sao y Giấy báo nhập học
// Bảo hiểm y tế (9 tháng)
// Bảo hiểm y tế (6 tháng)
// Ôn thi Tiếng Anh chuẩn đầu ra (trình độ tương đương B1)
// Đăng ký học lại (cao học)
// Tiếng anh trình độ B1
// Bảo hiểm y tế (15 tháng)
// Bảo hiểm y tế (12 tháng)
// Tiếng Anh 1
// Thư viện và tiện ích thư viện năm học 2018-2019
// Công nợ chuyển điểm
//  Môn học bổ sung (Cao học)
// Lệ phí học bổ sung (Cao học)
// Bảo hiểm y tế 3 tháng năm 2018
// Lệ phí học bổ sung
// Lệ phí học bổ sung (CN)
// Vay vốn đợt 1 năm 2018 (1T)
// Vay vốn đợt 1 năm 2018 (2T)
// Vay vốn đợt 1 năm 2018 (3T)
// Vay vốn đợt 1 năm 2018 (4T)
// Vay vốn đợt 1 năm 2018 (5T)
// Vay vốn đợt 1 năm 2018 (6T)
// Bảo hiểm y tế năm 2019
// Vay vốn đợt 2 năm 2018 (3T)
// Vay vốn đợt 2 năm 2018 (4T)
// Vay vốn đợt 2 năm 2018 (5T)
// Vay vốn đợt 2 năm 2018 (6T)
// Vay vốn đợt 2 năm 2018 (7T)
// Vay vốn đợt 2 năm 2018 (8T)
// Tiếng Anh B1
// Ôn thi Tin B
// Lệ phí thi Tin B
// Vay vốn đợt 3 năm 2018 (3T)
// Vay vốn đợt 3 năm 2018 (4T)
// Vay vốn đợt 3 năm 2018 (5T)
// Vay vốn đợt 3 năm 2018 (6T)
// Vay vốn đợt 3 năm 2018 (7T)
// Đồng phục Bơi lội (Nam)
// Đồng phục Bơi lội (Nữ)
// Thư viện và tiện ích thư viện năm học 2019-2020
// Lệ phí cấp chứng chỉ
// Vay vốn đợt 1 năm 2019 (3T)
// Vay vốn đợt 1 năm 2019 (4T)
// Vay vốn đợt 1 năm 2019 (5T)
// Vay vốn đợt 1 năm 2019 (4T)
// Vay vốn đợt 1 năm 2019 (6T)
// Vay vốn đợt 1 năm 2019 (7T)
// Vay vốn đợt 1 năm 2019 (8T)
// Vay vốn đợt 1 năm 2019 (6T)
// Bảo hiểm y tế năm 2020
// Phí đăng ký phòng tập DNTU FITNESS  (full time)
// Phí đăng ký phòng tập DNTU FITNESS  (fart time)
// Phí đăng ký phòng tập DNTU FITNESS  (part time)
// Vay vốn đợt 2 năm 2019 (3T)
// Vay vốn đợt 2 năm 2019 (4T)
// Vay vốn đợt 2 năm 2019 (5T)
// Vay vốn đợt 2 năm 2019 (6T)
// Vay vốn đợt 2 năm 2019 (7T)
// Lệ phí đăng ký dự thi cao học (1 môn)
// Nghiệp vụ hướng dẫn viên du lịch nội địa
// Nghiệp vụ hướng dẫn viên du lịch quốc tế
// Nghiệp vụ hướng dẫn viên du lịch quốc tế
// Vay vốn đợt 2 năm 2019 (8T)
// Vay vốn đợt 3 năm 2019 (5T)
// Vay vốn đợt 3 năm 2019 (6T)
// Vay vốn đợt 3 năm 2019 (7T)
// Xin cấp chứng chỉ Giáo dục Quốc phòng
// Lệ phí cấp chứng chỉ GDQP
// Vay vốn đợt 3 năm 2019 (4T)
// Đoàn phí 2020-2021
// Đoàn phí 2019-2020
// Đoàn phí 2018-2019
// Đoàn phí 2017-2018
// Đoàn phí
// Bảo hiểm y tế năm 2021
// Vay vốn đợt 1 năm 2020 (2T)
// Vay vốn đợt 1 năm 2020 (4T)
// Vay vốn đợt 1 năm 2020 (5T)
// Vay vốn đợt 1 năm 2020 (6T)
// Vay vốn đợt 1 năm 2020 (7T)
// Vay vốn đợt 1 năm 2020 (8T)
// Vay vốn đợt 1 năm 2020 (9T)
// Lệ phí đăng ký xét tuyển Đại học (Học bạ) online
// Thư viện và tiện ích thư viện năm học 2020-2021
// Lệ phí đăng ký xét tuyển Đại học (Học bạ) online
// Đăng ký thẻ gửi xe tự động (lần đầu)
// Tiện ích Thư viện, thẻ sinh viên, Ba lô
// Khoản nhập học (Đồng phục TDTT)
// Bảo hiểm y tế năm 2022
// Phí gửi xe máy theo lượt
// Phí kích hoạt thẻ gửi xe tự động
// Phí gửi xe máy theo tháng
// Phí gửi xe máy theo tháng KTX
// Hoàn trả Bảo hiểm y tế
// Thu bổ sung đơn giá (2 tín chỉ)
// Thu bổ sung đơn giá (4 tín chỉ)
// Thu bổ sung đơn giá (6 tín chỉ)
// Thu bổ sung đơn giá (8 tín chỉ)
// AGRIBANK
// Đoàn phí 2021-2022
// Thư viện và tiện ích thư viện năm học 2021-2022
// In lại văn bằng
// Đăng ký thẻ gửi xe tự động (cấp lại)
// Nhập học Liên thông NNA
// Lệ phí đăng ký xét tuyển Đại học (Học bạ) online
// Lệ phí đăng ký xét tuyển Đại học (Học bạ) online
