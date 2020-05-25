
 
 
 
 <!-- Modal -->
    <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
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
                                <input type="text" id="code" name="code" class="form-control" placeholder="---Điền thông tin---">
                                <p style="color:red" id="code" class="errors-code"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Tiêu đề</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="inputtitle" name="inputtitle" class="form-control" placeholder="---Điền thông tin---">
                                <p style="color:red" id="code" class="errors-inputtitle"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Dòng xe</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="name" name="name" class="form-control" placeholder="---Điền thông tin---">
                                <p style="color:red" id="name" class="errors-name"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Đời xe</label>
                            </div>
                            <div class="col-8">
                                <select  style="width:100%" class="js-example-basic-single js-states form-control"  id="model_year" name="model_year">
                                    @for ($i =1950 ; $i <2021 ; $i++)
                                        <option selected  id="modelyear"></option>
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <p style="color:red" id="model_year" class="errors-model_year"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Năm đăng kí</label>
                            </div>
                            <div class="col-8">
                                <select  style="width:100%" class="js-example-basic-single js-states form-control"  id="register_year" name="register_year">
                                    @for ($i =1950 ; $i <2021 ; $i++)
                                        <option selected id="registeryear"></option>
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <p style="color:red" id="register_year" class="errors-register_year"></p >
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-4">
                                <label>Đã đi (km)</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="miles" name="miles" class="form-control" placeholder="---Điền thông tin---">
                                <p style="color:red" id="miles" class="errors-miles"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Màu</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="color" name="color" class="form-control" placeholder="---Điền thông tin---">
                                <p style="color:red" id="color" class="errors-color"></p >
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <div class="col-4">
                                <label>Xuất xứ</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="origin" name="origin" class="form-control" placeholder="---Điền thông tin---">
                                <p style="color:red" id="origin" class="errors-origin"></p >
                            </div>
                        </div>
        
                        <div class="row form-group">
                            <div class="col-4">
                                <label>Giá nhập</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" name="import_price" id="import_price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Giá nhập">
                                <p style="color:red" id="import_price" class="errors-import_price" ></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Giá bán</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" name="export_price" id="export_price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Giá bán" class="form-control">
                                <p style="color:red" id="export_price" class="errors-export_price"></p >
                            </div>
                        </div>
          
                        <div class="row form-group">
                            <div class="col-4">
                                <label>Trạng thái</label>
                            </div>
                            <div class="col-8">
                                <select name="status" id="status"  class="form-control">
                                    <option  value="show">show</option>
                                    <option value="busy">busy</option>
                                    <option value="sold">sold</option>
                                </select>
                                <p style="color:red" id="status" class="errors-status"></p >
                            </div>
                        </div>
           
                        <div class="row form-group">
                            <div class="col-4">
                                <label>Chi nhánh</label>
                            </div>
                            <div class="col-8">
                                <select  style="width:100%" class="js-example-basic-single js-states form-control"  id="branch_id" name="branch_id">
                                    <option  hidden selected id="Idbranch"></option>
                                </select>
                                <p style="color:red" id="branch_id" class="errors-branch_id"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Thương hiệu</label>
                            </div>
                            <div class="col-8">
                                <select style="width:100%"   class="js-example-basic-single js-states form-control" id="brand_id" name="brand_id" >
                                    <option hidden id="IdBrand"></option>
                                </select>
                                <p style="color:red" id="brand_id" class="errors-brand_id"></p >
                            </div>
                        </div>
                    
                        <div class="row form-group">
                            <div class="col-4">
                                <label>Thẻ</label>
                            </div>
                            <div class="col-8">
                                <select style="width:100%" class="js-example-basic-single js-states form-control"  id="tag_id" name="tag_id">
                                    <option hidden id="IdTag"></option>
                                </select>
                                <p style="color:red" id="tag_id" class="errors-tag_id"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Thể loại</label>
                            </div>
                            <div class="col-8">
                                <select style="width:100%"  class="js-example-basic-single js-states form-control" id="category_id" >
                                    <option hidden id="IdCategory"></option>
                                </select>
                                <p style="color:red" id="category_id" class="errors-category_id"></p >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-4">
                                <label>Tên nhân viên</label>
                            </div>
                            <div class="col-8">
                                <select style="width:100%"  class="js-example-basic-single js-states form-control" id="staff_id"  name="staff_id">
                                    <option hidden id="IdStaff"></option>
                                </select>
                                <p style="color:red" id="staff_id" class="errors-staff_id"></p >
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
