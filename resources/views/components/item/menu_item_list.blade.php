@extends('menu::layouts.admin-app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @include('menu::messages')
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>{{__('package_lang::menu.custom.Menu_item_header')}}

                        <div class="m-portlet__head-tools float-right">
                            <a class="btn btn-success" routerlink="add" routerlinkactive="active" style="margin-right:10px;" ng-reflect-router-link="add" ng-reflect-router-link-active="active" href="{{route('menu.item.create',$id)}}">
                                <span><i class="cil-user-plus"></i><span>{{__('package_lang::menu.custom.menu_item_add')}}</span></span>
                            </a>
                        </div>
                    </div>
                    <br>
                    <form class="form-inline" action="{{route('menu.item.index',$id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" id="search_menu_title" name="search_menu_title" value="{{ Request::get('search_menu_title') }}" placeholder="{{__('package_lang::menu.menu_list.menu_title')}}" class="form-control" >
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                          <select name="search_status" id="search_status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>  
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <button type="submit" id="submit" class="btn btn-success">Search</button>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <a href="{{ route('menu.item.index',['reset'=>'reset','id' =>$id]) }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>{{__('package_lang::menu.menu_list.menu_title')}}</th>
                                <th>{{__('package_lang::menu.menu_list.menu_type')}}</th>
                                <th>{{__('package_lang::menu.custom.status')}}</th>
                                <th>Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (count($menuItems) > 0)
                                @foreach($menuItems as $menuItem)
                                    <tr>
                                        <td class="text-transform">{{ $menuItem->menu_title }}</td>
                                        <td>{{ $menuItem->menu_types }}</td>
                                        <td>
                                            @if($menuItem->status == 'Active')
                                                <a href="{{ route('menu.inactive',$menuItem->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click to Inactive">
                                                Active
                                                </a>
                                            @else
                                                <a href="{{ route('menu.active',$menuItem->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Click to Active">
                                                 InActive   
                                                </a>
                                            @endif
                                        </td>
                                        <td class="btn-td">
                                            <div class='btn-group'>
                                            <a href="{{ route('menu.item.edit',$menuItem->id) }}"  class='btn btn-info '><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                            <a href="{{ route('menu.item.delete',$menuItem->id) }}"  class='btn btn-danger'><i class="glyphicon glyphicon-remove"></i>Delete</a>
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
                    <div class="row">
                        <div class="col-7">
                            <div class="float-left">
                                @if ($total_records > 0)
                                    {{$total_records}} Menu Total
                                @endif
                            </div>
                        </div><!--col-->
                        <div class="col-5">
                            <div class="float-right">
                                {{ $menuItems->links() }}
                            </div>
                        </div><!--col-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
