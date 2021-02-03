@extends('menu::app')
@section('content')
<div class="card menu-margin">
        <div class="card-body">
            <x-courier-menu-header message="Menu Item Management" url="{{route('menu.item.create',$id)}}"></x-courier-menu-header>
            @include('menu::messages')
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table data-table" id='menu-item'>
                            <thead>
                            <tr>
                                <th>
                                    Menu Title
                                </th>
                                <th >
                                   Menu Types
                                </th>
                                <th >
                                    Status
                                </th>
                                <th colspan="2">Actions</th>
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
                                        <a href="{{ route('menu.item.edit',$menuItem->id) }}"  class='btn btn-info '><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{{ route('menu.item.delete',$menuItem->id) }}"  class='btn btn-danger'><i class="glyphicon glyphicon-remove"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" align="center">No Record Found</td>
                                </tr>
                            @endif
                            <tbody>
                        </table>
                    </div>
                </div>
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
            <div class="col">
                 <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
            </div><!--col-->
        </div>

@endsection
