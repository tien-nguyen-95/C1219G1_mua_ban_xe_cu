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
                        <td>${product.title}</td>
                        <td>${product.name}</td>
                        <td>${product.cc_number}CC</td>
                        <td><a href="javascript:;" onclick="product.showImage(${
                            product.id
                        })">Xem ảnh</a></td>
                        <td>${product.model_year}</td>
                        <td>${product.register_year}</td>
                        <td>${product.miles}km</td>
                        <td>${product.color}</td>
                        <td>${product.origin}</td>
                        <td>${product.import_price.toLocaleString("vi", {
                            style: "currency",
                            currency: "VND",
                        })}</td>
                        <td>${product.export_price.toLocaleString("vi", {
                            style: "currency",
                            currency: "VND",
                        })}</td>
                        <td>${product.status}</td>
                        <td>${product.branch.name}</td>
                        <td>${product.brand.name}</td>
                        <td>${product.tag.title}</td>
                        <td>${product.category.name}</td>
                        <td>${product.staff.name}</td>
                        <td>
                            <a  href="javascript:;" onclick="product.getDetail(${
                                product.id
                            })"><i style="color:blue" class="fa fa-edit"></i></a>
                            <a href="javascript:;" onclick="product.remove(${
                                product.id
                            })"><i style="color:red" class="fa fa-trash"></i></a>
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
        url: "/category",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, v) {
                $("#category_id").append(`
                <option  value="${v.id}">${v.name}</option>
                `);
            });
        },
    });
};

product.getAllbrand = function () {
    $.ajax({
        url: "/brands/json",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, v) {
                $("#brand_id").append(`
                <option value="${v.id}">${v.name}</option>
                `);
            });
        },
    });
};

product.getAlltag = function () {
    $.ajax({
        url: "/tag",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, v) {
                $("#tag_id").append(`
                <option value="${v.id}">${v.title}</option>
                `);
            });
        },
    });
};

product.getAllbranch = function () {
    $.ajax({
        url: "/branch/index",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, v) {
                $("#branch_id").append(`
                <option value="${v.id}">${v.name}</option>
                `);
            });
        },
    });
};

product.getAllStaff = function () {
    $.ajax({
        url: "/staff/index",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, v) {
                $("#staff_id").append(`
                <option value="${v.id}">${v.name}</option>
                `);
            });
        },
    });
};

product.getDetail = function (id) {
    $("p").empty();
    $.ajax({
        url: "/products/" + id,
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#productId").val(data.id);
            $("#code").val(data.code);
            $("#inputtitle").val(data.title);
            $("#name").val(data.name);
            $("#model_year").val(data.model_year).trigger("change");
            $("#register_year").val(data.register_year).trigger("change");
            $("#miles").val(data.miles);
            $("#color").val(data.color);
            $("#origin").val(data.origin);
            $("#import_price").val(data.import_price);
            $("#export_price").val(data.export_price);
            $("#status").val(data.status);
            $("#branch_id").val(data.branch_id).trigger("change");
            $("#brand_id").val(data.brand_id).trigger("change");
            $("#tag_id").val(data.tag_id).trigger("change");
            $("#category_id").val(data.category_id).trigger("change");
            $("#staff_id").val(data.staff_id).trigger("change");
            $("#images").val(data.image);
            $("#modal").find(".modal-title").text("Update Product");
            $(".modal-footer").find("a").text("Update");
            $("#modal").modal("show");
        },
    });
};

product.resetForm = function () {
    $("p").empty();
    $("#productId").val("0");
    $("#code").val("");
    $("#inputtitle").val("");
    $("#name").val("");
    $("#model_year").val("1");
    $("#register_year").val("1");
    $("#miles").val("");
    $("#color").val("");
    $("#origin").val("");
    $("#import_price").val("");
    $("#export_price").val("");
    $("#status").val("show");
    $("#branch_id ").val(null).trigger("change");
    $("#brand_id").val(null).trigger("change");
    $("#tag_id").val(null).trigger("change");
    $("#category_id").val(null).trigger("change");
    $("#staff_id").val(null).trigger("change");
    $("#images").val("");
    $("#modal").modal("show");
    $("#modal").find(".modal-title").text("Create New Product");
    $("#add").text("Create");

    var form = $("#Form").validate();
    form.resetForm();
};

product.save = function () {
    if ($("#Form").valid()) {
        //create
        if ($("#productId").val() == 0) {
            var productOjb = {};
            productOjb.code = $("#code").val();
            productOjb.title = $("#inputtitle").val();
            productOjb.name = $("#name").val();
            productOjb.model_year = $("#model_year").val();
            productOjb.register_year = $("#register_year").val();
            productOjb.miles = $("#miles").val();
            productOjb.color = $("#color").val();
            productOjb.origin = $("#origin").val();
            productOjb.import_price = $("#import_price")
                .val()
                .replace(/,/g, "");
            productOjb.export_price = $("#export_price")
                .val()
                .replace(/,/g, "");
            productOjb.status = $("#status").val();
            productOjb.branch_id = $("#branch_id").val();
            productOjb.brand_id = $("#brand_id").val();
            productOjb.tag_id = $("#tag_id").val();
            productOjb.category_id = $("#category_id").val();
            productOjb.staff_id = $("#staff_id").val();
            productOjb.image = $("#images").val();
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
                        hideAfter: 2000,
                        position: "top-center",
                        showHideTransition: "slide",
                        icon: "success",
                    });
                    $("#modal").modal("hide");
                    product.showData();
                },
                error: function (data) {
                    $.each(data.responseJSON.errors, function (key, value) {
                        console.log(key, value);
                        $(`.errors-${key}`).text(value);
                    });
                },
            });
        } else {
            var OjbEdit = {};
            OjbEdit.id = $("#productId").val();
            OjbEdit.code = $("#code").val();
            OjbEdit.title = $("#inputtitle").val();
            OjbEdit.name = $("#name").val();
            OjbEdit.model_year = $("#model_year").val();
            OjbEdit.register_year = $("#register_year").val();
            OjbEdit.miles = $("#miles").val();
            OjbEdit.color = $("#color").val();
            OjbEdit.origin = $("#origin").val();
            OjbEdit.import_price = $("#import_price").val().replace(/,/g, "");
            OjbEdit.export_price = $("#export_price").val().replace(/,/g, "");
            OjbEdit.status = $("#status").val();
            OjbEdit.branch_id = $("#branch_id").val();
            OjbEdit.brand_id = $("#brand_id").val();
            OjbEdit.tag_id = $("#tag_id").val();
            OjbEdit.category_id = $("#category_id").val();
            OjbEdit.staff_id = $("#staff_id").val();
            OjbEdit.image = $("#images").val();
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
                        hideAfter: 2000,
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
                            hideAfter: 2000,
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
            $.each(data, function (i, product) {
                $("#table tbody").append(
                    `<tr>
                    <td>${++i}</td>
                    <td>${product.code}</td>
                    <td>${product.title}</td>
                    <td>${product.name}</td>
                    <td><${product.image}</td>
                    <td>${product.model_year}</td>
                    <td>${product.register_year}</td>
                    <td>${product.miles}km</td>
                    <td>${product.color}</td>
                    <td>${product.origin}</td>
                    <td>${product.import_price.toLocaleString("vi", {
                        style: "currency",
                        currency: "VND",
                    })}</td>
                    <td>${product.export_price.toLocaleString("vi", {
                        style: "currency",
                        currency: "VND",
                    })}</td>
                    <td>${product.status}</td>
                    <td>${product.branch.name}</td>
                    <td>${product.brand.name}</td>
                    <td>${product.tag.title}</td>
                    <td>${product.category.name}</td>
                    <td>${product.staff.name}</td>
                        <td>
                            <a  href="javascript:;" onclick="product.restore(${
                                product.id
                            })"><i style="color:blue" class="fas fa-trash-restore"></i></a>
                            <a href="javascript:;" onclick="product.detele(${
                                product.id
                            })"><i  style="color:red" class="fas fa-trash-alt"></i></a>
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
    $("#table tbody ").empty();
    $("#title").text("Danh sách xóa mềm");
    $("#trash").remove();
    $("#comeback").remove();
    $("#btnProduct").replaceWith(
        `
        <div class="col-12 mb-3" id="btnProduct">
            <a id="trash" href="javascript:;" class="btn btn-primary" onclick="product.comeback()"><i class="fas fa-arrow-circle-left"></i>Quay lại</a>
        </div>
        `
    );
    product.getAlltrash();
};
product.comeback = function () {
    $("#table tbody").empty();
    $("#title").text("Danh sách sản phẩm");
    $("#trash").remove();
    $("#btnProduct").replaceWith(
        `
        <div class="col-12 mb-3" id="btnProduct">
            <a href="javascript:;" class="btn btn-success" onclick="product.showModal()" id="comeback"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
            <a id="trash" href="javascript:;" class="btn btn-warning" onclick="product.next()"><i class="fas fa-trash"></i>Thùng rác</a>
        </div>
        `
    );
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
                            hideAfter: 2000,
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
                            hideAfter: 2000,
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
    // product.image();
    $("#modal").modal("show");
};

$(document).ready(function () {
    product.init();
});

product.init = function () {
    $(".js-example-basic-single").select2({
        placeholder: "--Vui lòng chọn---",
    });
    product.showData();
    product.getAllcategory();
    product.getAllbrand();
    product.getAlltag();
    product.getAllbranch();
    product.getAllStaff();
    product.uploadFile();
};

// Jquery Dependency
$("input[data-type='currency']").on({
    keyup: function () {
        formatCurrency($(this));
    },
    blur: function () {
        formatCurrency($(this), "blur");
    },
});

function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") {
        return;
    }

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
            right_side;
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
product.showModalFile = function () {
    product.resetModalImage();
    $("#modalFile").modal("show");
};

product.uploadFile = function () {
    var i = 0;
    var dataImage = new Array();
    var dataPosition = new Array();

    $("#images").change(function () {
        $(".show-progress").empty();
        var checkImage = this.value;
        var ext = checkImage
            .substring(checkImage.lastIndexOf(".") + 1)
            .toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
            change(this);
            var file = document.getElementById("images").files[0];
            dataImage[i] = file; //add push to array dataImage
            dataPosition[i] = i; //add push position to dataPosition
            //created html progress
            var html_progress =
                '<div class="progress" style="margin-bottom:5px;"><div class="progress-bar" id="progress-' +
                i +
                '" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div></div>';
            $(".show-progress").append(html_progress);
            i++;
        } else alert("Chọn image (jpg, jpeg, png).");
    });

    var change = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var addImage =
                    '<div class="col-md-3"><img src=' +
                    e.target.result +
                    ' style="width:150px;height:160px;"><a href="javascript:;" ><i style="transform:translateY(-50px);color:red;" class="fas fa-times-circle"></i></a></div>';

                //add image to div="showImage"
                $("#ShowImages").append(addImage);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
    var upload = function (data, position) {
        var Idpd = $("#product_id").val();
        var formData = new FormData();
        //append data to formdata
        formData.append("image", data);
        formData.append("product_id", Idpd);
        var id = position;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "/products/upload",
            data: formData,
            contentType: false,
            dataType: "json",
            processData: false,
            cache: false,
            xhr: function () {
                // console.log(id);
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener(
                    "progress",
                    function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            if (percentComplete == 100) {
                                dataImage.splice(id, 1);
                                dataPosition.splice(id, 1);
                            }
                            $("#progress-" + id).text(percentComplete + "%");
                            $("#progress-" + id).css(
                                "width",
                                percentComplete + "%"
                            );
                        }
                    },
                    false
                );
                return xhr;
            },
            success: function (data) {
                console.log(data);
                $.toast({
                    heading: "Thông báo",
                    text: "Thêm ảnh thành công",
                    hideAfter: 2000,
                    position: "top-center",
                    showHideTransition: "slide",
                    icon: "success",
                });
                $("#modalFile").modal("hide");
                $(".gallery").remove();
                product.showImage(Idpd);
            },
        });
    };

    $("form#upload").submit(function (event) {
        $(".gallery").remove();
        event.preventDefault();
        var k = 0;
        for (k = 0; k < dataImage.length; k++) {
            /**
             * Function Upload
             * params 1: data image
             * params 2: position[ progressbar-1 or progressbar-2,...]
             */
            upload(dataImage[k], dataPosition[k]);
        }
    });
};

product.showImage = function (id) {
    $("#btnProduct").replaceWith(
        `
        <div class="col-12 mb-3" id="btnProduct">
            <a id="trash" href="javascript:;" class="btn btn-primary" onclick="product.comeback2()"><i class="fas fa-arrow-circle-left"></i>Quay lại</a>
            <a href="javascript:;" class="btn btn-success" onclick="product.showModalFile()" ><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm ảnh</a>
        </div>
        `
    );
    $("#hideTable").hide();
    $.ajax({
        url: "/products/" + id,
        method: "GET",
        dataType: "json",
        success: function (data) {
            // console.log(data);
            $("#showImage").empty();
            $("#IdProduct").append(
                `<input hidden id="product_id" name="product_id" value="${id}">`
            );
            if (data.files.length == 0) {
                $("#checkImage").append(
                    `<strong style="color:red">Không có hình ảnh nào</strong>`
                );
            }
            $.each(data.files, function (index, value) {
                $("#showImage").append(`
                        <div class="grid-container">
                            <a target="" href="${value.name}">
                                <div><img class='grid-container-img' src="${value.name}" alt="Cinque Terre" width="600" height="400"></div>
                            </a>
                            <a style = "text-align:center;"href="javascript:;" onclick="product.removeFile(${value.id})"><i style="color:red" class="fa fa-trash"></i></a>
                        </div>
                        `);
            });
        },
    });
};

product.comeback2 = function () {
    $("#btnProduct").replaceWith(
        `
        <div class="col-12 mb-3" id="btnProduct">
            <a href="javascript:;" class="btn btn-success" onclick="product.showModal()" id="comeback"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
            <a id="trash" href="javascript:;" class="btn btn-warning" onclick="product.next()"><i class="fas fa-trash"></i>Thùng rác</a>
        </div>
        `
    );
    $("#checkImage").empty();
    $("#showImage").empty();
    $("#hideTable").show();
    product.showData();
};

product.resetModalImage = function () {
    $("#images").val(null);
    $(".show-progress").empty();
    $("#ShowImages").empty();
};

product.removeFile = function (id) {
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
                    url: "/remove/" + id,
                    method: "DELETE",
                    dataType: "json",
                    contentType: "application/json",
                    success: function (data) {
                        // console.log(data);
                        $.toast({
                            heading: "Thông báo",
                            text: "Xóa thành công",
                            hideAfter: 2000,
                            position: "top-center",
                            showHideTransition: "slide",
                            icon: "success",
                        });
                        product.showImage();
                    },
                });
            }
        },
    });
};
