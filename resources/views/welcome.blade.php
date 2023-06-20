<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ip_telephony</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

        <link href="{{ asset('css/stylelogin.css') }}" rel="stylesheet">
         {{-- bootstrap links --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/boo    tstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

       
    </head>
    <body>
       
        <div id="div_navigation"> 
            <div id="progress_bar" class="progress-bar progress-bar-striped indeterminate"></div>
            <img id="img_logo" src="/logo/jkuat_logo_transparent.png" >
                    
            <div id="page_header">
                <span id="organization_name">JOMO KENYATTA UNIVERSITY OF AGRICULTURE AND TECHNOLOGY</span>
                <!-- <span id="organization_slogan">Setting Trends in Higher Education, Research and Innovation.</span>   -->
                <span id="app_title">Setting Trends in Higher Education, Research and Innovation.</span> 
            </div> 
           
        </div>
        <div class="container " style="padding-top: 10px; ">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card bg-light text-dark">
                  <div class="card ">
                    <div class="card-header" style="background-color: #4CA64C">
                      <div class="d-flex justify-content-center" style="font-family: poppins; font-size:14px; color:white; background-color:#4CA64C;">
                        <div><b>JKUAT ONLINE TELEPHONE DIRECTORY</b></div>
                       
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
                <form action="{{route('searchext')}}" name="query" method="GET" class="form-inline my-1 my-lg-0" role="#">

                  <input type="search" name="query" id="" class="form-control" placeholder="Search Extension Or Owner">
                  <span>&nbsp;</span>
                  <button type="submit" class="btn btn-success btn-sm "><i class="fa fa-search" aria-hidden="true"></i> Search</button>
              </div>
              </form>
              <!-- end of search handling form -->
                        <!-- end of search handling form -->
                 </div>
                    </div>
                    <div class="table-container">

                    <div class="table table-striped text-center">
                      <table  class="table table-stripped  ">
                        <thead class="table-success">
                          <tr>
                          
                            <th>Campus</th>
                            <th>Ext.NO</th>
                            <th>Owner Assigned</th>
                            <th>Department Name</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($telephones as $telephone)
                          <tr>
                            <td>{{$telephone->ccode}}</td>
                            <td>{{$telephone->extnumber}}</td>
                            <td>{{$telephone->owerassigned}}</td>
                            <td>{{$telephone->deptname}}</td>
                         
                          </tr>
                          @endforeach
            </table>
                    </div>
            <div class="mt-4">
              {{$telephones->links('pagination::bootstrap-5') }}
            </div>

            <div class="footer">
                @include('footer')

            </div>
      
    </body>
</html>
