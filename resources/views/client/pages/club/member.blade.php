@extends('client.client')
@push('css')
<style>

</style>
@endpush
{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Yêu cầu tham gia
@endsection

@section('content')

<div class="row">
    <!-- Blog Column -->
    <div class="col-md-8">
        <div data-url="{{$club->c_slug}}" id="slug"></div>
        @forelse ($list as $key=>$item)
        <ul>
            <li class="{{$key}}">

                {{$item->stu_code}} mssv<br>
                {{$item->stu_name}} họ tên <br>
                {{$item->cs_created}} ngày tham gia <br>
                {{$item->count}} số bài đăng <br>
                <select name="role" id="" class="role" data-no="{{$item->stu_code}}">
                    <option value="CNCLB" @if($item->cs_role=='CNCLB') selected @endif>CNCLB</option>
                    <option value="PCNCLB" @if($item->cs_role=='PCNCLB') selected @endif>PCNCLB</option>
                    <option value="UVCLB" @if($item->cs_role=='UVCLB') selected @endif>UVCLB</option>
                    <option value="TV" @if($item->cs_role=='TV') selected @endif>TV</option>
                </select>
                <a href="#" data-data="{{$item->stu_code}}" data-url="{{$club->c_slug}}" data-no="{{$key}}"
                    class="delete">Xóa</a>
            </li>
        </ul>
        @empty
        <h3>Không có yêu cầu nào</h3>
        @endforelse






    </div>
</div>

@endsection
@push('script')
<script>
    $(document).ready(function(){
        var selected = $(".role option:selected");
        $(".role").change(function(e){
            if(!confirm("bạn có chắc chắn")){
                selected.prop("selected", true);
                return false;
            }
            selected = $(this).find("option:selected");
            //mssv
            var code=$(this).attr('data-no');
            //vai trò
            var value=$(this).val();
            //slug
            var slug=$("#slug").attr('data-url');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('club.changeRole',"+slug+")}}",
                data: {code:code,value:value,slug:slug},
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if(response=='error'){
                        alert('có lỗi xảy ra, vui lòng thử lại');
                    }
                },
            });
        });
        $(".delete").click(function(e){
            if(!confirm("bạn có chắc muốn xóa")){
                return false;
            }
            e.preventDefault(); 
            var code=$(this).attr('data-data');
            var slug=$(this).attr('data-url');
            var no=$(this).attr('data-no');
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('club.delete',"+slug+")}}",
                data: {code:code,slug:slug},
                dataType: "json",
                success: function (response) {
                    $('.'+no).addClass('hidden');
                    if(response=='error'){
                        alert('có lỗi xảy ra, vui lòng thử lại');
                    }
                },
            });
        });
    });

</script>
@endpush