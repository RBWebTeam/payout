  @extends('includes.master')
  @section('content')    
<div class="right_col" role="main">
            <div class="row  class="right_col"">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
               @if (Session::has('msg'))
                <div class="alert alert-success" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Success!</strong> {{ Session::get('msg') }}  
               </div>
               @endif
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <b style="font-size: 30px">Status</b>
                    <a class="btn btn-success" href="{{url('status-add')}}">Add</a>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Active</th>
                          <th>Sequence</th>
                          
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($query as $val)
                        <tr>
                          <td>{{$val->id}}</td>
                          <td>{{$val->name}}</td>
                          <td>{{$val->active}}</td>
                           <td>{{$val->sequence}}</td>
                          
                          <td><a class="btn btn-round btn-info" href="{{url('status/view')}}/{{$val->id}}">View</a> <a class="btn btn-round btn-primary" href="{{url('status/edit')}}/{{$val->id}}">Edit</a> <a class="btn btn-round btn-success" href="{{url('status/delete')}}/{{$val->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
                        </tr>
                        @endforeach
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
  @endsection