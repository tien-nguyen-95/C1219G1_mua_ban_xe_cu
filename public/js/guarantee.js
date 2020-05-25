
    var guarantee = {} || guarantee;

    guarantee.showData = function () {
        $.ajax({
            url: "http://127.0.0.1:8000/guarantee",
            method: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#tbGuaranteeData tbody').empty();
                $.each(data, function (i, v) {
                    $('#tbGuaranteeData tbody').append(
                        `
                        <tr>
                            <td>${++i}</td>
                            <td>${v.product.name}</td>
                            <td>${v.issue}</td>
                            <td>${v.date_in}</td>
                            <td>${v.date_out}</td>
                            <td>
                                <a href="javascript:;" onclick="guarantee.getDetail(${v.id})"><i class="fa fa-edit"></i></a>
                                <a href="javascript:;" onclick="guarantee.remove(${v.id})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        `
                    );
                });
                $('#tbTagData').DataTable();

            },
            error : function(e){
                console.log(e);
            }

        });
    }
    $(document).ready(function () {
        guarantee.showData();
        // tag.showTrash();
        // // tag.showTrash();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
    });
