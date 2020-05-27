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
                    <a class="dropdown-item" href="#">${v.name}</a>
                    `
                );
            });
            $('#category-list').empty();
            $.each(data , function (i,v) {
                $('#category-list').append(
                    `
                    <li class="nav-item"><a href="" class="nav-link">${v.name}</a></li>
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
                    <a class="dropdown-item" href="#">${v.name}</a>
                    `
                );
            });
            $('#brand-list').empty();
            $.each(data , function (i,v) {
                $('#brand-list').append(
                    `
                    <li class="nav-item"><a href="" class="nav-link">${v.name}</a></li>
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
            console.log(data);
            $('#branch-menu').empty();
            $.each(data , function (i,v) {
                $('#branch-menu').append(
                    `
                    <a class="dropdown-item" href="#">${v.name}</a>
                    `
                );
            });
            $('#branch-list').empty();
            $.each(data , function (i,v) {
                $('#branch-list').append(
                    `
                    <li class="nav-item"><a href="" class="nav-link">${v.name}</a></li>
                    `
                );
            });
        }
    });
}

$(document).ready(function(){
    shop.dataCategory();
    shop.dataBrand();
    shop.dataBranch();
});
