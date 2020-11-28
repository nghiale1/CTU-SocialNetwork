@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Danh sách loại vật dụng
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('/vendor/font-awesome/css/font-awesome.min.css')}}">
<style>
    thead {
        background-color: #3571ad;
        color: white;
    }

    thead th:first-child {
        border-radius: 10px 0px 0px 0px;
    }

    thead th:last-child {
        border-radius: 0px 10px 0px 0px;
    }

    .btn-primary {
        background-color: #28a745;
    }

    .btn-primary:hover {
        background-color: #3571ad;
    }

    .edi {
        border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        border-bottom-style: hidden;
        background-color: transparent;
        width: 100%;
    }

    .edi:hover {
        background-color: #11589f;
        color: white;
    }
</style>
@endpush

@section('content')

<div class="container">
    <div class="row">
        <h4>Danh sách vật dụng</h4>
        <!-- Blog Column -->
        <div class="">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Thêm loại vật dụng
            </button>
            <br><br>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="exampleModalLabel">Tạo mới</h5>
                        </div>
                        <form action="" method="post" id="frmcrtclb">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Tên loại vật dụng" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>

                    <tr>
                        <th>STT</th>
                        <th>Tên loại vật dụng</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    @foreach ($typeItems as $item)
                        <tr >
                            <td style="line-height: 50px;">{{ $stt++ }}</td>
                            <td style="line-height: 50px;">{{ $item->type_name }}</td>
                            <td style="line-height: 50px;">
                                <a href="#" style="color: blue;">Sửa</a>
                                {{-- <a href="#">Xóa</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>





        </div>
    </div>
</div>

@endsection
