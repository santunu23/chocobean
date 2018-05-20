@extends('/layouts/app')
@section('content')
@include('/admin/inc/sidebar')


             {!! Form::open(['action' =>['AdminDashboard@update',$editfile->id],'method'=>'POST']) !!}
                        {{  Form::bsText('name',$editfile->name,['placeholder'=>'Product Name : '])  }}
                        {{  Form::bsText('price',$editfile->price,['placeholder'=>'Product price : '])  }}
                        {{  Form::bsText('brand',$editfile->brand,['placeholder'=>'Product brand : '])  }}
                        {{ Form::hidden('_method','PUT') }}
                        {{ Form::bsSubmit('submit'),['class'=>'btn btn-warning'] }}
                      {!! Form::close() !!} 
  
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection