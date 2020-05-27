var shop = {} || shop;

shop.dataCategory = function(){
    $.ajax({
        url : "/category",
        method: "GET",
        dataType: "json",
        success: function(data){
            $('#category-menu').empty();
            $.each(data , function (i,v) {
                $('#category-menu').append(
                    `
                    <a class="dropdown-item" href="javascript:;" onclick="shop.filterCategory(${v.id})">${v.name}</a>
                    `
                );
            });
            $('#category-list').empty();
            $.each(data , function (i,v) {
                $('#category-list').append(
                    `

                    <div class="radio">
                        <label><input type="radio" name="opt-category" > ${v.name}</label>
                    </div>
                    `
                );
            });
        }
    });
}

shop.dataBrand = function(){
    $.ajax({
        url : "/brands/json",
        method: "GET",
        dataType: "json",
        success: function(data){
            $('#brand-menu').empty();
            $.each(data , function (i,v) {
                $('#brand-menu').append(
                    `
                    <a class="dropdown-item" href="javascript:;" onclick="shop.filterBrand(${v.id})">${v.name}</a>
                    `
                );
            });
            $('#brand-list').empty();
            $.each(data , function (i,v) {
                $('#brand-list').append(
                    `
                    <div class="radio">
                        <label><input type="radio" name="opt-brand"> ${v.name}</label>
                    </div>
                    `
                );
            });
        }
    });
}

shop.dataBranch = function(){
    $.ajax({
        url : "/branch/index",
        method: "GET",
        dataType: "json",
        success: function(data){
            $('#branch-menu').empty();
            $.each(data , function (i,v) {
                $('#branch-menu').append(
                    `
                    <a class="dropdown-item" href="javascript:;" onclick="shop.filterBranch(${v.id})"> ${v.name}</a>
                    `
                );
            });
            $('#branch-list').empty();
            $.each(data , function (i,v) {
                $('#branch-list').append(
                    `
                    <div class="radio">
                        <label><input type="radio" name="opt-branch"> ${v.name}</label>
                    </div>
                    `
                );
            });
        }
    });
}

shop.filter = function(cate = '', br = '', bc = ''){
    $.ajax({
        url: `/filter-product/filter?category=${cate}&brand=${br}&branch=${bc}`,
        method: "get",
        success: function(data){
            console.log(data);
            $('#product-data').empty();
            $('#span-right').text(`Tìm thấy: ${data.length} sản phẩm`);
            $.each(data, function(i,v){
                $('#product-data').append(
                `
                <div class="col p-1">
                    <div id ="showimage.'i'" class="card ">
                        <img class="card-img-top" src="${v.files.length>0? v.files[0].name : 'shop/img/darkrai1.jpg'}">
                        <div class="card-body">
                            <h4 class="card-title">${v.title} </h4>
                            <h4 class="card-title text-danger">${v.export_price? formatMoney(v.export_price)+" đ": "Đang cập nhật"} </h4>
                            <p class="card-text">Số km đã đi: ${v.miles? v.miles+" km": "Đang cập nhật"} </p>
                            <a href="/product-detail/${v.id}" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>
                `);
            });
        }
    })
}

function formatMoney(amount, decimalCount = 0, decimal = ".", thousands = ",") {
    try {
      decimalCount = Math.abs(decimalCount);
      decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

      const negativeSign = amount < 0 ? "-" : "";

      let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
      let j = (i.length > 3) ? i.length % 3 : 0;

      return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
      console.log(e)
    }
}

shop.filterCategory = function(id){
    shop.filter(id);

}

shop.filterBrand = function(id){
    shop.filter('',id,'');
}

shop.filterBranch = function(id){
    shop.filter('','',id);
}

$(document).ready(function(){

    shop.dataCategory();
    shop.dataBrand();
    shop.dataBranch();
    shop.filter();
});
