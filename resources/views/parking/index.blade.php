@extends('layouts.app')
@section('page-title')
    {{__('Parking')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Parking')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
    @if(Gate::check('create parking'))
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="xl"
           data-url="{{ route('parking.create') }}"
           data-title="{{__('Create Parking')}}"> <i class="ti-plus mr-5"></i>{{__('Create Parking')}}</a>
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
                            <th>{{__('ID')}}</th>
                            <th>{{__('Zone')}}</th>
                            <th>{{__('Type')}}</th>
                            <th>{{__('Slot')}}</th>
                            <th>{{__('Vehicle No')}}</th>
                            <th>{{__('Entry')}}</th>
                            <th>{{__('Exit')}}</th>
                            <th>{{__('Payment Status')}}</th>
                            <th>{{__('Status')}}</th>
                            @if(Gate::check('edit parking') ||  Gate::check('delete parking') ||  Gate::check('show parking'))
                                <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($parkings as $parking)

                            <tr role="row">
                                <td> {{parkingPrefix().$parking->parking_id}}</td>
                                <td> {{ !empty($parking->zones)?$parking->zones->zone_name:'-' }}   </td>
                                <td> {{ !empty($parking->types)?$parking->types->title:'-' }}   </td>
                                <td> {{ !empty($parking->slots)?$parking->slots->title:'-' }}   </td>
                                <td>{{$parking->vehicle_number}}</td>
                                <td>
                                    {{ dateFormat($parking->entry_date) }} <br>
                                    {{ timeFormat($parking->entry_time) }}

                                </td>
                                <td>
                                    @if(!empty($parking->exit_date))
                                        {{ dateFormat($parking->exit_date) }} <br>
                                        {{ timeFormat($parking->exit_time) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($parking->payment_status==0)
                                        <span class="badge badge-danger">{{\App\Models\Parking::$paymentStatus[$parking->payment_status]}}</span>
                                    @else
                                        <span class="badge badge-success">{{\App\Models\Parking::$paymentStatus[$parking->payment_status]}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($parking->status==0)
                                        <span class="badge badge-danger">{{\App\Models\Parking::$status[$parking->status]}}</span>
                                    @else
                                        <span class="badge badge-success">{{\App\Models\Parking::$status[$parking->status]}}</span>
                                    @endif
                                </td>
                                @if(Gate::check('edit parking') ||  Gate::check('delete parking') ||  Gate::check('show parking'))
                                    <td class="text-right">
                                        <div class="cart-action">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['parking.destroy', $parking->id]]) !!}
                                            @if(Gate::check('show parking') )
                                                <a class="text-warning" href="{{ route('parking.show',\Illuminate\Support\Facades\Crypt::encrypt($parking->id)) }}" data-bs-toggle="tooltip" data-bs-original-title="{{__('Details')}}"> <i data-feather="eye"></i></a>
                                            @endcan
                                            @if(Gate::check('edit parking') )
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" data-size="lg" href="#"
                                                   data-url="{{ route('parking.edit',$parking->id) }}"
                                                   data-title="{{__('Edit Parking')}}"> <i data-feather="edit"></i></a>
                                            @endcan
                                            @if( Gate::check('delete parking'))
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

