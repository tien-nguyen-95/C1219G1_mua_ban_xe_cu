var user = {} || user;

function messenger(_text){
    $.toast({
        heading: 'Thông báo',
        text: _text,
        hideAfter: 3000,
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

user.showData = function() {
    $.ajax({
        url:"/user",
        method: "GET",
        dataType: "json",
        success: function(data){
            $('#tbUser tbody').empty();
            $.each(data, function (i, v) {
                $('#tbUser tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>
                        <td>${v.email}</td>
                        <td><a href="javascript:;">${v.role}</a></td>
                        <td>
                            <a href="javascript:;" title="Sửa" style="font-size:20px;margin-right:10px" onclick="user.getDetail(${v.id})"><i class="fa fa-info"></i></a>
                            <a href="javascript:;" title="Chuyển tới thùng rác" style="font-size:20px;color:gray" onclick="user.remove(${v.id})"><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbBranch').DataTable();
        }
    });
}

user.getDetail = function(id){
    $.ajax({
        url: "/user/"+id+"/edit",
        method: "GET",
        dataType: "json",
        success: function(data) {
            $('#name').text(data.users.name);
            $('#email').text(data.users.email);
            $('#role').text(data.users.role);
            $('#userModal').modal('show');
        }
    });
}

user.remove = function (id) {
    let check = confirm("Bạn chắc chắn xóa???");
    if(check){
         $.ajax({
            url: "/user/"+id,
            method: "DELETE",
            dataType: "json",
            success: function(data) {
                user.showData();
                messenger("Xóa thành công");
            }
        });
    }

}

$(document).ready(function(){
    user.showData();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
});
