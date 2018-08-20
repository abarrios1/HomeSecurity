@extends('layouts.main')

@section('body')
<style>
    .centered {
        margin: 0 auto;
        width: 90%;
        padding-top: 25px;
    }
    
    .pieGraph {
        float: left;
        display:block;
    }
    
    
</style>

<div class="centered">
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @endif
    <!-- Posts list -->
    @if(!empty($invent))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                
                <div class="pull-right">
                    <a class="btn btn-success" href="#"> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table sortable">
                    <!-- Table Headings -->
                    <thead>
                        <th>UID</th>
                        <th>MAC Address</th>
                        <th>Manufacturer</th>
                        <th width="15%">Issued</th>
                        <th class="text-center" width="20%">Action</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach($invent as $inventory)
                        <tr>
                            <td class="table-text">
                                <div>{{$inventory->uid}}</div>
                            </td>
                            <td class="table-text">
                                <div> {{$inventory->mac}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$inventory->manufacturer}}</div>
                            </td>
                                <td class="table-text">
                                <div>{{$inventory->dateIssued}}</div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('Home.details', $inventory->uid) }}" class="btn btn-success">Details</a>
                                <a href="{{ route('Home.edit', $inventory->uid)}}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('Home.delete', $inventory->uid)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $invent->render() !!}
            </div>
            
                <div class="pieGraph" style="height: 300px; width: 50%;"></div>
                <div class="lineGraph" style="height: 300px; width: 50%;"></div>
            
            </div>
        </div>
    @endif
    </div>
</div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
        window.onload = function() {
        var data = {!! json_encode($manufacts) !!};
        var pie = {
            title: {
                text: "Type of Manufacturers"
            },
            data: [{
                    type: "pie",
                    startAngle: 45,
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabel: "{label} ({y})",
                    yValueFormatString:"#,##0.#"%"",
                    dataPoints: [
                        { label: "LLC", y: data['llc'] },
                        { label: "LTD", y: data['ltd'] },
                        { label: "INC", y: data['inc'] },
                        { label: "PLC", y: data['plc'] },
                        { label: "Family", y: data['family'] },
                        { label: "Group", y: data['group'] },
                        { label: "Partnership", y: data['partnership'] }
                    ]
            }]
        };
        
        var line = {

        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Simple Line Chart"
        },
        axisY:{
            includeZero: false
        },
        data: [{        
            type: "line",       
            dataPoints: [
                { y: 450 },
                { y: 414},
                { y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
                { y: 460 },
                { y: 450 },
                { y: 500 },
                { y: 480 },
                { y: 480 },
                { y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
                { y: 500 },
                { y: 480 },
                { y: 510 }
            ]
        }]
        };

        $(".pieGraph").CanvasJSChart(pie);
        $('.lineGraph').CanvasJSChart(line);
        }

    </script>
@endsection