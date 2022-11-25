@extends("layouts.app")

@section("content")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Category </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ ('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Categories</h3>
                            <button type="button" data-toggle="modal" data-target="#createCategoryModal"
                                    class="btn btn-info float-right btn-sm">
                                <i class="fa fa-plus"></i> Add New
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>

                                        <td>
                                            <a href="javascript:void(0)" onclick="categoryStatusChange('ginger-ward')"
                                               data-href="http://127.0.0.1:8000/admin/categories/status/update/ginger-ward"
                                               data-toggle="tooltip" title="Change status"
                                               id="categoryStatus-ginger-ward">
                        <span class="badge badge-success">
                        Active
                    </span>
                                            </a>
                                        </td>
                                        <td>
                                            <button onclick="openShowCategoryModal('ginger-ward')" type="button"
                                                    class="btn btn-sm btn-primary" data-toggle="tooltip" title="View"><i
                                                    class="fa fa-search-plus"></i></button>
                                            <button onclick="openEditCategoryModal('ginger-ward')" type="button"
                                                    class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i
                                                    class="fa fa-edit"></i></button>

                                            <form method="POST"
                                                  action="http://127.0.0.1:8000/admin/categories/ginger-ward"
                                                  accept-charset="UTF-8" id="deleteForm-ginger-ward" class="d-inline">
                                                <input name="_method" type="hidden" value="DELETE"><input name="_token"
                                                                                                          type="hidden"
                                                                                                          value="ByTYA2bS465WBVGFdOmqxhtNq7wY8jldCewKLRtM">
                                                <button type="button" onclick="deleteBtn('ginger-ward')"
                                                        class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tfoot>
                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">@lang('trans.create_category')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('categories.store')}}" method="POST" class="form-horizontal"
                          id="categoryCreateForm">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row no-gutters">
                                <label for="name" class="col-sm-3 col-form-label mandatory">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{old('name')}}" id="name" placeholder="Enter category name">
                                    @error('name')<span class="text-danger">{{$errors->first('name')}}</span>@enderror

                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                <textarea name="description" id="description" class="form-control"
                                          placeholder="Enter description (optional)"></textarea>
                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" id="status" checked name="status" data-bootstrap-switch
                                           data-off-color="danger" data-on-color="info" value="1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-info">Create</button>
                                <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    </div>

@endsection
