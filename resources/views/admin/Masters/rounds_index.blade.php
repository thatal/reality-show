@extends('admin/layouts/ace')
@section('content')
        <div class="page-header">
            <h1>
                Dashboard
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Rounds
                </small>
            </h1>
        </div>
        @include('admin/include/alert')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                            <li class="active">
                                <a data-toggle="tab" href="#home4" aria-expanded="true"><i class="orange ace-icon fa fa-pencil-square-o bigger-120"></i> Create</a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#profile4" aria-expanded="false"><i class="green ace-icon fa fa-eye bigger-120"></i> View</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home4" class="tab-pane active">
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!!Form::open(['url' => route('admin.rounds.save'), 'class' => "form-horizontal form-validator"])!!}
                                            <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('name', 'Round Name <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::text('name',null, ['class' => 'form-control', 'data-error' => 'Round name is required.','placeholder' => 'Round Name','required' => true])!!}
                                                    <div class="help-block with-errors">@if($errors->has('name')) {{$errors->first('name')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('vote_open') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('vote_open', 'Vote Opening Date Time <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::text('vote_open',null, ['class' => 'form-control datetimepicker', 'data-error' => 'Vote Opening DateTime is required.','placeholder' => 'Vote Opening date', 'required' => true])!!}
                                                    <div class="help-block with-errors">@if($errors->has('vote_open')) {{$errors->first('vote_open')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('vote_close') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('vote_close', 'Vote Opening Date Time <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::text('vote_close',null, ['class' => 'form-control datetimepicker', 'data-error' => 'Vote Closing DateTime is required.','placeholder' => 'Vote Closing date', 'required' => true])!!}
                                                    <div class="help-block with-errors">@if($errors->has('vote_close')) {{$errors->first('vote_close')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('status') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('status', 'Status <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::select('status',['active' =>'Active','not_active' =>'Not Active'],'not_active',['class' => 'form-control', 'data-error' => 'Please Select one status.', 'required' => true])!!}
                                                    <div class="help-block with-errors">@if($errors->has('status')) {{$errors->first('status')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-offset-3">
                                                    {!!Form::button('<i class="fa fa-send"></i> Submit', [
                                                        'type' => 'submit',
                                                        'class'=> 'btn btn-success btn-sm',
                                                    ]);!!}
                                                </div>
                                            </div>
                                        {!!Form::close()!!}
                                    </div>
                                </div>
                            </div>

                            <div id="profile4" class="tab-pane">
                                <h3>Rounds Details</h3>
                                <hr>
                                <table class="table table-bordered table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Vote Opening Date time</th>
                                            <th>Vote Closing Date time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (sizeof($all_rounds))
                                            @foreach ($all_rounds as $key => $value)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td><label class="label label-{{$value->status == 'active' ? 'success' : 'inverse'}}">{{str_replace('_', ' ', $value->status)}}</label></td>
                                                    <td>{{date('Y-m-d h:i:s a', strtotime($value->vote_open))}}</td>
                                                    <td>{{date('Y-m-d h:i:s a', strtotime($value->vote_close))}}</td>
                                                    <td><a href="{{route('admin.rounds.activate', Crypt::encrypt($value->id))}}" class="btn btn-info btn-xs {{$value->status == 'active' ? 'disabled' : ' '}}" onClick="return confirm('Are you sure ? other round will be deactivated.')"><i class="glyphicon glyphicon-refresh"></i> Change Status</a></td>
                                                    
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6" colspan="bg-danger">No Records Found</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
        <div class="modal fade" id="editRound">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Update Round</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
@stop
@section('js_page')
<script type="text/javascript">
    $(document).ready(function(){
        console.log("Ready");
    });
    EditConstentant = function(Obj){
        $thisObj = $(Obj);
        var constentant = $thisObj.attr('sun-data-id');
        console.log(constentant);
    }
</script>
    
@stop