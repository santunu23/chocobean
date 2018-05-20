@extends('admin.inc.app')
@section('content')
@include('admin.inc.sidebar')
 <table class="table table-stripped">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Brand</th>
                            <th>Time and date</th>
                            <th>Admin</th>
                            <th>Product Delete</th>
                            <th>Product Update</th>
                        </tr>
                        <tr>
                            @foreach($hr_request as $hr)
                            <td>{{$hr->name}}</td>
                            <td>{{$hr->price}}</td>
                            <td>{{$hr->brand}}</td>
                            <td>{{$hr->created_at}}</td>
                            <td>{{$hr->admin}}</td>
                            <td>
                               {!! Form::open(['action' =>['AdminDashboard@destroy',$hr->id],'method'=>'POST']) !!}
                               {{ Form::hidden('_method','DELETE') }}
                               {{ Form::bsSubmit('Delete',['class'=>'btn btn-danger']) }}
                                {!! Form::close() !!}
                            </td>
                            <td>
                            	{!! Form::open(['action' =>['AdminDashboard@edit',$hr->id],'method'=>'GET']) !!}
                                {{ Form::bsSubmit('Edit info',['class'=>'btn btn-primary']) }}
                                {!! Form::close() !!}
                            </td>
                           
                            
                            

                        </tr>
                        @endforeach
                    </table>
@endsection