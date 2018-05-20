    @extends('admin.inc.app')
    @section('content')
    @include('admin.inc.sidebar')
                         <table class="table table-stripped">
                            <tr>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Brand</th>
                                <th>Entry Admin</th>
                                <th>Deleted At</th>
                                <th>Restore Item</th>
                                <th>Delete Permanently</th>
                                
                            </tr>
                            <tr>
                                @foreach($deleterecord as $hr)
                                <td>{{$hr->name}}</td>
                                <td>{{$hr->price}}</td>
                                <td>{{$hr->brand}}</td>
                                <td>{{$hr->admin}}</td>
                                <td>{{$hr->deleted_at}}</td>
                                <td><a href="{{ url('/admin/managedeleterecords', $hr->id) }}" class="btn btn-success">Restore</a></td>
            <td><a href="{{ url('/admin/managedeleterecord', $hr->id) }}" class="btn btn-danger">Delete</a></td>
                             </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @endsection