<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
{{-- <script src="  {{ asset('vendor/jquery/jquery.min.js') }} "></script> --}}
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
{{-- <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script> --}}

<!-- Page level custom scripts -->
{{-- <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script> --}}
{{-- <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script> --}}

<!-- Page level custom scripts -->
{{-- <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script> --}}
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
@stack('crud-ajax-js')
</body>
</html>
<script>
    // $('#managar_cate').on('click', function(){
    //     $.ajax({
    //       type: "GET",
    //       url: "/category-list",
    //       dataType: "",
    //       success: function (data) {
    //         $('body').html(data);
    //       }
    //     });
    // })
</script>
