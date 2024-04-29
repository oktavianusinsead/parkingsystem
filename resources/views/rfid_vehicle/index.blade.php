@extends('layouts.app')
@section('page-title')
    {{__('RFID Vehicle')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('RFID Vehicle')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
    @if(Gate::check('create rfid vehicle'))
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="lg"
           data-url="{{ route('rfid-vehicle.create') }}"
           data-title="{{__('Create RFID Vehicle')}}"> <i class="ti-plus mr-5"></i>{{__('Create RFID Vehicle')}}</a>
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
                            <th>{{__('RFID No')}}</th>
                            <th>{{__('Vehicle No')}}</th>
                            <th>{{__('Parking Zone')}}</th>
                            <th>{{__('Vehicle Type')}}</th>
                            <th>{{__('Parking Floor')}}</th>
                            <th>{{__('Slot')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Phone Number')}}</th>
                            @if(Gate::check('edit rfid vehicle') ||  Gate::check('delete rfid vehicle'))
                                <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vehicles as $vehicle)

                            <tr role="row">
                                <td>{{$vehicle->rfid_no}}</td>
                                <td>{{$vehicle->vehicle_no}}</td>
                                <td> {{ !empty($vehicle->zones)?$vehicle->zones->zone_name:'-' }}   </td>
                                <td> {{ !empty($vehicle->types)?$vehicle->types->title:'-' }}   </td>
                                <td> {{ !empty($vehicle->floors)?$vehicle->floors->title:'-' }}   </td>
                                <td> {{ !empty($vehicle->slots)?$vehicle->slots->title:'-' }}   </td>
                                <td>{{ $vehicle->name }} </td>
                                <td>{{ $vehicle->phone_number }} </td>
                                @if(Gate::check('edit rfid vehicle') ||  Gate::check('delete rfid vehicle'))
                                    <td class="text-right">
                                        <div class="cart-action">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['rfid-vehicle.destroy', $vehicle->id]]) !!}

                                            @if(Gate::check('edit rfid vehicle') )
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" data-size="lg" href="#"
                                                   data-url="{{ route('rfid-vehicle.edit',$vehicle->id) }}"
                                                   data-title="{{__('Edit RFID Vehicle')}}"> <i data-feather="edit"></i></a>
                                            @endcan
                                            @if( Gate::check('delete rfid vehicle'))
                                                <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Detete')}}" href="#"> <i
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

