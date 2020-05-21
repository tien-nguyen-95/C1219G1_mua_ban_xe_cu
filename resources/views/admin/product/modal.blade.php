    <!-- Modal -->
    <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form id="Form" action=""  enctype="multipart/form-data">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input hidden id="productId" name="productId" value="0">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-4">
                                <label>Mã sản phẩm</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="code" name="code" class="form-control">
                                <p style="color:red" id="code" class="errors-code"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Tên sản phẩm</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="name" name="name" class="form-control">
                                <p style="color:red" id="name" class="errors-name"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Thể loại</label>
                            </div>
                            <div class="col-8">
                                <select style="width:100%"  class="js-example-basic-single js-states form-control" id="category_id" >
                                    <option selected id="IdCategory"></option>
                                </select>
                                <label style="color:red" ></label >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Thương hiệu</label>
                            </div>
                            <div class="col-8">
                                <select style="width:100%"   class="js-example-basic-single js-states form-control" id="brand_id" name="brand_id" >
                                    <option selected id="IdBrand"></option>
                                </select>
                                <label style="color:red"  ></label >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Nhãn</label>
                            </div>
                            <div class="col-8">
                                <select style="width:100%" class="js-example-basic-single js-states form-control"  id="tag_id" name="tag_id">
                                    <option selected id="IdTag"></option>
                                </select>
                                <label style="color:red" ></label >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Đời sản phẩm</label>
                            </div>
                            <div class="col-8">
                                <select  style="width:100%" class="js-example-basic-single js-states form-control"  id="model_year" name="model_year">
                                    @for ($i =1950 ; $i <2021 ; $i++)
                                        <option selected id="year"></option>
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <p style="color:red" id="model_year" class="errors-model_year"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Giá nhập</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" name="currency-field" id="import_price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Giá nhập">
                                <p style="color:red" id="import_price" class="errors-import_price" ></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Giá bán</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" name="currency-field" id="export_price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Giá bán" class="form-control">
                                <p style="color:red" id="export_price" class="errors-export_price"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Chi nhánh</label>
                            </div>
                            <div class="col-8">
                                <select  style="width:100%" class="js-example-basic-single js-states form-control"  id="branch_id" name="branch_id">
                                    <option selected id="Idbranch"></option>
                                </select>
                                <label style="color:red"  ></label >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Trạng thái</label>
                            </div>
                            <div class="col-8">
                                <select name="status" id="status"  class="form-control">
                                    <option value="show">show</option>
                                    <option value="busy">busy</option>
                                    <option value="sold">sold</option>
                                </select>
                                <label style="color:red" ></label >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Tên nhân viên</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="staff_id" name="staff_id" class="form-control">
                                <label style="color:red"  ></label >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Ảnh</label>
                            </div>
                            <div class="col-8">
                                <input type="file" name="files"  class="selectImage" id="images" multiple/>
                                <div class="show-progress">
                                      
                                </div>            
                                <div class="row justify-content-center" id="showImage">
        
                                </div>                            
                                <p style="color:red" id="error" ></p >
                            </div>
                        </div>

                        <div class="row form-group">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <a href="javascript:;" class="btn btn-danger" id="" onclick="product.save()">Create</a>
                    </div>
                </div>
            </form>
        </div>
      </div>
