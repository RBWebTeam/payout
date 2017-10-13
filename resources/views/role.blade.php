  @extends('includes.master')
  @section('content')    
<div class="right_col" role="main">
            <div class="row  class="right_col"">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
              
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <b style="font-size: 30px">Role</b>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Active</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($query as $val)
                        <tr>
                          <td>{{$val->id}}</td>
                          <td>{{$val->name}}</td>
                          <td>{{$val->active}}</td>
                          <td><a class="btn btn-round btn-info" href="{{url('role/view')}}/{{$val->id}}">View</a> <a class="btn btn-round btn-primary" href="{{url('role/edit')}}/{{$val->id}}">Edit</a> <a class="btn btn-round btn-success" href="{{url('role/delete')}}/{{$val->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
                        
                        @endforeach
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
  @endsection