@extends ('layouts.app')
@section ('content')

<div class="container ">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card bg-light text-dark">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div><b>JKUAT IP_TELEPHONES</b></div>
              <div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#add-telephone" class="btn btn-success btn-sm pull-right">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Telephone</button>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card-body">
              <div class="mb-1">
                <form action="{{route('filter')}}" name="query" method="GET" class="form-inline my-1 my-lg-0" role="#">
                  <div class="form-group">
                    <label for="campus_filter">Filter by : Campus &nbsp;</label>
                    <Select class="custom-select" id="campus_filter" name="query">
                      <option value=" ">Select Campus</option>
                      @foreach($campus as $id => $name)
                      <option value="{{ $id }}">{{ $name }}</option>
                      @endforeach
                    </select>
                    <span>&nbsp;</span>                   
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <label for="category_filter"> &nbsp;Department &nbsp;</label>
                    <Select class="custom-select" id="category_filter" name="querys">
                      <option value=" ">Select Department</option>
                      @foreach($departments as $id => $name)
                      <option value="{{ $id }}">{{ $name }}</option>
                      @endforeach
                    </select>
                    <span>&nbsp;</span>
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#add-department" class="btn btn-outline-primary btn-sm">
                     Filter <i class="fa fa-filter" aria-hidden="true"></i>
                    </button>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <!-- <button type="submit" class="btn btn-primary "><i class="fa fa-filter" aria-hidden="true"></i> Filter</button> -->
                </form>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <!-- search handling form -->
                <form action="{{route('search')}}" name="query" method="GET" class="form-inline my-1 my-lg-0" role="#">

                  <input type="search" name="query" id="" class="form-control" placeholder="Search Ext_NO || Owner Assigned">
                  <span>&nbsp;</span>
                  <button type="submit" class="btn btn-success btn-sm "><i class="fa fa-search" aria-hidden="true"></i> Search</button>
              </div>
              </form>
              <!-- end of search handling form -->
       </div>
          </div>
          <div class="table-container">
            <div class="table table-striped text-center"  >
              <table class="table table-stripped ">
                <thead class="table-success">
                  <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Campus</th>
                    <th>Ext.NO</th>
                    <th>Owner Assigned</th>
                    <th>Department Name</th>
                    <th>
                      <center>Action</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if ($errors->has('extnumber'))
                  <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> 
                    {{ $errors->first('extnumber','Extension Number Already exists') }}
                  </div>
              @endif
                  @foreach($telephones as $telephone)
              
                  <tr>
                    <td><input type="checkbox"></td>
                    <td>{{$telephone->id}}</td>
                    <td>{{$telephone->ccode}}</td>
                    <td>{{$telephone->extnumber}}</td>
                    <td>{{$telephone->owerassigned}}</td>
                    <td>{{$telephone->deptname}}</td>
                    <td>
                      <center>
                      <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#edittelephoneModal" data-item-id="{{ $telephone->id }}"><i class="fa fa-pencil-square-o"></i> Update</button>
                      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletetelephone{{$telephone->id}}"><i class="fa fa-trash"></i>Delete</button>
                    </center>
                    
                    </td>
                  </tr>
                  @endforeach
  
                </tbody>
              </table>
  
            </div>
            <div class="mt-4">
              {{$telephones->links('pagination::bootstrap-5') }}
            </div>

          </div>
          

        </div>
        </form>
      </div>

    </div>
  </div>

  <!-- delete telephone modal -->
<div class="delete-telephone-modal">
<div class="modal fade " id="deletetelephone{{$telephone->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash" aria-hidden="true"></i> ARE YOU SURE YOU WANT TO DELETE THIS EXTENSION !!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p style="color: red;">* This operation can not be reverted</p>
                <form action="{{ route('telephone.delete',$telephone->id) }}" method="DELETE">
                  @method('delete')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Level of Education">Campus</label>
                                <Select class="custom-select" id="ccode" disabled name="ccode" value="{{$telephone->ccode}}">
                                <option value=" {{$telephone->ccode}}">{{$telephone->ccode}}</option>
                                     @foreach($campus as $camp)
                                    <option value="{{$camp}}">{{ $camp}}</option>
                                @endforeach 
                            </select>
                           
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Level of Education">Department</label>
                            <Select class="custom-select" id="deptname" disabled name="deptname" value="{{$telephone->deptcode}}">
                                <option value=" {{$telephone->deptname}}">{{$telephone->deptname}}</option>
                                @foreach($departments as $dept)
                                <option value="{{ $dept }}">{{ $dept }}</option>
                            @endforeach 
                            </select>
                            
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ext number">Extension Number</label>
                            <input type="text" disabled class="form-control" id="extnumber" name="extnumber" placeholder="Enter extension Number ex.1002" value="{{$telephone->extnumber}}">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_number">Owner Assigned</label>
                            <input type="text" disabled class="form-control" id="ownerassigned" name="owerassigned" placeholder="Owner Assigned" value="{{$telephone->owerassigned}}">
                           
                        </div>
                    </div>
                      
            <div class="modal-footer ">
            <button type="button" class="btn btn-secondary pull-right" data-bs-dismiss="modal">CANCEL</button>

            <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-trash" aria-hidden="true"></i>
                        DELETE
                    </button>
            </div>
            </form>

        </div>
    </div>
</div>

</div>




<div class="edit-telephone-modal">
  <!-- EDIT TELEPHONE MODAL -->
<div class="modal fade " id="edittelephoneModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel"><i class="fa fa-edit" aria-hidden="true"></i> UPDATE TELEPHONE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('telephone.update',$telephone->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Level of Education">Campus</label>
                                <Select class="custom-select" id="ccode" name="ccode" value="{{$telephone->ccode}}">
                                <option value=" {{$telephone->ccode}}">{{$telephone->ccode}}</option>
                                     @foreach($campus as $camp)
                                    <option value="{{$camp}}">{{ $camp}}</option>
                                @endforeach 
                            </select>
                           
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Level of Education">Department</label>
                            <Select class="custom-select" id="deptname" name="deptname" value="{{$telephone->deptcode}}">
                                <option value=" {{$telephone->deptname}}">{{$telephone->deptname}}</option>
                                @foreach($departments as $dept)
                                <option value="{{ $dept }}">{{ $dept }}</option>
                            @endforeach 
                            </select>
                            
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_number">Extension Number</label>
                            <input type="text" class="form-control" id="extnumber" name="extnumber" placeholder="Enter extension Number ex.1002" value="{{$telephone->extnumber}}">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_number">Owner Assigned</label>
                            <input type="text" class="form-control" id="ownerassigned" name="owerassigned" placeholder="Owner Assigned" value="{{$telephone->owerassigned}}">
                           
                        </div>
                    </div>
                      
            <div class="modal-footer ">
            <button type="button" class="btn btn-secondary pull-right" data-bs-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-edit" aria-hidden="true"></i>
                        Update
                    </button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- end of edit/update telephone modal -->
<script>
  var edittelephoneModal = document.getElementById('edittelephoneModal');
  edittelephoneModal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget; // Button that triggered the modal
      var telephoneId = button.getAttribute('data-telephone-id'); // Extract telephone ID from button attribute

      // Set the telephone ID in the form input field
      var telephoneInput = document.getElementById('telephone_id');
      telephoneInput.value = telephoneId;
  });
</script>
</div>




 
<div class="add-telephone-modal">
 <!-- Add Telephone modal -->

 <div class="modal fade " id="add-telephone" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD NEW TELEPHONE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('telephone.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Level of Education">Campus</label>
                                <Select class="custom-select" id="ccode" name="ccode">
                                    <option value=" ">Select  Campus</option>
                                     @foreach($campus as $camp)
                                    <option value="{{$camp}}">{{ $camp}}</option>
                                @endforeach 
                            </select>
                           
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Level of Education">Department</label>
                            <Select class="custom-select" id="deptname" name="deptname">
                                <option value=" ">Select Department</option>
                                @foreach($departments as $dept)
                                <option value="{{ $dept }}">{{ $dept }}</option>
                            @endforeach 
                            </select>
                            
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_number">Extension Number</label>
                            <input type="text" class="form-control" id="extnumber" name="extnumber" placeholder="Enter extension Number ex.1002">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_number">Owner Assigned</label>
                            <input type="text" class="form-control" id="ownerassigned" name="owerassigned" placeholder="Owner Assigned">
                           
                        </div>
                    </div>
                      
            <div class="modal-footer ">
            <button type="button" class="btn btn-secondary pull-right" data-bs-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-add" aria-hidden="true"></i>
                        ADD 
                    </button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- end of ADD Telephonemodal -->


</div>
@endsection


