<script type="text/javascript">
    $(document).ready(function() {
        $('.data-table').load('/branch');
        $('#addform').on('submit' , function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/branch/create",
                data: $('#addform').serialize(),
                success: function () {
                    $('#addBranchModel').modal('hide');
                    $('.data-table').load('/branch');
                    alert('Tạo thành công');
                },
            });
        })
    });
</script>
