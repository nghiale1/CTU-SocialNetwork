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

        @forelse ($list as $key=>$item)
        <ul>
            <li class="{{$key}}">

                {{$item->stu_code}} <br>
                {{$item->stu_name}} mssv <br>
                {{$item->cs_created}} ngày <br>
                <a href="#" data-data="{{$item->stu_code}}" data-url="{{$item->c_slug}}" data-no="{{$key}}"
                    class="accept">Duyệt</a>
                <a href="#" data-data="{{$item->stu_code}}" data-url="{{$item->c_slug}}" data-no="{{$key}}"
                    class="denied">Xóa</a>
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