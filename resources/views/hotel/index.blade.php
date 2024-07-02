@extends('layouts.app')
@section('page-title')
    {{__('Hotel')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Hotel')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
@if(!Gate::check('manage hotel'))
<a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
   data-url="{{ route('hotel.create') }}"
   data-title="{{__('Create Hotel')}}"> <i class="ti-plus mr-5"></i>{{__('Create Compliment')}}</a>
@endif
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                        <tr>
                            <th>{{__('Room No')}}</th>
                            <th>{{__('Guest Name')}}</th>
                            <th>{{__('Plat No')}}</th>
                            <th>{{__('UID No')}}</th>
                            <th>{{__('Check In')}}</th>
                            <th>{{__('Check Out')}}</th>
                            <th>{{__('Status')}}</th>
                            <th class="text-right">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($hotels as $hotel)
                            <tr>
                                <td>{{ ucfirst($hotel->room_no) }} </td>
                               
                                <td> {{ ucfirst($hotel->guest_name)}}   </td>
                                <td> {{ ucfirst($hotel->plat_no)}}   </td>
                                <td> {{ ucfirst($hotel->uidno)}}   </td>
                                <td> {{ ucfirst($hotel->check_in)}}   </td>
                                <td> {{ ucfirst($hotel->check_out)}}   </td>
                                <td> {{ ucfirst($hotel->status)}}   </td>
                                
                                @if(Gate::check('edit gate') ||  Gate::check('delete gate'))
                                    <td class="text-right">
                                        <div class="cart-action">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['gate.destroy', $gate->id]]) !!}

                                            @if(Gate::check('edit gate') )
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" data-size="md" href="#"
                                                   data-url="{{ route('gate.edit',$floor->id) }}"
                                                   data-title="{{__('Edit Gate')}}"> <i data-feather="edit"></i></a>
                                            @endcan
                                            @if( Gate::check('delete gate'))
                                                <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Delete')}}" href="#"> <i
                                                        data-feather="trash-2"></i></a>
                                            @endcan
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

