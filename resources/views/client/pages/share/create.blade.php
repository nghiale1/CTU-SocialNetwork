@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Đặt câu hỏi
@endsection
@push('css')
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
@endpush
@section('content')
<!-- Page Content -->
<div class="row">
    <div class="col-md-8">
        <form action="{{route('share.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table table-responsive borderless text-right">
                <tr>
                    <td>Chọn loại tin</td>
                    <td>
                        <select name="type" id="" class="form-control">
                            @foreach ($type as $item)
                            <option value="{{$item->type_id}}">{{$item->type_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Chọn ảnh <red-star></red-star>
                    </td>
                    <td><img id="image" alt="Chọn hình đại diện" style="max-height: 185px;
                            float: left;
                            width: 230px;" src="https://via.placeholder.com/230x185" />

                </tr>
                <tr>
                    <td></td>
                    <td><label for="avatar" style="float: left">Chọn ảnh đại diện của tin...</label>
                        <input type="file" name="avatar" id="avatar" accept="image/*" style="display:none;"
                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                    </td>
                </tr>
                <tr>
                    <td style="white-space: nowrap;">Tiêu đề <red-star></red-star>
                    </td>
                    <td><input type="text" class="form-control" name="title" required>
                        <br></td>
                </tr>
                <tr>
                    <td style="white-space: nowrap;">Giá bán <red-star></red-star>
                    </td>
                    <td><input type="number" class="form-control" id="price" name="price" required min="0" step="any"
                            onKeyUp="if(this.value>1000000000){this.value='1000000000';}else if(this.value<0){this.value='0';}"
                            class="form-control input-transparent" value="0">
                        <br>
                        <div id="showPrice" style="float: left;color:red">Miễn phí</div>
                    </td>
                </tr>
                <tr>
                    <td style="white-space: nowrap;">Tên người bán <red-star></red-star>
                    </td>
                    <td><input type="text" class="form-control" name="name" required>
                        <br></td>
                </tr>
                <tr>
                    <td style="white-space: nowrap;">Số điện thoại liên lạc <red-star></red-star>
                    </td>
                    <td><input type="tel" class="form-control" name="phone" required>
                        <br></td>
                </tr>
                <tr>
                    <td style="white-space: nowrap;">Nội dung <red-star></red-star>
                    </td>
                    <td>
                        <textarea name="content" id="" class="tiny" cols="30" rows="20"></textarea>

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: left">
                        <button type="submit" class="btn btn-ctu">Đăng bài</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    @include('client.pages.share.right')
</div>

@endsection
@push('script')
<script>
    $(document).ready(function(){
        $('#price').keyup(function(){
            var value=$(this).val();
            console.log(value);
            if(value!=0){

            value= parseFloat(value).toLocaleString('en-US');
            $('#showPrice').html(value+' đ');
            }
            else{

            $('#showPrice').val(0);
            $('#showPrice').html('Miễn phí');
            }
        });
    });
</script>
@endpush