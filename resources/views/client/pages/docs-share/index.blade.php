@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Quản lý tài liệu
@endsection

@section('content')

<div class="row" style="margin-bottom: 20px;">
    <h1 class="text-center">Quản lý tài liệu cá nhân</h1>
    <p style="border-top: 2px solid blue;"></p>
    <div class="col-md-3">
        <div class="folder">
            <a href="#" class="btn btn-success" style="width: 100%;"><h4 style="overflow-y: hidden;"><i class="fa fa-folder" aria-hidden="true"></i> CT258 - Phát triển thương mại điện tử</h4></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="folder">
            <a href="#" class="btn btn-success" style="width: 100%;"><h4><i class="fa fa-folder" aria-hidden="true"></i> Folder 2</h4></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="folder">
            <a href="#" class="btn btn-success" style="width: 100%;"><h4><i class="fa fa-folder" aria-hidden="true"></i> Folder 3</h4></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="folder">
            <a href="#" class="btn btn-success" style="width: 100%;"><h4><i class="fa fa-folder" aria-hidden="true"></i> Folder 4</h4></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="file-loading">
            <input id="input-702" name="kartik-input-702[]" type="file" multiple>
        </div>
    </div>
</div>

<script>
    $('#file-1').fileinput({
        theme: 'fa',
        uploadUrl: "",
        uploadExtraData: function () {
            return {
                _token: $("input[name='_token']").val()
            }
        },
        allowedFileExtensions:['jpg','png','gif'],
        overwriteInitial: false,
        maxFileSize: 2000,
        maxFileNum: 5,
    });
</script>
@endsection
@push('script')
@endpush