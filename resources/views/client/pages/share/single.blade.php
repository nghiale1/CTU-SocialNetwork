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
</style>
@endpush
@section('breadcrumb')
<ul class="brcmp">
    <li>
        <a href="">Chia sẻ</a>
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
        <h1 class="sidebar-title">{{$post->item_title}}</h1>
        {{-- <hr> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="entry-meta">
                    <span><i class="fa fa-calendar-o"></i> {{$day}}</span>
                    <span><i class="fa fa-user"></i> Bởi <a href="#">
                            {{$post->stu_name}}</a></span>
                    <div class="pull-right">
                        <span><i class="fa fa-eye"></i> {{$post->item_view_count}}</span>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <img src="{{asset($post->item_avatar)}}" class="img-responsive" alt="photo" />
        <br>
        <table class="table">
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
        </table>
        <p>{!!$post->item_content!!}</p>

    </article>
    @include('client.pages.share.right')
</div>

@endsection