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

function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

bill.showData = function(){
    
    bill.table = $('#tbBill').DataTable({
        ajax: {
            url : "/bill",
            dataSrc: function(jsons){
                return jsons.map(obj=>{
                    var billType = null;
                    var billComplete = null;
                    var payment = formatNumber(obj.payment) + ' VNĐ';
                    if(obj.status == 0 ){
                        billType = '<h5><span class="badge badge-primary">Mua</span></h5>';
                    }else{
                         billType = '<h5><span class="badge badge-warning">Bán</span></h5>';
                    }
                    if(obj.complete == 0){
                        billComplete = '<h5><span class="badge badge-pill badge-light">Đã hoàn thành</span></h5>';
                    }else{
                        billComplete = '<h5><span class="badge badge-pill badge-dark">Chưa hoàn thành</span></h5>';
                    } 
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

bill.getProduct = function ()
{ 
    $.ajax({
        type: "GET",
        url: "/products/json",
        dataType: "JSON",
        success: function (data) {
            // $("#branch_id").empty();
            $.each(data, function(i,v){
                // console.log('prduct: ' + v.name);
                $("#product_id").append(
                    `
                    <option value="${v.id}">${v.title}</option>
                    `
                );
            });       
        }
    });
}

bill.getPayment = function()
{
    $("#status").change(function () { 
        var status1 = $(this).val();
        let deposit = $("#deposit").val();
        if (status1  == '') {
            console.log('sản phẩm chưa có');
            $("#payment").text('0');
        }else{
            
                var productId1 = $("#product_id").find(":selected").val();
                if(productId1 == ''){
                    $("#payment").text('0');
                }else{
                    $.ajax({
                        type: "GET",
                        url: "/products/" + productId1,
                        data: status1,deposit,
                        dataType: "JSON",
                        success: function (data) {
                            if (status1 === '0') {
                                $("span#payment").text(formatNumber(data.import_price) + " VNĐ");
                                $('input:hidden[name=payment]').val(data.import_price);
                                $("span#remain").text(formatNumber(data.import_price-deposit) + " VNĐ");
                                console.log('giá mua1');
                            } else {
                                $("span#payment").text(formatNumber(data.export_price) + " VNĐ");
                                $('input:hidden[name=payment]').val(data.export_price);
                                $("span#remain").text(formatNumber(data.export_price-deposit) + " VNĐ");
                                console.log('giá bán1');
                            } 
                        } 
                    });
                }
               
            
        }  
    });
  
    $("#product_id").change(function(){
        var productId = $("#product_id").val();
        let deposit = $("#deposit").val();
        console.log(productId);
        if(productId == ''){
            $("#payment").text('0');
        }else{
            $.ajax({
                type: "GET",
                url: "/products/" + productId,
                data: deposit,
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    var statusBill = $("#status").find(":selected").val()
                    if(statusBill == ''){
                        $("#payment").text('0');
                    }else{
                        if(statusBill === '0'){
                            $("span#payment").text(formatNumber(data.import_price) + " VNĐ");
                            $('input:hidden[name=payment]').val(data.import_price);
                            $("span#remain").text(formatNumber(data.import_price-deposit) + " VNĐ");
                            console.log('giá mua2');
                        }else{
                            $("span#payment").text(formatNumber(data.export_price) + " VNĐ");
                            $('input:hidden[name=payment]').val(data.export_price);
                            $("span#remain").text(formatNumber(data.export_price-deposit) + " VNĐ");
                            console.log('giá bán 2');
                        }   
                    }                                 
                } 
            });
        }
    });
}


bill.getRemain = function()
{
    $("#deposit").on('change', function(){
        var deposit = $(this).val();
        var payment = $("input[name=payment]").val();
        console.log('dat coc: ' +' '+ deposit + 'giá: ' + payment);
        if(deposit - payment < 0){
            $("span#remain").text(formatNumber(payment-deposit) + " VNĐ");
        }else{
            $("#deposit").val(payment);
        }
    });
}


bill.getBranch = function ()
{
    $.ajax({
        type: "GET",
        url: "/branch/index",
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
            objAdd.staff_id     = ($('input#staff_id').val())

            objAdd.complete     = $("#complete").val();
            objAdd.status       = $("#status").val();

            objAdd.delivered_at = $('input[name="delivered_at"]').val();
            objAdd.payment_at   = $('input[name="payment_at"]').val();
            objAdd.deposit      = $('input[name="deposit"]').val();
            objAdd.payment      = $('input[name="payment"]').val();
            $(".sml-er").empty();
            console.log(objAdd.staff_id);

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
    $('#product_id').val("");
    $('#branch_id').val("");
    $('#status').val("");
    $('#complete').val("");
    $('input[name="payment_at"]').val("");
    $('input[name="delivered_at"]').val("");
    $('#deposit').val('');
    $("input[name=payment]").val('');
    $('span#payment').text("0 VNĐ")
    $('span#remain').text("0 VNĐ")
    $('#formBill').find('.modal-title').text("Thêm hóa đơn mới");
    $('#formBill').find('a').text('Thêm');
    var form = $('#formBill').validate();
    form.resetForm();
}


bill.showModal= function()
{
    
    $('#payment_at').datetimepicker({
        format:'YYYY-MM-DD',
    });

    $('#delivered_at').datetimepicker({
        format:'YYYY-MM-DD',
    });

    // $('.money').bind('blur paste', function(){
    //     this.value = this.value.replace(/[^0-9]/g, '');
    //     console.log(this.value);
    // });

    bill.resetForm();
    $('#billModal').modal('show');
}

bill.init = function()
{
    bill.showData();
    bill.getProduct();
    bill.getCustomer();
    bill.getBranch();
    bill.getPayment();  
    bill.getRemain();
}


$(document).ready(function () {

    bill.init();
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
