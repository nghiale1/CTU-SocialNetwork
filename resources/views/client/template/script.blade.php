<!-- jQuery -->
<script src="{{asset('client/js/jquery.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('vendor/tinymce/langs/vi.js')}}"></script>
<script src="{{asset('vendor/vuejs/vue.js')}}"></script>

{{-- dấu * màu đỏ --}}
<script>
    Vue.component('star-red', {
    template: '<span style="color: red">*</span>',
});
</script>
<script>
    var app=new Vue({
        el:'#app'
    });
</script>
<script>
    tinymce.init({
        selector:'.tiny',
        language: 'vi',
        branding: false,
        plugins: '  paste importcss searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media   table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists wordcount imagetools textpattern noneditable  charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
        });
</script>


<!--Jquery Smooth Scrolling-->
<script>
    $(document).ready(function(){
                $('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click',function (e) {
                    e.preventDefault();

                    var target = this.hash;
                    var $target = $(target);

                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top
                    }, 900, 'swing', function () {
                        window.location.hash = target;
                    });
                });

                $('a.page-scroll').bind('click', function(event) {
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1500, 'easeInOutExpo');
                    event.preventDefault();
                });

               $(".nav a").on("click", function(){
                     $(".nav").find(".active").removeClass("active");
                    $(this).parent().addClass("active");
            	});

                $('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
                    $(window).scroll(function () {
                        if ($(this).scrollTop() != 0) {
                            $('#toTop').fadeIn();
                        } else {
                            $('#toTop').fadeOut();
                        }
                    }); 
                $('#toTop').click(function(){
                    $("html, body").animate({ scrollTop: 0 }, 700);
                    return false;
                });

            });
</script>
@stack('script')