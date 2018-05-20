@extends('admin.inc.app')
@section('content')
@include('admin.inc.sidebar')
{!! Form::open(['action' =>['AdminDashboard@store'],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        {{  Form::bsText('name',"",['placeholder'=>'Product Name : '])  }}
                        {{  Form::bsText('price',"",['placeholder'=>'Product price : '])  }}
                        {{  Form::bsText('brand',"",['placeholder'=>'Product brand : '])  }}
                        <div class="form-group">
                        {{  Form::file('cover_image') }}
                        </div>
                         {{ Form::hidden('admin',Auth::user()->name) }} 
                        
                       {{ Form::bsSubmit('submit'),['class'=>'btn btn-success'] }}
                      {!! Form::close() !!} 
                    </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

