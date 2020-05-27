<!-- The Modal -->
<div class="modal" id="modalFile">
    <div class="modal-dialog">
    <form action="" enctype="multipart/form-data" method="post" id="upload">
        {{ csrf_field() }}
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm ảnh</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <input type="file" name="files"  class="selectImage" id="images"/>

            <div class="show-progress"></div>
        </div>
         <div class="row justify-content-center" id="showImage">
        
        </div>
        <!-- Modal footer -->
        <div id='file-list-display'></div>
        <div class="modal-footer">  
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          {{-- <input type="submit" value="Upload"> --}}
          {{-- <a href="javascript:;" class="btn btn-success" id="add" onclick="product.uploadFile()">Upload</a> --}}
          <button type="submit" class="btn btn-primary" id="uploadImage">Upload</button>
        </div>
      </div>
    </form>
    </div>
  </div>