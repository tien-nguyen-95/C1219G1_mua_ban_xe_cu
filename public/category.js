var category = {} || category;

category.drawTable = function(){
    $.ajax({
        url : "{{ route('category.index') }}",
        method : "GET",
        dataType : "json",
        success : function(data){
            $('#tbStudent').empty();
            var i = 0;
            $.each(data, function(i, v){
                $('#tbStudent').append(
                    "<tr>"+
                        "<td>"+ (i+1) +"</td>"+
                        "<td>" + v.FullName + "</td>"+
                        "<td><img src='"+ v.Avatar +"' width='50px' height='60px' /></td>"+
                        "<td>"+ v.DOB +"</td>"+
                        "<td>"+ v.Class.Name +"</td>"+
                        "<td>"+
                            "<a href='javascript:;' title='edit student' onclick='student.get("+ v.id +")'><i class='fa fa-edit'></i></a> " +
                            "<a href='javascript:;' title='remove student' onclick='student.delete("+ v.id +")' ><i class='fa fa-trash'></i></a>" +
                        "</td>"+
                    "</tr>"
                    `<tr>
                        <td></td>
                    </tr>`
                );
            });
        }
    });
};