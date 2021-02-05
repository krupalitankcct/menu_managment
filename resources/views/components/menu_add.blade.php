@extends('menu::layouts.admin-app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @include('menu::messages')
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{__('package_lang::menu.custom.Menu_header')}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('menu.store') }}" class="form-horizontal" method="post" >
                            {{ csrf_field() }}
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Title</label>
                                        <div class="col-md-10">
                                            <input type="text" name="title" class="form-control" placeholder="Title" required autofocus="true"/>
                                        </div><!--col-->
                                    </div><!--form-group-->
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Menu Category</label>
                                        <div class="col-md-10">
                                           <select name="menu_category_id" class="form-control" required>
                                                <option value="">Select Menu Category </option>
                                               
                                                @foreach($menuCategories as $key => $menuCategorie)
                                                    <option value="{{$key}}">{{$menuCategorie}} </option>
                                                @endforeach
                                                
                                            </select>
                                        </div><!--col-->
                                    </div><!--form-group-->
                                </div><!--col-->
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-6">
                                     <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
                                </div><!--col-->
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-info">submit</button>
                                </div><!--col-->
                            </div><!--row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
