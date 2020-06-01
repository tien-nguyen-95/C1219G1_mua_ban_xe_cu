
         <!-- Modal create -->
         <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm bảo hành</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="Form">
                            <input type="hidden" id="productId" name="productId" value="0">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="#"><b><i> Mã sản phẩm </i></b></label>
                                    <input type="text" id="code" name="code" class="form-control" placeholder="---Điền thông tin---">
                                    <p style="color:red"  class="errors-code"></p >
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Đời xe</i></b></label>
                                    <select  style="width:100%" class="js-example-basic-single js-states form-control"  id="model_year" name="model_year">
                                        @for ($i =1950 ; $i <2021 ; $i++)
                                            <option selected  id="modelyear"></option>
                                            <option value="{{$i}}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <p style="color:red" class="errors-model_year"></p >
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="#"><b><i>Tiêu đề</i></b></label>
                                    <input type="text" id="inputtitle" name="inputtitle" class="form-control" placeholder="---Điền thông tin---">
                                    <p style="color:red" class="errors-title"></p >
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Năm đăng kí </i></b></label>
                                    <select  style="width:100%" class="js-example-basic-single js-states form-control"  id="register_year" name="register_year">
                                        @for ($i =1950 ; $i <2021 ; $i++)
                                            <option selected id="registeryear"></option>
                                            <option value="{{$i}}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <p style="color:red" class="errors-register_year"></p >
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="#"><b><i> Dòng xe </i></b></label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="---Điền thông tin---">
                                    <p style="color:red"  class="errors-name"></p >
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Trạng thái</i></b></label>
                                    <select name="status" id="status"  class="form-control">
                                        <option  value="show">show</option>
                                        <option value="busy">busy</option>
                                        <option value="sold">sold</option>
                                    </select>
                                    <p style="color:red"  class="errors-status"></p >
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="#"><b><i> Phân khối (CC)</i></b></label>
                                    <input type="text" id="cc" name="cc" class="form-control" placeholder="---Điền thông tin---">
                                    <p style="color:red"  class="errors-cc_number"></p >
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Chi nhánh tiếp nhận </i></b></label>
                                    <select  style="width:100%" class="js-example-basic-single js-states form-control"  id="branch_id" name="branch_id">
                                        <option  hidden selected id="Idbranch"></option>
                                    </select>
                                    <p style="color:red"  class="errors-branch_id"></p >
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="#"><b><i> Đã đi (km)</i></b></label>
                                    <input type="text" id="miles" name="miles" class="form-control" placeholder="---Điền thông tin---">
                                    <p style="color:red"  class="errors-miles"></p >
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Thương hiệu</i></b></label>
                                    <select style="width:100%"   class="js-example-basic-single js-states form-control" id="brand_id" name="brand_id" >
                                        <option hidden id="IdBrand"></option>
                                    </select>
                                    <p style="color:red"  class="errors-brand_id"></p >
                                </div>


                                <div class="form-group col-md-8">
                                    <label for="#"><b><i> Màu xe</i></b></label>
                                    <input type="text" id="color" name="color" class="form-control" placeholder="---Điền thông tin---">
                                    <p style="color:red" class="errors-color"></p >
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Thẻ</i></b></label>
                                    <select style="width:100%" class="js-example-basic-single js-states form-control"  id="tag_id" name="tag_id">
                                        <option hidden id="IdTag"></option>
                                    </select>
                                    <p style="color:red"  class="errors-tag_id"></p >
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="#"><b><i>Giá nhập </i></b></label>
                                    <input class="form-control" type="text" name="import_price" id="import_price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Giá nhập">
                                    <p style="color:red"  class="errors-import_price" ></p >
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Loại xe</i></b></label>
                                    <select style="width:100%"  class="js-example-basic-single js-states form-control" id="category_id" >
                                        <option hidden id="IdCategory"></option>
                                    </select>
                                    <p style="color:red" class="errors-category_id"></p >
                                </div>

                                
                                <div class="form-group col-md-8">
                                    <label for="#"><b><i>Giá bán</i></b></label>
                                    <input class="form-control" type="text" name="export_price" id="export_price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Giá bán" class="form-control">
                                    <p style="color:red"  class="errors-export_price"></p >
                                </div>
                             

                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Nhân viên phụ trách </i></b></label>
                                    <select style="width:100%"  class="js-example-basic-single js-states form-control" id="staff_id"  name="staff_id">
                                        <option hidden id="IdStaff"></option>
                                    </select>
                                    <p style="color:red"  class="errors-staff_id"></p >
                                </div>
  
                                <div class="form-group col-md-12">
                                    <label for="#"><b><i>Xuất xứ</i></b></label>
                                    <input type="text" id="origin" name="origin" class="form-control" placeholder="---Điền thông tin---">
                                    <p style="color:red"  class="errors-origin"></p >
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <a href="javascript:;" class="btn btn-danger" id="add" onclick="product.save()">Create</a>
                    </div>
                </div>
            </div>
        </div>

