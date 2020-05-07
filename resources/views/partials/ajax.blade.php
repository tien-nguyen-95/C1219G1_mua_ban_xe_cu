<Script type="text/javascript">

$(document).ready(function($){
    $('#add').click(function(){
        $('#form-add').trigger("reset");
        $('#btn-add').trigger("add");
        $('#modal-add').modal('show');
    });
});

$(document).ready(function(){
    $('#btn-add').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
        $.ajax({
            url:"/brands",
            type:'post',
            data:{
                name: $('#name').val()
            },
            success:function(response) {
                // toastr.success('Add new brand success! ')
                $('#modal-add').modal('hide');
                setTimeout(function(){
                    window.location.href="{{ route('brands.index') }}";
                },500);
            },
            error:function(jqXHR,textStatus,errorThrown){
                alert('create không thành công');
            }
        })
    })
});
</Script>

