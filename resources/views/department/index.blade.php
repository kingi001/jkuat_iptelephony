@extends ('layouts.app')
@section ('content')
<div class="container-xl">
  <div class="row justify-content-center">
    <div class="col-md-14">
      <div class="card bg-light text-dark">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div><b>JKUAT DEPARTMENTS</b></div>
              <div>
                
                <button type="button" data-bs-toggle="modal" data-bs-target="#add-department" class="btn btn-primary  btn pull-right">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Department</button>
                <!-- <a href="#" class="btn btn-success btn-sm">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Member</a> -->
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row justify-content-center mt-2">
                <div class="col-md-6">
                    <form action="{{route('department.search')}}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Search By Dept.code || Dept Name or Owner Assgn || Campus" >
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                              Search</button>
                        </div>
                    </form>
                </div>
            </div>
          <div class="col-md-14">
            <div class="card-body">
              <div class="mb-1">
                <div class="table-container">

                <div class="table table-striped">
                  <table style="width: 100%;" class="table table-stripped">
                    <thead class="table-primary">
                      <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Campus Code</th>
                        <th>Department Code</th>
                        <th>Owner Assigned</th>
                        <th>Department Name</th>
                        <th>
                          <centre>Action</centre>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($departments as $department)
                      <tr>
                        <td><input type="checkbox"></td>
                        <td>{{$department->id}}</td>
                        <td>{{$department->ccode}}</td>
                        <td>{{ $department->deptcode }}</td>
                        <td>{{ $department->ownerassigned }}</td>
                        <td>{{ $department->deptname }}</td>
                        
                          <td>
                            <center>
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-telephone"><i class="fa fa-pencil-square-o"></i> Update</button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-telephone"><i class="fa fa-trash"></i>Delete</button>
        
                          </center>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
               
                 

                </div>
                <div class="mt-5">
                 {{$departments->links('pagination::bootstrap-5') }}
                 </div>
                </div>
               

              </div>
              </form>
            </div>
          </div>
        </div>



        <!-- Add Department modal -->
<div class="modal fade " id="add-department" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD NEW DEPARTMENT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('department.store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="department"> &nbsp;Department &nbsp;</label>
                        <input type="text" class="form-control" id="deptcode" name="deptcode" placeholder="Enter the Department Code" >

                            
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_number">Owner Assigned</label>
                            <input type="text" class="form-control @error('id_number') is-invalid @enderror" id="ownerassigned" name="ownerassigned" placeholder="Enter the Owner Assigned">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_number">Department Name</label>
                            <input type="text" class="form-control " id="deptname" name="deptname" placeholder="Enter Department Name" >
                           
                        </div>
                        
                    </div>
             
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-primary "><i class="fa fa-plus-circle" aria-hidden="true"></i>
                        ADD
                    </button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- end of ADD Telephonemodal -->



        @endsection