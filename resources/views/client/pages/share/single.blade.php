@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Chi tiết bài viết
@endsection
@push('css')
<style>
    .page-header {
        border-bottom: 0px solid #eee;
    }

    table {
        border-collapse: collapse;
        margin: 0 auto;
    }

    table td {
        padding: 1rem;
        border: 1px solid #ddd;
    }

    table tr:first-child td {
        border-top: 0;
    }

    table tr td:first-child {
        border-left: 0;
    }

    table tr:last-child td {
        border-bottom: 0;
    }

    table tr td:last-child {
        border-right: 0;
    }
    th._info {
    font-size: 16px;
    /* text-align: center; */
    color: #ff7410;
    font-weight: 500;
    text-transform: capitalize;
}
#item_content > p{
    color: #ff7410;
     font-size:18px;
     margin: -8px 0;
}
</style>
@endpush
@section('breadcrumb')
<ul class="brcmp">
    <li>
        <a href="{{route('share')}}">Chia sẻ</a>
        <i>|</i>
    </li>
    <li><a href="{{route('share.list',$post->type_slug)}}">
            {{$post->type_name}}
        </a>
       
    </li>
</ul>
@endsection
@section('content')

<!-- Page Content -->
<div class="row">
    <article class="col-md-8">
        {{-- <hr> --}}
        <div class="row">
            <div class="col-smd-12">
                <h1 class="sidebar-title" style="width:100%;">{{$post->item_title}}</h1>
            </div>
            <div class="col-md-12">
                <div class="entry-meta">
                    <span><i class="fa fa-calendar-o"></i> {{$day}}</span>
                    <span><i class="fa fa-user"></i> Bởi <a href="#">
                            {{$post->stu_name}}</a></span>
                    <div class="pull-right">
                        <span><i class="fa fa-eye"></i> {{$post->item_view_count}}</span>
                        <span><i class="fa fa-flag"></i><a href="#" title="Báo cáo" data-toggle="modal" data-target="#report"
                            data-modal="{!! $post->item_id!!}" class="clickModal">  Báo cáo
                        </a></span>
                        <span ><i class="fa fa-trash"></i><a href="{{ route('share.delete', ['id'=> $post->item_id]) }}">  Xóa bài viết</a></span>
                    </div>
                    @include('client.pages.share.report')
                </div>
            </div>
        </div>
        <br>
        <img src="{{asset($post->item_avatar)}}" class="img-responsive" alt="photo" />
   
        <br>
        {{-- <table class="table">
            <tr>
                <td style="width:40%">Giá bán</td>
                <td>
                    {{$post->item_price==0? 'Miễn phí' :$post->item_price}}
                </td>
            </tr>
            <tr>
                <td>Số điện thoại liên hệ</td>
                <td>{{$post->item_phone}}</td>
            </tr>
            <tr>
                <td>Người bán</td>
                <td>{{$post->item_name}}</td>
            </tr>
        </table> --}}
        
        <div class="form-group" style="color: black; font-size:18px">
            <label>Chú thích:</label>
            <span id="item_content">{!!$post->item_content!!}</span>
        </div>
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Giá bán:</th>
                    <th class="_info">{{$post->item_price==0? 'Miễn phí' :$post->item_price}}</th>
                </tr>
                <tr>
                    <th scope="row">Số điện thoại liên hệ:</th>
                    <th class="_info">{{$post->item_phone}}</th>
                </tr>
                <tr>
                    <th scope="row">Người đăng:</th>
                    <th class="_info">{{$post->item_name}}</th>
                </tr>
            </tbody>
          </table>

    </article>
    @include('client.pages.share.right')
</div>

@endsection