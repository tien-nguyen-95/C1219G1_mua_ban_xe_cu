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
        alert('success');
        $('#addBranchModel').modal('hide');
        $('.data-table').load('/branch');
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
        alert('success');
        $('#editBranchModel').modal('hide');
        $('.data-table').load('/branch');
    });
}

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
