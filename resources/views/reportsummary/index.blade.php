@extends('layouts.app')
@section('page-title')
    {{__('Parking Report Summary')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Report Summary')}}</a>
        </li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('report.summary') }}" method="GET">
                
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
<td class="xl66" style="height: 32.0pt; width: 65pt;" rowspan="2" width="87" height="42">No</td>
<td class="xl66" style="width: 65pt;" rowspan="2" width="87">Tanggal</td>
<td class="xl65" style="width: 130pt;" colspan="2" width="174">Mandiri</td>
<td class="xl65" style="width: 130pt;" colspan="2" width="174">BCA</td>
<td class="xl65" style="width: 130pt;" colspan="2" width="174">BNI</td>
<td class="xl65" style="width: 130pt;" colspan="2" width="174">BRI</td>
</tr>
<tr style="height: 16.0pt;">
<td style="height: 16.0pt;" height="21">Mobil</td>
<td>Motor</td>
<td>Mobil</td>
<td>Motor</td>
<td>Mobil</td>
<td>Motor</td>
<td>Mobil</td>
<td>Motor</td>
</tr>
</thead>
                        <tbody>
                        @foreach($results as $index => $result)
                       
                        <tr role="row" >
                        <td>{{ $index + 1 }}</td>
                        <td>{{$result->date}}</td>
<td align="right" style="height: 16.0pt;" height="21">{{number_format($result->Mandiri_Mobil)}}</td>
<td align="right">{{number_format($result->Mandiri_Motor)}}</td>

<td align="right">{{number_format($result->BCA_Mobil)}}</td>
<td align="right">{{number_format($result->BCA_Motor)}}</td>
<td align="right">{{number_format($result->BNI_Mobil)}}</td>
<td align="right">{{number_format($result->BNI_Motor)}}</td>
<td align="right">{{number_format($result->BRI_Mobil)}}</td>
<td align="right">{{number_format($result->BRI_Motor)}}</td>
</tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

