function selectData (nameData)
{
    $.ajax({
        url : "/"+nameData,
        method: "GET",
        dataType: "json",
        success: function(data){
            $('#'+nameData+'_id').empty();
            if(nameData == "user"){
                $.each(data , function (i,v) {
                    $('#'+nameData+'_id').append(
                        `
                            <option value="${v.id}">${v.email}</option>
                        `
                    );
                });
            }

            else{
                $.each(data , function (i,v) {
                    $('#'+nameData+'_id').append(
                        `
                            <option value="${v.id}">${v.name}</option>
                        `
                    );
                });
            }
        }
    });
}


function messenger(_text)
{
    $.toast({
        heading: 'Thông báo',
        text: _text,
        hideAfter: 3000,
        position: 'top-center',
        showHideTransition: 'slide',
        icon: 'success'
    })
}

function showError(errors)
{
    if(errors.status == 422){
        $('small.fieldError').remove();
        $.each(errors.responseJSON.errors, function(i,v) {
            $(`input[name=${i}]`).after(`<small class="text-danger fieldError">${v}</small>`);
            $(`select[name=${i}]`).after(`<small class="text-danger fieldError">${v}</small>`);
        });
    }
}


function dateForm(date){
    date = new Date(date);
    var day = date.getDate() + "";
    var month = (date.getMonth() + 1) + "";
    var year = date.getFullYear() + "";
    return day + "/" + month + "/" + year ;
}
