 <!-- Modal -->
  <div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Do you realy want to delete this song?</h4>
        </div>
     
        <div class="modal-footer">
         <a href="delcart.php?deid=<? $row['songID']?>" class="btn btn-danger"> Yes, I do</a>
          <button type="button" class="btn btn-danger
          btn-left" data-dismiss="modal">No</button>
        </div>
      </div>
      
    </div>
  </div>