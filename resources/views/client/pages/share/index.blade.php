@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Chia sẻ
@endsection

@section('content')

<div class="row">
    <!-- Blog Column -->
    <div class="col-md-8">
        <h1 class="page-header sidebar-title">
            Chia sẻ
            <span style="float: right"><button class="btn btn-ctu"
                    onclick="window.location.href='{{route('share.create')}}'"> Thêm vật dụng chia sẻ</button> </span>
        </h1>
        <!--
                        First Blog Post -->
        <div class="row blogu">

            @forelse ($share as $item)
            <div class="col-md-3">

                <div class="card" style="width: 18rem;">
                    <a href="{{route('share.show',$item->item_slug)}}">
                        <img src="{{asset($item->item_avatar)}}" class="img-responsive card-img-top"
                            alt="{{asset($item->item_avatar)}}">
                    </a>
                    <span>{{$day[$item->item_id]}}</span>
                    <span style="float: right"><i class="fa fa-eye" aria-hidden="true"></i>
                        {{$item->item_view_count}}</i></span>
                    <div class="card-body">
                        <a href="{{route('share.show',$item->item_slug)}}">
                            <h4>{{$item->item_title}}</h4>
                        </a>
                        <ul style="    padding-left: 0px;">
                            <li>{{number_format($item->item_price)}} đ</li>
                            <li>{{$item->item_phone}}</li>
                            <li>{{$item->item_name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <h2 class="blog-title">Chưa có vật dụng nào được chia sẻ
            </h2>
            @endforelse
            {!!$share->links()!!}
        </div>
        <hr>



        <div class="text-center">
            <ul class="pagination">
                <li class="active"> <a href="#">1</a> </li>
                <li> <a href="#">2</a> </li>
                <li> <a href="#">3</a> </li>
                <li> <a href="#">4</a> </li>
                <li> <a href="#">5</a> </li>
                <li> <a href="#">Next</a> </li>
            </ul>
        </div>
    </div>
    @include('client.pages.share.right')
</div>

@endsection
@push('script')
@endpush