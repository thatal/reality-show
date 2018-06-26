@extends('admin/layouts/ace')
@section('title')
Edit Contestant
@stop
@section('content')
        <div class="page-header">
            <h1>
                Dashboard
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Contestant
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
                                <a data-toggle="tab" href="#home4" aria-expanded="true"><i class="orange ace-icon fa fa-pencil-square-o bigger-120"></i> Edit</a>
                            </li>

                           {{--  <li class="">
                                <a data-toggle="tab" href="#profile4" aria-expanded="false"><i class="green ace-icon fa fa-eye bigger-120"></i> View</a>
                            </li> --}}
                        </ul>

                        <div class="tab-content">
                            <div id="home4" class="tab-pane active">
                                <h3>Update Contestant Details</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!!Form::open([ 'class' => "form-horizontal form-validator"])!!}
                                            <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::text('name',$singleContestant->name, ['class' => 'form-control', 'data-error' => 'Contestant name is required.','placeholder' => 'Contestant Name', 'required' => true])!!}
                                                    <div class="help-block with-errors">@if($errors->has('name')) {{$errors->first('name')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('code') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('code', 'Code <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::text('code',$singleContestant->code, ['class' => 'form-control', 'data-error' => 'Code is required.','placeholder' => 'Contestant Code', 'required' => true, 'readonly' => true])!!}
                                                    <div class="help-block with-errors">@if($errors->has('code')) {{$errors->first('code')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('mobile', 'Mobile', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::text('mobile',$singleContestant->mobile, ['class' => 'form-control', 'placeholder' => 'Mobile number','maxlength' => '10', 'minlength' => '10', 'size' => 10])!!}
                                                    <div class="help-block with-errors">@if($errors->has('mobile')) {{$errors->first('mobile')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('email', 'Email', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::email('email',$singleContestant->email, ['class' => 'form-control', 'data-error' => 'Email is required.','placeholder' => 'Email'])!!}
                                                    <div class="help-block with-errors">@if($errors->has('email')) {{$errors->first('email')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('gender') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('gender', 'gender <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::select('gender',['male' =>'Male','female' =>'Female'],$singleContestant->gender,['class' => 'form-control', 'data-error' => 'Please Select a gender.'])!!}
                                                    <div class="help-block with-errors">@if($errors->has('gender')) {{$errors->first('gender')}} @endif</div>
                                                </div>
                                            </div>

                                            <div class="form-group row {{ $errors->has('age') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('age', 'Age', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::number('age',$singleContestant->age, ['class' => 'form-control', 'data-error' => 'age is required.','placeholder' => 'age'])!!}
                                                    <div class="help-block with-errors">@if($errors->has('age')) {{$errors->first('age')}} @endif</div>
                                                </div>
                                            </div>

                                            <div class="form-group row {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('facebook', 'Facebook Link', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::url('facebook',$singleContestant->facebook, ['class' => 'form-control', 'placeholder' => 'Facebook Link'])!!}
                                                    <div class="help-block with-errors">@if($errors->has('facebook')) {{$errors->first('facebook')}} @endif</div>
                                                </div>
                                            </div>

                                            <div class="form-group row {{ $errors->has('instagram') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('instagram', 'Instagram Link', ['class' => 'control-label col-sm-3']))!!}
                                                <div class="col-sm-9">
                                                    {!!Form::url('instagram',$singleContestant->instagram, ['class' => 'form-control', 'placeholder' => 'Instagram Link'])!!}
                                                    <div class="help-block with-errors">@if($errors->has('instagram')) {{$errors->first('instagram')}} @endif</div>
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

                            {{-- <div id="profile4" class="tab-pane">
                                <h3>Contestant Details</h3>
                                <hr>
                                <table class="table table-bordered table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Email</th>
                                            <th>Facebook</th>
                                            <th>Intagram</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($all_contestant))
                                            @foreach ($all_contestant as $key => $value)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td>{{$value->code}}</td>
                                                    <td>{{$value->email}}</td>
                                                    <td>{{$value->facebook}}</td>
                                                    <td>{{$value->instagram}}</td>
                                                    <td>{{$value->gender}}</td>
                                                    <td>{{$value->age}}</td>
                                                    <td><label class="label label-{{$value->status == 'active' ? 'success' : 'inverse'}}">{{str_replace('_', ' ', $value->status)}}</label></td>
                                                    <td><a href="{{route('admin.rounds.activate', Crypt::encrypt($value->id))}}" class="btn btn-info btn-xs {{$value->status == 'active' ? 'disabled' : ' '}}" onClick="return confirm('Are you sure ? other round will be deactivated.')"><i class="glyphicon glyphicon-refresh"></i> Change Status</a></td>
                                                    <td><a href="{{route('admin.contestant.edit', Crypt::encrypt($value->id))}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6" colspan="bg-danger">No Records Found</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div> --}}
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