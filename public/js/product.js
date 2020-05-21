var product = {} || product;

product.showData = function () {
    $.ajax({
        url: "/products/json",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#table tbody").empty();
            $.each(data, function (i, product) {
                $("#table tbody").append(
                    `<tr>
                        <td>${++i}</td>
                        <td>${product.code}</td>
                        <td>${product.name}</td>
                        <td><${product.image}</td>
                        <td>${product.category.name}</td>
                        <td>${product.brand.name}</td>
                        <td>${product.tag.title}</td>
                        <td>${product.model_year}</td>
                        <td>${product.import_price.toLocaleString('vi', {style : 'currency', currency : 'VND'})}</td>
                        <td>${product.export_price.toLocaleString('vi', {style : 'currency', currency : 'VND'})}</td>
                        <td>${product.branch.name}</td>
                        <td>${product.status}</td>
                        <td>${product.staff_id}</td>
                        <td>
                            <a  href="javascript:;" onclick="product.getDetail(${product.id})"><i style="color:green" class="fa fa-edit"></i></a>
                            <a href="javascript:;" onclick="product.remove(${product.id})"><i style="color:red" class="fa fa-trash"></i></a>
                        </td>
                    <tr>
                        `
                );
            });
            $("#tbale").DataTable();
        },
    });
};

product.getAllcategory = function () {
    $.ajax({
        url: "http://127.0.0.1:8000/category",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, v) {
                $("#IdCategory").after(`
                <option  value="${v.id}">${v.name}</option>               
                `);
            });
        },
    });
};

product.getAllbrand = function () {
    $.ajax({
        url: "http://127.0.0.1:8000/brands/json",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, v) {
                $("#IdBrand").after(`
                <option value="${v.id}">${v.name}</option>               
                `);
            });
        },
    });
};

product.getAlltag = function () {
    $.ajax({
        url: "http://127.0.0.1:8000/tag",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, v) {
                $("#IdTag").after(`
                <option value="${v.id}">${v.title}</option>               
                `);
            });
        },
    });
};

product.getAllbranch = function () {
    $.ajax({
        url: "http://127.0.0.1:8000/branch",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, v) {
                $("#Idbranch").after(`
                <option value="${v.id}">${v.name}</option>               
                `);
            });
        },
    });
};

product.getDetail = function (id) {
    $('p').empty();
    $.ajax({
        url: "/products/" + id,
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#productId").val(data.id);
            $("#code").val(data.code);
            $("#name").val(data.name);
            $("#images").val(data.image);
            $("#category_id").val(data.category_id);
            $("#brand_id option").val(data.brand_id);
            $("#tag_id").val(data.tag_id);
            $("#model_year").val(data.model_year);
            $("#import_price").val(data.import_price);
            $("#export_price").val(data.export_price);
            $("#branch_id").val(data.branch_id);
            $("#status").val(data.status);
            $("#staff_id").val(data.staff_id);
            $("#modal").find(".modal-title").text("Update Product");
            $(".modal-footer").find("a").text("Update");
            $("#modal").modal("show");
        },
    });
};

product.resetForm = function () {
    $('p').empty();
    $("#productId").val("0");
    $("#code").val("");
    $("#name").val("");
    $("#images").val("");
    $("#category_id").val("0");
    $("#brand_id").val("0");
    $("#tag_id").val("0");
    $("#model_year").val("0");
    $("#import_price").val("");
    $("#export_price").val("");
    $("#branch_id").val("0");
    $("#status").val("show");
    // $("#staff_id").val(1);
    $("#modal").modal("show");
    $("#modal").find(".modal-title").text("Create New Product");
    $(".modal-footer").find("a").text("Create");

    var form = $("#Form").validate();
    form.resetForm();
};

product.image = function(){
    var i=0;
    var dataImage = new Array();
    var dataPosition = new Array();

    $("#images").change(function(){
        var checkImage = this.value;
        var ext = checkImage.substring(checkImage.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
        {
            change(this);
            var file = document.getElementById('images').files[0];
            dataImage[i]=file; //add push to array dataImage
            dataPosition[i]=i;  //add push position to dataPosition
           //created html progress
            var html_progress = '<div class="progress" style="margin-bottom:5px;"><div class="progress-bar" id="progress-'+i+'" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div></div>';
            $(".show-progress").append(html_progress);
            i++;
        }
        else
        $('#error').text('Vui lòng chọn tệp hình ảnh (jpg, jpeg, png).');
    });
    var change = function(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var addImage = '<div class="col-md-3"><img  height="70" width="60" src='+e.target.result+'></div>';

                //add image to div="showImage"
                $("#showImage").append(addImage);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
};


product.save = function () {
    if ($("#Form").valid()) {
        //create
        if ($("#productId").val() == 0) {
            var productOjb = {};
            productOjb.code = $("#code").val();
            productOjb.name = $("#name").val();
            productOjb.image = $("#images").val();
            productOjb.category_id = $("#category_id").val();
            productOjb.brand_id = $("#brand_id").val();
            productOjb.tag_id = $("#tag_id").val();
            productOjb.model_year = $("#model_year").val();
            productOjb.import_price = $("#import_price").val().replace(/,/g, '');
            productOjb.export_price = $("#export_price").val().replace(/,/g, '');
            productOjb.branch_id = $("#branch_id").val();
            productOjb.status = $("#status").val();
            productOjb.staff_id = $("#staff_id").val();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/products/create",
                method: "POST",
                dataType: "json",
                contentType: "application/json",
                data: JSON.stringify(productOjb),
                success: function (data) {
                    $.toast({
                        heading: "Cảnh báo",
                        text: "Thêm thành công",
                        hideAfter: 5000,
                        position: "top-center",
                        showHideTransition: "slide",
                        icon: "success",
                    });
                    $("#modal").modal("hide");
                    product.showData();
                },
                error: function (data) {
                    $.each(data.responseJSON.errors, function (key, value) {
                        console.log(key);
                        $(`.errors-${key}`).text(value);
                      
                    });
                },
            });
        } else {
            var OjbEdit = {};
            OjbEdit.id = $("#productId").val();
            OjbEdit.code = $("#code").val();
            OjbEdit.name = $("#name").val();
            OjbEdit.image = $("#images").val();
            OjbEdit.category_id = $("#category_id").val();
            OjbEdit.brand_id = $("#brand_id").val();
            OjbEdit.tag_id = $("#tag_id").val();
            OjbEdit.model_year = $("#model_year").val();
            OjbEdit.import_price = $("#import_price").val().replace(/,/g, '');
            OjbEdit.export_price = $("#export_price").val().replace(/,/g, '');
            OjbEdit.branch_id = $("#branch_id").val();
            OjbEdit.status = $("#status").val();
            OjbEdit.staff_id = $("#staff_id").val();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/products/" + OjbEdit.id,
                method: "PUT",
                dataType: "json",
                contentType: "application/json",
                data: JSON.stringify(OjbEdit),
                success: function (data) {
                    $.toast({
                        heading: "Thông báo",
                        text: "Cập nhật thành công",
                        hideAfter: 5000,
                        position: "top-center",
                        showHideTransition: "slide",
                        icon: "success",
                    });
                    $("#modal").modal("hide");
                    product.showData();
                },
                error: function (data) {
                    console.log(data);
                    $.each(data.responseJSON.errors, function (key, value) {
                        console.log(key);
                        $(`.errors-${key}`).text(value);
                      
                    });
                },
            });
        }
    }
};

product.remove = function (id) {
    bootbox.confirm({
        title: "Thông báo",
        message: "Bạn chắc chắn muốn xóa không",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No',
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes',
            },
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "/products/" + id,
                    method: "DELETE",
                    dataType: "json",
                    contentType: "application/json",
                    success: function (data) {
                        // console.log(data);
                        $.toast({
                            heading: "Thông báo",
                            text: "Xóa thành công",
                            hideAfter: 5000,
                            position: "top-center",
                            showHideTransition: "slide",
                            icon: "success",
                        });
                        product.showData();
                    },
                });
            }
        },
    });
};

product.getAlltrash = function () {
    $.ajax({
        url: "/products/trash",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#table tbody").empty();
            $.each(data, function (i, v) {
                $("#table tbody").append(
                    `<tr>
                        <td>${i}</td>
                        <td>${v.code}</td>
                        <td>${v.name}</td>
                        <td><${v.image}</td>
                        <td>${v.category.name}</td>
                        <td>${v.brand.name}</td>
                        <td>${v.tag.title}</td>
                        <td>${v.model_year}</td>
                        <td>${v.import_price.toLocaleString('vi', {style : 'currency', currency : 'VND'})}</td>
                        <td>${v.export_price.toLocaleString('vi', {style : 'currency', currency : 'VND'})}</td>
                        <td>${v.branch.name}</td>
                        <td>${v.status}</td>
                        <td>${v.staff_id}</td>
                        <td>
                            <a  href="javascript:;" onclick="product.restore(${v.id})"><i style="color:blue" class="fas fa-trash-restore"></i></a>
                            <a href="javascript:;" onclick="product.detele(${v.id})"><i  style="color:red" class="fas fa-trash-alt"></i></a>
                        </td>
                    <tr>
                        `
                );
            });
            $("#table").DataTable();
        },
    });
};

product.next = function () {
    $("#title").text("Danh sách xóa mềm");
    $("#trash").remove();
    $("#comeback").remove();
    $("#table tbody").empty();
    $("#btnProduct").replaceWith(
        `
        <div class="col-12 mb-3" id="btnProduct">
            <a id="trash" href="javascript:;" class="btn btn-warning" onclick="product.comeback()">Comeback</a>
        </div>
        `
    );
    product.getAlltrash();
};
product.comeback = function () {
    $("#title").text("Danh sách sản phẩm");
    $("#trash").remove();
    $("#btnProduct").replaceWith(
        `
        <div class="col-12 mb-3" id="btnProduct">
            <a id="comeback" href="javascript:;" class="btn btn-success" onclick="product.showModal()">Create</a>
            <a id="trash" href="javascript:;" class="btn btn-warning" onclick="product.next()">Trash</a>
        </div>
        `
    );
    $("#table tbody").empty();
    product.showData();
};

product.restore = function (id) {
    bootbox.confirm({
        title: "Thông báo",
        message: "Bạn chắc chắn muốn khôi phục không",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No',
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes',
            },
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: "/products/" + id + "/restore",
                    method: "GET",
                    dataType: "json",
                    success: function (data) {
                        $.toast({
                            heading: "Thông báo",
                            text: "Khôi phục thành công",
                            hideAfter: 5000,
                            position: "top-center",
                            showHideTransition: "slide",
                            icon: "success",
                        });
                        product.comeback();
                    },
                });
            }
        },
    });
};

product.detele = function (id) {
    bootbox.confirm({
        title: "Thông báo",
        message: "Nếu xóa sẽ mất vĩnh viễn",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No',
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes',
            },
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "/products/" + id + "/delete",
                    method: "DELETE",
                    dataType: "json",
                    success: function (data) {
                        $.toast({
                            heading: "Thông báo",
                            text: "Xóa thành công",
                            hideAfter: 5000,
                            position: "top-center",
                            showHideTransition: "slide",
                            icon: "success",
                        });
                        product.getAlltrash();
                    },
                });
            }
        },
    });
};

  
product.showModal = function () {
    product.resetForm();
    product.image();
    $("#modal").modal("show");
};

$(document).ready(function () {
    product.init();
 
});

product.init = function () {
    $('.js-example-basic-single').select2({
        placeholder: "Lựa chọn",
    });
    product.showData();
    product.getAllcategory();
    product.getAllbrand();
    product.getAlltag();
    product.getAllbranch();
};

// Jquery Dependency
$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});

function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  }
  
  
  function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.
    
    // get input value
    var input_val = input.val();
    
    // don't validate empty input
    if (input_val === "") { return; }
    
    // original length
    var original_len = input_val.length;
  
    // initial caret position 
    var caret_pos = input.prop("selectionStart");
      
    // check for decimal
    if (input_val.indexOf(".") >= 0) {
  
      // get position of first decimal
      // this prevents multiple decimals from
      // being entered
      var decimal_pos = input_val.indexOf(".");
  
      // split number by decimal point
      var left_side = input_val.substring(0, decimal_pos);
      var right_side = input_val.substring(decimal_pos);
  
      // add commas to left side of number
      left_side = formatNumber(left_side);
  
      // validate right side
      right_side = formatNumber(right_side);
      
      // On blur make sure 2 numbers after decimal
      if (blur === "blur") {
        right_side ;
      }
      
      // Limit decimal to only 2 digits
      right_side = right_side.substring(0, 2);
  
      // join number by .
      input_val = left_side + "." + right_side;
  
    } else {
      // no decimal entered
      // add commas to number
      // remove all non-digits
      input_val = formatNumber(input_val);
      input_val = input_val;
      
      // final formatting
      if (blur === "blur") {
        input_val;
      }
    }
    
    // send updated string to input
    input.val(input_val);
  
    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
  }

