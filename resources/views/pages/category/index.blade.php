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
                                            <a href="javascript:void(0)" title="Change status">
                                                @if($category->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            <button onclick="openShowCategoryModal('ginger-ward')" type="button"
                                                    class="btn btn-sm btn-primary" title="View"><i
                                                    class="fa fa-search-plus"></i></button>
                                            <button onclick="openEditCategoryModal('{{$category->id}}')" type="button"
                                                    class="btn btn-sm btn-success" title="Edit"><i
                                                    class="fa fa-edit"></i></button>

                                            <form method="POST" action="{{route('categories.destroy', $category->id)}}"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure to delete?')"
                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

{{--        All Modals    --}}
        <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
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
                                    <input type="text" name="name" required
                                           class="form-control @error('name') is-invalid @enderror "
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
                                        data-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

{{--        Edit modal--}}
        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" class="form-horizontal" id="categoryEditForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row no-gutters">
                                <label for="name" class="col-sm-3 col-form-label mandatory">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" required
                                           class="form-control @error('name') is-invalid @enderror "
                                           value="{{old('name')}}" id="editCategoryName" placeholder="Enter category name">
                                    @error('name')<span class="text-danger">{{$errors->first('name')}}</span>@enderror

                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                <textarea name="description" id="editCategoryDescription" class="form-control"
                                          placeholder="Enter description (optional)"></textarea>
                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" id="editCategoryStatus" name="status" data-bootstrap-switch
                                           data-off-color="danger" data-on-color="info" value="1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-info">Update</button>
                                <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script>
        let app_url = '{{url('/')}}'
        // all categories in json format.
        let categories = @json($categories);

        // $(document).ready(function () {
        //
        // });


        function openEditCategoryModal(id){
            let category = categories.find(category => category.id == id);

            // Set edit form action url
            $('#categoryEditForm').attr('action', app_url + '/categories/' + category.id); // id

            // Set update row value
            $('#editCategoryName').val(category.name);
            $('#editCategoryDescription').val(category.description);
            category.status == 1 ? $('#editCategoryStatus').prop('checked', true) : $('#editCategoryStatus').prop('checked', false);

            // Open modal
            $('#editCategoryModal').modal('show');
            // console.log(category)
        }
    </script>
@endpush
