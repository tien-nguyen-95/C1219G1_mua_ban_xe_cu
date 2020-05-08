$(document).ready(function() {
    init();
});
function init(msg=null){
    $.get('/branch').done(function(data){
        $('body').html(data);
        if(msg)
            messeger(msg);
    });
}

function add(btn){
    let url = $(btn).data('url');
    $.get(url).done(function(data){
        $('.crud-branch').html(data).find('.modal').modal('show');
    });
}

function store(btn){
    let data = $(btn.form).serialize();
    $.post('/branch',data).done(function(data){
        if($.isEmptyObject(data.error)){
            $('#addBranchModel').modal('hide');
            init('Tạo mới thành công');
        } else{
            printErrorMsg(data.error);
        }
    });
}

function edit(btn){
    let url = $(btn).data('url');
    $.get(url).done(function(data){
        $('.crud-branch').html(data).find('.modal').modal('show');
    });
}

function save(btn){
    if (confirm('Xác nhận thay đổi?')){
        let url = $(btn).data('url');
        let data = $(btn.form).serialize();
        $.ajax({
            url:url,
            method:'put',
            data:data
        }).done(function(data){
            if($.isEmptyObject(data.error)){
                $('#editBranchModel').modal('hide');
                let msg = 'Cập nhật thành công';
                init(msg);
            } else{
                printErrorMsg(data.error);
            }
        });
    }
}

function destroy(btn){
    if (confirm('Bạn chắc chắn muốn xóa?')){
        let url = $(btn).data('url');
        $.ajax({
            url:url,
            method:'delete'
        }).done(function(){
            let msg = 'Xóa thành công';
            init(msg);
        });
    };

}

function messeger(_text){
    $.toast({
        heading: 'Thông báo',
        text: _text,
        hideAfter: 5000,
        position: 'top-center',
        showHideTransition: 'slide',
        icon: 'success'
    })
}

function printErrorMsg (msg) {
    console.log(msg);
    $('span.alert-danger').remove();
    $.each( msg, function( key, value ) {
        $(`input[name=${key}]`).before(`<span class="alert-danger" >${value}</span>`);
    });
}

function trash(){
    $.get('/branch_trash').done(function(data){
        $('body').html(data);
        $('.back').click(function(){
            init();
        });
    });
}

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
