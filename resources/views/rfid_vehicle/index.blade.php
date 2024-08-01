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
                           
                            <th>{{__('Vehicle Type')}}</th>
                            
                            <th>{{__('Name')}}</th>
                            <th>{{__('Company')}}</th>
                            <th>{{__('Start Date')}}</th>
                            <th>{{__('End Date')}}</th>
                            <th>{{__('Status')}}</th>
                            @if(Gate::check('edit rfid vehicle') ||  Gate::check('delete rfid vehicle'))
                                <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vehicles as $vehicle)

                            <tr role="row">
                                <td> <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" data-size="lg" href="#"
                                                   data-url="{{ route('rfid-vehicle.edit',$vehicle->id) }}"
                                                   data-title="{{__('Edit RFID Vehicle')}}">{{$vehicle->rfid_no}}</a></td>
                                <td>{{$vehicle->vehicle_no}}</td>
                                <td> {{ !empty($vehicle->types)?$vehicle->types->title:'-' }}   </td>
                                <td>{{ $vehicle->name }} </td>
                                <td>{{ $vehicle->company_name }} </td>
                                <td>{{ $vehicle->start_date }} </td>
                                <td>{{ $vehicle->end_date }} </td>
                                <td>{{ $vehicle->status }} </td>
                                   <td class="text-right">
                                   
                                        <div class="cart-action">
                                           
                                            
                                        <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" data-size="lg" href="#"
                                                   data-url="{{ route('rfid-vehicle.edit',$vehicle->id) }}"
                                                   data-title="{{__('Edit RFID Vehicle')}}"> Edit</a>  
                                            
                                          
                                        </div>
                                    </td>
                               
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

