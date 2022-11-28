@extends("layouts.app")

@section("content")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Brands </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ ('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Brand</li>
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
                            <h3 class="card-title">All Brand</h3>
                            <button type="button" data-toggle="modal" data-target="#createBrandModal"
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
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td>{{$brand->description}}</td>

                                        <td>
                                            <a href="javascript:void(0)" title="Change status">
                                                @if($brand->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            <button onclick="openShowBrandModal('ginger-ward')" type="button"
                                                    class="btn btn-sm btn-primary" title="View"><i
                                                    class="fa fa-search-plus"></i></button>
                                            <button onclick="openEditBrandModal('{{$brand->id}}')" type="button"
                                                    class="btn btn-sm btn-success" title="Edit"><i
                                                    class="fa fa-edit"></i></button>

                                            <form method="POST" action="{{route('brands.destroy', $brand->id)}}"
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

        {{--                All Modals--}}

        <div class="modal fade" id="createBrandModal" tabindex="-1" aria-labelledby="createBrandModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createBrandModalLabel">Create Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('brands.store')}}" method="POST" class="form-horizontal"
                          id="brandCreateForm">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row no-gutters">
                                <label for="name" class="col-sm-3 col-form-label mandatory">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" required
                                           class="form-control @error('name') is-invalid @enderror "
                                           value="{{old('name')}}" id="name" placeholder="Enter Brand name">
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

{{--                Edit modal--}}
        <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBrandModalLabel">Edit Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" class="form-horizontal" id="brandEditForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row no-gutters">
                                <label for="name" class="col-sm-3 col-form-label mandatory">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" required
                                           class="form-control @error('name') is-invalid @enderror "
                                           value="{{old('name')}}" id="editBrandName" placeholder="Enter Brand name">
                                    @error('name')<span class="text-danger">{{$errors->first('name')}}</span>@enderror

                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                <textarea name="description" id="editBrandDescription" class="form-control"
                                          placeholder="Enter description (optional)"></textarea>
                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" id="editBrandStatus" name="status" data-bootstrap-switch
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
        let brands = @json($brands);

        // $(document).ready(function () {
        //
        // });


        function openEditBrandModal(id){
            let brand = brands.find(brand => brand.id == id);

            // Set edit form action url
            $('#brandEditForm').attr('action', app_url + '/brands/' + brand.id); // id

            // Set update row value
            $('#editBrandName').val(brand.name);
            $('#editBrandDescription').val(brand.description);
            brand.status == 1 ? $('#editBrandStatus').prop('checked', true) : $('#editBrandStatus').prop('checked', false);

            // Open modal
            $('#editBrandModal').modal('show');

        }
    </script>
@endpush
