@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Quản lý tài liệu - Tên môn
@endsection

@section('content')
<div class="row">
    <a href="{{ url("http://127.0.0.1:8000/tai-khoan/tai-lieu?nienkhoa=$nkSelected&hocky=$hkSelected") }}" class="label label-default">Quay lại trang môn học</a>
</div>
<div class="row" style="margin-bottom: 20px;">
    <h1 class="text-center">Tài liệu môn: {{ $folder->fo_name }}</h1>
    <p style="border-top: 2px solid blue;"></p>

    <div class="col-md-12" style="margin-bottom: 10px;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1">
            Tải tệp lên
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
            Tạo thư mục
        </button>

    </div>
</div>
<div class="row" style="margin-bottom: 20px;">
    {{-- {{ dd($folder->fo_child) }} --}}
    @if ($folder->fo_child != null)
        <div class="col-md-12">
            <a href="{{ route('chi-tiet-thu-muc', [
                'nkSelected' => $nkSelected1->school_year_id,
                'hkSelected' => $hkSelected1->semester_id,
                'nameFolder'=> $folder_child->fo_slug,
                ]) }}" class="label label-warning">Quay lại</a>
        </div>
    @endif
    <br>
    <br>
    @if (count($folder_detail) > 0)
        @foreach ($folder_detail as $item)
            <div class="col-md-3">
                <div class="folder">
                    <a href="{{ route('chi-tiet-thu-muc', [
                        'nkSelected' => $nkSelected1->school_year_id,
                        'hkSelected' => $hkSelected1->semester_id,
                        'nameFolder'=> $item->fo_slug,
                        ]) }}" class="btn btn-success" style="width: 100%;">
                        <h5 style="font-size: 10px;">
                            <i class="fa fa-folder" aria-hidden="true"></i> {{$item->fo_name}}
                        </h5>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-md-3">
            <div class="folder">
                <h5>Thư mục rỗng</h5>
            </div>
        </div>
    @endif

</div>
<!-- Modal Upload file-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tải tệp lên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="form-group">
                    <div class="file-loading">
                        <input id="input-res-1" name="input-res-1[]" type="file" multiple>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
    </div>
    </div>
</div>
<!-- Modal tạo thư mục-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tạo thư mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('tao-thu-muc-con') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Đường dẫn hiện tại: {{ $folder->fo_directory }}</label>
                </div>
                <input name="mathumuchientai" type="hidden" value="{{$folder->fo_id}}">
                <input name="mamon" type="hidden" value="{{ $folder->sub_id }}">
                <input name="duongdan" type="hidden" value="{{$folder->fo_directory}}">
                <div class="form-group">
                    <label>Tên thư mục</label>
                    <input type="text" class="form-control" name="tenthumuc"  placeholder="Nhập tên thư mục cần tạo . . ">
                    <small id="emailHelp" class="form-text text-muted">Đặt tên thư mục liên quan đến môn học</small>
                </div>
                <button type="submit" class="btn btn-primary">Tạo</button>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
    </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#input-res-1").fileinput({
            uploadUrl: "/site/test-upload",
            enableResumableUpload: true,
            initialPreviewAsData: true,
            maxFileCount: 5,
            theme: 'fas',
            deleteUrl: '/site/file-delete',
            fileActionSettings: {
                showZoom: function(config) {
                    if (config.type === 'pdf' || config.type === 'image') {
                        return true;
                    }
                    return false;
                }
            }
        });

        $('.file-drop-zone-title').text('Kéo & thả file vào đây');
        $('.file-caption-name').attr('placeholder','Chọn file tải lên');
        $('.close fileinput-remove').style('display','none');
    });
    </script>
@endsection
@push('script')
@endpush
