<!-- The Modal -->
<div class="modal" id="modalFile">
    <div class="modal-dialog  modal-lg">
    <form action="" enctype="multipart/form-data" method="post" id="upload">
        {{ csrf_field() }}
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm ảnh</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div id="IdProduct" class="modal-body">
            {{-- <input hidden id="product_id" name="product_id" value=""> --}}
        </div>
        <div id="checkImage" class="modal-body">
        
        </div>
        <div class="modal-body">
            <input type="file" name="files"  class="selectImage" id="images"/>

            <div id="show-progress" class="show-progress">
        </div>
         <div id="EmptyImage" class="row justify-content-center">
          <div hidden  id="ShowImages" class="col-md-3">

          </div>
        </div>
        <!-- Modal footer -->
        <div id='file-list-display'></div>
        <div class="modal-footer">  
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="uploadImage">Upload</button>
        </div>
      </div>
    </form>
    </div>
  </div>