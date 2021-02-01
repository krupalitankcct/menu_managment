@extends('menu::app')
@section('content')
    <form action="{{ route('menu.update',$menuPageEdit->id) }}" class="form-horizontal" method="post" >
        {{ csrf_field() }}
    <div class="card menu-margin">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{__('package_lang::validation.custom.Menu_header')}}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
             @include('menu::messages')
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Title</label>
                        <div class="col-md-10">
                            <input type="text" name="title" class="form-control" placeholder="Title" required autofocus="true" value="{{$menuPageEdit->title}}" />
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Menu Category</label>
                        <div class="col-md-10">
                           <select name="menu_category_id" class="form-control w-75" required>
                                <option value="">Select Menu Category </option>
                                @foreach($menuCategories as $key => $menuCategorie)
                                    @if($menuPageEdit->menu_category_id == $key)
                                        <option value="{{$key}}" selected>{{$menuCategorie}} </option>
                                    @else
                                        <option value="{{$key}}">{{$menuCategorie}} </option>
                                    @endif
                                    
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Status</label>
                        <div class="col-md-10">
                            <select name="status" class="form-control w-75" required>
                                <option value="">Select Menu Status</option>
                                <option value="Active" {{ $menuPageEdit->status == 'Active' ? 'selected' : ''}}>Active</option>
                                <option value="Inactive" {{ $menuPageEdit->status == 'Inactive' ? 'selected' : ''}}>Inactive</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->
                    <!-- discount status-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col-sm-6">
                     <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
                </div><!--col-->
                <div class="col-sm-6 text-right">
                    <button class="btn btn-info">submit</button>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
</form>
   
@endsection
