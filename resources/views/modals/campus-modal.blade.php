
{{-- modal campus --}}

<div class="modal fade " id="add-campus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD CAMPUS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('campus.store') }}" method="post" enctype="multipart/form-data">
                    @csrf                          
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_number">Campus Code</label>
                            <input type="text" class="form-control" id="ccode" name="ccode" placeholder="Enter Campus Code ex.Karen1">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_number">Campus Name </label>
                            <input type="text" class="form-control" id="cname" name="cname" placeholder="Campus Name ex.Main,Karen">
                           
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_number">Added By</label>
                            <input type="text" disabled class="form-control " id="addedby" name="addedby" placeholder="" value="{{ auth()->check() ? auth()->user()->name : '' }}">
                           
                        </div>
                        
                    </div>
             
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i>
                        SAVE
                    </button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- end of ADD Campus modal -->


