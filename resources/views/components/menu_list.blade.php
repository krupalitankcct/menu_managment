@extends('menu::layouts.admin-app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @include('menu::messages')
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>{{__('package_lang::menu.custom.Menu_header')}}

                        <div class="m-portlet__head-tools float-right">
                            <a class="btn btn-success" routerlink="add" routerlinkactive="active" style="margin-right:10px;" ng-reflect-router-link="add" ng-reflect-router-link-active="active" href="{{route('menu.create')}}">
                                <span><i class="cil-user-plus"></i><span>{{__('package_lang::menu.custom.menu_add')}}</span></span>
                            </a>
                        </div>
                    </div>
                    <br>
                    <form class="form-inline" action="{{route('menu.menu_list')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" id="search_menu_title" name="search_menu_title" value="{{ Request::get('search_menu_title') }}" placeholder="{{__('package_lang::menu.menu_list.menu_title')}}" class="form-control" >
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <button type="submit" id="submit" class="btn btn-success">Search</button>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <a href="{{ route('menu.menu_list',['reset'=>'reset']) }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>{{__('package_lang::menu.custom.title')}}</th>
                                <th>{{__('package_lang::menu.custom.menu_category_name')}}</th>
                                <th>{{__('package_lang::menu.custom.status')}}</th>
                                <th>Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($menus) > 0)
                                @foreach($menus as $menu)
                                    <tr>
                                        <td class="text-transform">{{ $menu->title }}</td>
                                        <td>{{ $menu->menuCategory->name }}</td>
                                        <td>
                                            @if($menu->status == 'Active')
                                                <a href="{{ route('menu.menuInactive',$menu->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click to Inactive">
                                                Active
                                                </a>
                                            @else
                                                <a href="{{ route('menu.menuActive',$menu->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Click to Active">
                                                 InActive   
                                                </a>
                                            @endif</td>
                                        <td class="btn-td">
                                            <div class='btn-group'>
                                            <a href="{{ route('menu.edit',$menu->id) }}"  class='btn btn-info '><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                            <a href="{{ route('menu.item.index',$menu) }}" data-toggle="tooltip" data-placement="top" title="Menu Items" class="btn btn-success">
                                               Menu Items
                                            </a>
                                            <a href="{{ route('menu.delete',$menu->id) }}"  class='btn btn-danger'><i class="glyphicon glyphicon-remove"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="100%" align="center">{{__('package_lang::menu.custom.no_record')}}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


