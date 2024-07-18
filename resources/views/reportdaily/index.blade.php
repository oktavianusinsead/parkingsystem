@extends('layouts.app')
@section('page-title')
    {{__('Parking Report Daily')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Report Daily')}}</a>
        </li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('reportdaily.index') }}" method="GET">
                
                    <div class="form-group  col-md-6">

            {{Form::label('entry_date',__('Start Date'),array('class'=>'form-label'))}}
            {{Form::date('entry_date',date('Y-m-d'),array('class'=>'form-control'))}}
        </div>
        <div class="form-group  col-md-6">
            {{Form::label('end_date',__('End Date'),array('class'=>'form-label'))}}
            {{Form::date('end_date',date('Y-m-d'),array('class'=>'form-control'))}}
        </div>
        <div class="modal-footer">
    <button class="btn btn-secondary" type="submit">Process</button>
    
</div>
</form>
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                       
<tr style="height: 16.0pt;">
<td style="height: 16.0pt;" height="21">No</td>
<td>No Kartu</td>
<td>Tanggal Masuk</td>
<td>Tanggal Keluar</td>
<td>Durasi</td>
<td>Cost</td>
<td>Payment By</td>
<td>Vehicle</td>
</tr>
</thead>
                        <tbody>
                        @foreach($results as $index => $result)
                       
                        <tr role="row" >
                        <td>{{ $index + 1 }}</td>
                       
<td align="right" style="height: 16.0pt;" height="21">{{$result->tiketno}}</td>
<td align="right">{{$result->datetransact}}</td>

<td align="right">{{$result->dateout}}</td>
<td align="right">{{format_duration($result->duration)}}</td>
<td align="right">{{number_format($result->cost)}}</td>
<td align="right">{{$result->paymentby}}</td>
<td align="right">{{$result->vehicleid}}</td>

</tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

