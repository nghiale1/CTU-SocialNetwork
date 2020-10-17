@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Chia sẻ
@endsection
@push('css')
<style>
    .style-color {
        font-size: 16px;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        margin: 10px 0;
    }

    div#myModal {
        width: 65%;
        height: 500px;
        margin: 113px auto;
        margin-left: 359px;
    }

    #close {
        font-size: 52px;
        margin-right: 134px;
        margin-top: -14px;
    }

    .card {
        width: 100% !important;
        text-align: center;
    }

    .card img {
        width: 100%;
    }
</style>
@endpush
@section('content')

<div class="row">
    <!-- Blog Column -->
    <div class="col-md-8">

        <!--
                        First Blog Post -->
        <div class="row blogu">
            <div id="content">
                <div class="row">

                    @forelse ($type as $item)
                    <div class="col-md-2">
                        <a href="{{route('share.type',$item->type_slug)}}">

                            <div class="card" style="width: 18rem;">
                                <img src="{{asset($item->type_image)}}" class="card-img-top" alt="{{$item->type_name}}">
                                <div class="card-body">
                                    <p class="card-text">{{$item->type_name}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty <p>Không có dữ liệu</p>
                    @endforelse
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

@endsection
@push('script')
<script>
    $('.image').click(function (e) { 
        e.preventDefault();
        var id =$(this).attr("data-id");
        // Get the modal
        ;

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg"+id);
        var modalImg = document.getElementById("img01");
        $('#myModal').show();
        modalImg.src = this.src;

    

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        // img.click(){
        //     $('#myModal').hidden();
        // }
        $('#img01').click(function (e) { 
            e.preventDefault();
            // alert("tat");
            $('#myModal').hide();
        });
    });

</script>
@endpush