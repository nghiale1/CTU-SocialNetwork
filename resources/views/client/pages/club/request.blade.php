@extends('client.client')
@push('css')
<style>
    .avatar {
        width: 100%;
    }
</style>
@endpush
{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Yêu cầu tham gia
@endsection

@section('content')

<div class="row">

    {{-- @forelse ($list as $key=>$item)
        <ul>
            <li class="{{$key}}">

    {{$item->stu_code}} <br>
    {{$item->stu_name}} mssv <br>
    {{$item->cs_created}} ngày <br>
    <a href="#" data-data="{{$item->stu_code}}" data-url="{{$item->c_slug}}" data-no="{{$key}}" class="accept">Duyệt</a>
    <a href="#" data-data="{{$item->stu_code}}" data-url="{{$item->c_slug}}" data-no="{{$key}}" class="denied">Xóa</a>
    </li>
    </ul>
    @empty
    <h3>Không có yêu cầu nào</h3>
    @endforelse --}}


    <div class="col-md-8">
        {{-- <div data-url="{{$club->c_slug}}" id="slug"></div> --}}
    <div class="row">

        @forelse ($list as $key=>$item)
        <div class="{{$key}}">
            <div class="col-md-2">
                <img src="{{asset($item->stu_avatar)}}" alt="" class="avatar">
            </div>
            <div class=" col-md-8 ">
                <h4 style="display: inline">
                    {{$item->stu_code}}
                </h4>
                <h4>

                    {{$item->stu_name}}<br>
                </h4>
                <p style="padding: 0;margin:0">

                    ngày: {{$item->cs_created}} <br>
                </p>
                <a href="#" data-data="{{$item->stu_code}}" data-url="{{$item->c_slug}}" data-no="{{$key}}"
                    class="accept" style="color: #2f9de3">Duyệt</a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" data-data="{{$item->stu_code}}" data-url="{{$item->c_slug}}" data-no="{{$key}}"
                    class="denied" style="color: red">Xóa</a>

            </div>

            <div class="col-md-12">&nbsp;</div>
        </div>
        @empty
        <h3>Không có yêu cầu nào</h3>
        @endforelse
    </div>






</div>
<!-- Blog Sidebar Column -->
@include('client.pages.club.sidebar')




</div>

@endsection
@push('script')
<script>
    $(document).ready(function(){
        $(".accept").click(function(e){
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
                url: "{{route('club.accept',"+slug+")}}",
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
        $(".denied").click(function(e){
            e.preventDefault(); 
            var id=$(this).attr('data-data');
            var slug=$(this).attr('data-url');
            var no=$(this).attr('data-no');
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('club.denied',"+slug+")}}",
                data: {id:id,slug:slug},
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