@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Quản lý tài liệu - Tên môn
@endsection

@section('content')
<div class="row">
    
</div>
<div class="row" style="margin-bottom: 20px;">
    <h1 class="text-center">Quản lý tài liệu cá nhân</h1>
    <p style="border-top: 2px solid blue;"></p>

    <div class="col-md-12" style="margin-bottom: 10px;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
            Tải tệp lên
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
    </div>
    

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