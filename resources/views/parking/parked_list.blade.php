@extends('layouts.app')
@section('page-title')
    {{__('Parked Vehicle')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Parked Vehicle')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')

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
                            @if( Gate::check('show parking'))
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

                                @if(Gate::check('show parking'))
                                    <td class="text-right">
                                        <div class="cart-action">
                                            @if(Gate::check('show parking') )
                                                <a class="text-warning" href="{{ route('parking.show',\Illuminate\Support\Facades\Crypt::encrypt($parking->id)) }}" data-bs-toggle="tooltip" data-bs-original-title="{{__('Details')}}"> <i data-feather="eye"></i></a>
                                            @endcan
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

