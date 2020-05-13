var customer = {} || customer;

customer.showData = function(){
    $('#tbCustomer').DataTable({
        ajax: {
            url : "/customer",
            dataSrc: function(jsons){
                return jsons.map(obj=>{
                    return {
                        name: obj.name,
                        phone: obj.phone,
                        email: obj.email,
                        address: obj.address,
                        created_at: obj.created_at,
                        action: `<a class="text-warning mx-auto btn" onclick="customer.getDetail(${obj.id})"><i class="fa fa-edit"></i></a>
                                <a class="text-danger mx-auto btn" onclick="customer.remove(${obj.id})"><i class="fa fa-trash"></i></a>`
                    }
                })
            }
        },
        columns: [
            {data: 'name'},
            {data: 'phone'},
            {data: 'email'},
            {data: 'address'},
            {data: 'created_at'},
            {data: 'action'}
        ]
    });
}

customer.showModal = function(){
 
    $('#customerModal').modal('show');

}


customer.init = function() {

    customer.showData();

}


$(document).ready(function () {
    
    customer.init();

});