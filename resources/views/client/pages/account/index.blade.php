@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
tên
@endsection
@section('content')

<table class="table table-striped borderless">
    <tr>
        <td width="21%" height="22" align="right" class="level_1_1">Mã số sinh viên </td>
        <td width="24%" align="left" class="level_1_1">
            <strong>B1605229</strong> </td>
        <td width="23%" colspan="-1" align="right" class="level_1_1">Họ và tên </td>
        <td align="left" class="level_1_1">
            <strong>Lê Minh Nghĩa</strong> </td>
    </tr>
    <tr>
        <td height="22" align="right" class="level_1_2">Phái</td>
        <td align="left" class="level_1_2">
            <input name="rdoPhai" type="radio" id="radio" checked="checked" disabled="disabled">
            Nam
            <input name="rdoPhai" type="radio" id="radio" disabled="disabled">
            Nữ</td>
        <td colspan="-1" align="right" class="level_1_2">Ngày sinh</td>
        <td align="left" valign="middle" class="level_1_2"><strong>24/04/1998</strong>&nbsp; </td>
    </tr>
    <tr>
        <td height="22" align="right" class="level_1_1">Lớp</td>
        <td align="left" class="level_1_1"><strong>DI1695A1</strong>&nbsp;</td>
        <td colspan="-1" align="right" class="level_1_1">Khoa</td>
        <td align="left" class="level_1_1"><strong>K.Công nghệ Thông tin &amp;Truyền thông</strong>&nbsp;</td>
    </tr>
    <tr>
        <td width="21%" height="22" align="right" class="level_1_2">Chuyên ngành</td>
        <td align="left" class="level_1_2"><strong>95 - Hệ thống thông tin</strong>&nbsp;</td>
        <td width="23%" colspan="-1" align="right" class="level_1_2">Hệ đào tạo</td>
        <td align="left" class="level_1_2"><strong>Đại học - Chính quy</strong>&nbsp;</td>
    </tr>
    <tr>
        <td width="21%" height="22" align="right" class="level_1_1">Ngày vào Đoàn</td>
        <td align="left" class="level_1_1"><input type="hidden" id="testtest"
                value="date_default_timezone_set: Asia/Ho_Chi_Minh"><strong>
                20-11-2014 </strong>&nbsp;</td>
        <td width="23%" colspan="-1" align="right" class="level_1_1">Thuộc chi đoàn</td>
        <td align="left" class="level_1_1"><strong>DI1695A1 - Hệ thống thông tin khóa 42-A1</strong>&nbsp; </td>
    </tr>
    <tr>
        <td width="21%" height="22" align="right" class="level_1_1">Thuộc chi hội</td>
        <td align="left" class="level_1_1"><input type="hidden" id="testtest"
                value="date_default_timezone_set: Asia/Ho_Chi_Minh"><strong>
                Ninh Kiều </strong>&nbsp;</td>
        <td width="23%" colspan="-1" align="right" class="level_1_1">Ngày tham gia</td>
        <td align="left" class="level_1_1"><strong>01/01/2020</strong>&nbsp; </td>
    </tr>
    <tr>
        <td width="21%" height="22" align="right" class="level_1_1">Lượt like</td>
        <td align="left" class="level_1_1"><input type="hidden" id="testtest"
                value="date_default_timezone_set: Asia/Ho_Chi_Minh"><strong>
                1 </strong>&nbsp;</td>
        <td width="23%" colspan="-1" align="right" class="level_1_1">Lượt report</td>
        <td align="left" class="level_1_1"><strong>0</strong>&nbsp; </td>
    </tr>
    <tr>
        <td width="21%" height="22" align="right" class="level_1_1">Bài viết đã đăng</td>
        <td align="left" class="level_1_1"><input type="hidden" id="testtest"
                value="date_default_timezone_set: Asia/Ho_Chi_Minh"><strong>
                0 </strong>&nbsp;</td>
        <td width="23%" colspan="-1" align="right" class="level_1_1">Lượt comment</td>
        <td align="left" class="level_1_1"><strong>0</strong>&nbsp; </td>
    </tr>
    <tr>
        <td width="21%" height="22" align="right" class="level_1_1">Đã like</td>
        <td align="left" class="level_1_1"><input type="hidden" id="testtest"
                value="date_default_timezone_set: Asia/Ho_Chi_Minh"><strong>
                0 </strong>&nbsp;</td>
        <td width="23%" colspan="-1" align="right" class="level_1_1">Đã report</td>
        <td align="left" class="level_1_1"><strong>0</strong>&nbsp; </td>
    </tr>
</table>
<h3>Câu lạc bộ đã tham gia</h3>
<table class="table table-striped borderless">
    <tr>
        <th>STT</th>
        <th>Tên câu lạc bộ</th>
        <th>Ngày tham gia</th>
        <th>Bài viết đã xem</th>
        <th>Tổng bài viết</th>
        <th>Tỉ lệ đóng góp khi tham gia</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Tương lai xanh</td>
        <td>1/1/2020</td>
        <td>5</td>
        <td>5</td>
        <td>100%</td>
    </tr>
</table>
<h3>Vật dụng đã chia sẻ</h3>
<table class="table table-striped borderless">
    <tr>
        <th>STT</th>
        <th>Tên vật dụng</th>
        <th>Ngày trao tặng</th>
        <th>Lượt cảm ơn</th>
        <th>Lượt không thích</th>
        <th>Lượt xem</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Laptop Macbook pro 2019</td>
        <td>Chưa tặng</td>
        <td>1000</td>
        <td>0</td>
        <td>1000</td>
    </tr>
</table>
<h3>Câu hỏi đã trao đổi trên diễn đàn</h3>
<table class="table table-striped borderless">
    <tr>
        <th>STT</th>
        <th>Năm học học kỳ</th>
        <th>Mã học phần</th>
        <th>Tên học phần</th>
        <th>Lượt phúc đáp</th>
        <th>Lượt xem</th>
    </tr>
    <tr>
        <td>1</td>
        <td>2019-2020 HK 1</td>
        <td>CT123</td>
        <td>Môn 123</td>
        <td>0</td>
        <td>100</td>
    </tr>
</table>

@endsection