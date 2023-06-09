@extends ('layouts.app')
@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card bg-light text-dark">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div><b>JKUAT CAMPUSES</b></div>
              <div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#add-campus" class="btn btn-success btn-sm pull-right">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Campus</button>
                <!-- <a href="#" class="btn btn-success btn-sm">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Member</a> -->
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row justify-content-center mt-2">
                <div class="col-md-6">
                    <form action="{{route('campus.search')}}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Search By Campus Name || Campus code " >
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                              Search</button>
                        </div>
                    </form>
                </div>
            </div>

          <div class="col-md-12">
            <div class="card-body">
              <div class="mb-1">
                <div class="table table-striped">
                  <table style="width: 100%;" class="table table-stripped">
                    <thead class="table-success">
                      <tr>
                        <th>#</th>
                        <th>Campus_ID</th>
                        <!-- <th>image</th> -->
                        <th>Campus code</th>
                        <th>
                          <centre>Campus_Name</centre>
                        </th>
                        <th>Added By</th>


                        <!-- <th>ID No</th> -->
                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                 

                      @foreach ($campus as $cmp)
                      <tr>
                        <td><input type="checkbox"></td>
                        <td>{{$cmp->cid}}</td>
                        <td>{{$cmp->ccode}}</td>
                        <td>{{$cmp->cname}}</td>
                        <td>{{$cmp->addedby}}</td>
                        
                          <td>
                            <center>
                            <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-telephone"><i class="fa fa-pencil-square-o"></i> Update</button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-telephone"><i class="fa fa-trash"></i>Delete</button>
        
                          </center>
                          </td>
                      </tr>

                      @endforeach
                      


                    </tbody>
                  </table>
                  

                </div>
                <div class="mt-2">
                 {{ $campus->links('pagination::bootstrap-5') }}
                 </div>


              </div>
              </form>
            </div>
          </div>
        </div>



        @endsection