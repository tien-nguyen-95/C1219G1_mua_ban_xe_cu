var bill = {} || bill;

bill.table;

function messenger(_text){
    $.toast({
        heading: 'Thông báo',
        text: _text,
        hideAfter: 2000,
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

bill.showData = function(){
    function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    }    
    bill.table = $('#tbBill').DataTable({
        ajax: {
            url : "/bill",
            dataSrc: function(jsons){
                return jsons.map(obj=>{
                    var billType = null;
                    var billComplete = null;
                    var payment = formatNumber(obj.payment) + ' VNĐ';
                    (obj.status == 0 ) ? billType = 'Mua': billType = 'Bán';
                    (obj.complete == 0) ? billComplete = 'Đã hoàn thành': billComplete = 'Chưa hoàn thành';
                    return {
                        customer_name: obj.customer.name,
                        branch_name: obj.branch.name,
                        payment: payment, 
                        billType: billType,
                        status: billComplete,
                        action: `
                                <a href="javascript:;" class="text-info mx-auto btn" onclick="bill.show(${obj.id})" title="thông tin"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:;" class="text-warning mx-auto btn" onclick="bill.getDetail(${obj.id})" title="sửa"><i class="fa fa-edit"></i></a>
                                <a href="javascript:;" class="text-danger mx-auto btn" onclick="bill.remove(${obj.id})" title="xóa"><i class="fa fa-trash"></i></a>
                                `
                    }
                })
            }
        },
        columns: [
            {data: 'customer_name'},
            {data: 'branch_name'},
            {data: 'payment'},
            {data: 'billType'},
            {data: 'status'},
            {data: 'action'}
        ]
    });
}

bill.getCustomer = function ()
{ 
    $.ajax({
        type: "GET",
        url: "/customer",
        dataType: "JSON",
        success: function (data) { 
            // $("#customer_id").empty();
            $.each(data, function(i,v){
                $("#customer_id").append(
                    `
                    <option value="${v.id}">${v.name}</option>
                    `  
                ); 
            });
        }
    });
}

bill.getBranch = function () 
{  
    $.ajax({
        type: "GET",
        url: "/branch",
        dataType: "JSON",
        success: function (data) {
            // $("#branch_id").empty();
            $.each(data, function(i,v){
                $("#branch_id").append(
                    `
                    <option value="${v.id}">${v.name}</option>
                    `
                ); 
            });
        }
    });
}

bill.getDetail = function (id) 
{
    $(".sml-er").empty();
    $.ajax({
        url: "/bill/" + id +"/edit",
        method: "GET",
        dataType: "json",
        success: function (data) {
           
            console.log(data);
           
            $("#billId").val(data.bills.id);
            $("#customer_id").val(data.bills.customer_id);
            
            $("#staff_id").val(data.bills.staff_id);
            $("#product_id").val(data.bills.product_id);
            $("#branch_id").val(data.bills.branch_id);
        
            $('#status').val(data.bills.status);
            $('#complete').val(data.bills.complete);

            $('input[name="payment_at"]').val(data.bills.payment_at);
            $('input[name="delivered_at"]').val(data.bills.delivered_at);

            $('#deposit').val(data.bills.deposit);
            $('#payment').val(data.bills.payment);
            
            $('#billModal').find('.modal-title').text("Cập nhật hóa đơn");
            $('#billModal').find('a').text("Cập nhật");
            $("#billModal").modal('show');
        }
    });
}

bill.showDetail = function ()
{
    $.ajax({
        type: "GET",
        url: "/bill/" + id,
        dataType: "JSON",
        success: function (data) {
            // console.log(data.name);
            $("#billId").val(data.bills.id);
            $("#customer_id").val(data.bills.customer_id);
            
            $("#staff_id").val(data.bills.staff_id);
            $("#product_id").val(data.bills.product_id);
            $("#branch_id").val(data.bills.branch_id);
        
            $('#status').val(data.bills.status);
            $('#complete').val(data.bills.complete);

            $('input[name="payment_at"]').val(data.bills.payment_at);
            $('input[name="delivered_at"]').val(data.bills.delivered_at);

            $('#deposit').val(data.bills.deposit);
            $('#payment').val(data.bills.payment);
        
            $("#thongtin").modal('show');
        }
    });
}


bill.save = function () {
    if($('#formBill').valid()){
        if ($('#billId').val() == 0) {
            var objAdd = {};
            objAdd.customer_id  = $('#customer_id').val();
            objAdd.product_id   = $('#product_id').val();
            objAdd.branch_id    = $('#branch_id').val();
            objAdd.staff_id     = $('#staff_id').val();
            
            objAdd.complete     = $("#complete").val();
            objAdd.status       = $("#status").val();
            
            objAdd.delivered_at = $('input[name="delivered_at"]').val();
            objAdd.payment_at   = $('input[name="payment_at"]').val();
            objAdd.deposit      = $('input[name="deposit"]').val();
            objAdd.payment      = $('input[name="payment"]').val();

            console.log(objAdd);

            $.ajax({
                url: "/bill",
                type: "POST",
                dataType: "JSON",
                data: JSON.stringify(objAdd),
                contentType: 'application/json',    
                success: function (data) {
                    console.log(data);
                    $('#billModal').modal('hide');
                    bill.table.ajax.reload(null,false);
                    messenger("Tạo mới thành công");
                },
                error: function(data){
                    console.log(data.responseJSON.errors);
                    $.each(data.responseJSON.errors, function(key, val) {
                        $(`.errors-${key}`).text(val);
                    });
                }
            });
        } else {
            bootbox.confirm({
                title: "Cập nhật bây giở?",
                message: "Bạn có chắc muốn sửa hóa đơn này.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Đóng'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Có'
                    }
                },
                callback: function (result) {
                    if(result){
                        var objEdit = {};
                        objEdit.id = $('#billId').val();
                        objEdit.customer_id = $('#customer_id').val();
                        objEdit.staff_id = $('#staff_id').val();
                        objEdit.product_id = $('#product_id').val();
                        objEdit.branch_id = $('#branch_id').val();
                        objEdit.status = $('#status').val();
                        objEdit.complete = $('#complete').val();
                        objEdit.payment_at = $('input[name="payment_at"]').val();
                        objEdit.delivered_at = $('input[name="delivered_at"]').val();
                        objEdit.deposit = $('#deposit').val();
                        objEdit.payment = $('#payment').val();
                        console.log(objEdit);
                        $.ajax({
                            url: "/bill/" + objEdit.id,
                            method: "PUT",
                            dataType: "json",
                            contentType: 'application/json',
                            data: JSON.stringify(objEdit),
                            success: function (data) {
                                console.log(data);
                                $('#billModal').modal('hide');
                                bill.table.ajax.reload(null,false);
                                messenger("Cập nhật thành công");
                            },
                            error: function(data){
                                console.log(data);
                                $.each(data.responseJSON.errors, function(key, val) {
                                    $(`.errors-${key}`).text(val);
                                });
                            }
                            
                        }); 
                    }
                }
            });
        }
    }
}


bill.resetForm = function () {
    $(".sml-er").empty();
    $('#billId').val("0");
    $('#customer_id').val("");
    $('#staff_id').val("");
    $('#product_id').val("");
    $('#branch_id').val("");
    $('#status').val("");
    $('#complete').val("");
    $('input[name="payment_at"]').val("");
    $('input[name="delivered_at"]').val("");
    $('#deposit').val("");
    $('#payment').val("");
    $('#formBill').find('.modal-title').text("Thêm hóa đơn mới");
    $('#formBill').find('a').text('Thêm');
    var form = $('#formBill').validate();
    form.resetForm();
}


bill.showModal= function()
{
    $('#payment_at').datetimepicker({ 
        format:'YYYY-MM-DD', 
        // locale: 'ru'
    });

    $('#delivered_at').datetimepicker({
        format:'YYYY-MM-DD',
    });

    $('.money').bind('blur paste', function(){
        this.value = this.value.replace(/[^0-9]/g, '');
        console.log(this.value);
    });
    bill.resetForm();
    $('#billModal').modal('show'); 
}

bill.init = function() 
{
    bill.showData();
    bill.getCustomer();
    bill.getBranch();
    // $(".select2").select2();
}


$(document).ready(function () {
    
    bill.init();
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});