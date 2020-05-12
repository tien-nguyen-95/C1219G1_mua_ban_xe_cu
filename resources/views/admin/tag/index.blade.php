<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        {{-- <link rel="stylesheet" href="css/site.css"> --}}
        <meta name="_token" content="{{ csrf_token() }}" />
    </head>

    <body>
        <div class="container">
            <h1>Tags Management</h1>
            <div class="row">
                <div class="col-12 mb-3" id="addTag">
                    <a href="javascript:;" class="btn btn-info" onclick="tag.showModal()">Create</a>
                    <a href="javascript:;" class="btn btn-info" onclick="tag.showTrash()">Trash</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="tbTag" class="table table-hover table-striped">
                        <thead >
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th id="date">Created_at</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addEditTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="formAddEditTag">
                        <input type="hidden" id="TagId" name="TagId" value="0">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="Title" type="text" id="Title" class="form-control"
                            placeholder="Enter title">
                            <span class="error-title"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <input name="Category" type="text" id="Category" class="form-control"
                            placeholder="Enter category">
                            <span class="error-category"></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-primary" onclick="tag.save()">Save</a>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.js"></script>

    <script src="js/tag.js"></script>
</html>
