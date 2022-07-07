@extends('layouts.dashboard')

@section('content')

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary float-left">{{ __('Manage List') }}</h3>           
            
            <a href="#" class="btn btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#addListModal" >
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add a list</span>
            </a>
            
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>List</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $key => $todo)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $todo->list_name }}</td>
                                <td>{{ $todo->created_at }}</td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addListModal" tabindex="-1" role="dialog" aria-labelledby="addListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New List</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('todo:store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">                
                    <div class="form-group">
                    <label for="list_name" class="col-form-label">List Name:</label>
                    <input type="text" class="form-control" id="list_name" name="list_name" value="Untitled List">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
        </div>
    </div>

@endsection