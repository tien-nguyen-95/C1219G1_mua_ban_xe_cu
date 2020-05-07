$(document).ready(function() {
    $('.data-table').load('/branch');
});

function add(btn){
    let url = $(btn).data('url');
    $.get(url).done(function(data){
        $('.crud-branch').html(data).find('.modal').modal('show');
    });
}

function store(btn){
    let data = $(btn.form).serialize();
    $.post('/branch',data).done(function(){
        $('#addBranchModel').modal('hide');
        $('.data-table').load('/branch');
        messeger('Tạo mới thành công');
    });
}

function edit(btn){
    let url = $(btn).data('url');
    $.get(url).done(function(data){
        $('.crud-branch').html(data).find('.modal').modal('show');
    });
}

function save(btn){
    let url = $(btn).data('url');
    let data = $(btn.form).serialize();
    $.ajax({
        url:url,
        method:'put',
        data:data
    }).done(function(){
        $('#editBranchModel').modal('hide');
        $('.data-table').load('/branch');
        messeger('Cập nhật thành công');
    });
}

function destroy(btn){
    if (confirm('bạn chắc chắn muốn xóa?')){
        let url = $(btn).data('url');
        $.ajax({
            url:url,
            method:'delete'
        }).done(function(){
            $('.data-table').load('/branch');
            messeger('Xóa thành công');
        });
    };

}

function messeger(_text){
    $.toast({
        heading: 'Success',
        text: _text,
        hideAfter: 5000,
        position: 'top-center',
        showHideTransition: 'slide',
        icon: 'success'
    })
}

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
