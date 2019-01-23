@extends('backend._partial.dashboard')

@section('title','Edit Compliance')
@section('PageHead','Edit Compliance')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('compliances.index') }}">All Compliance</a>
@endsection

@section('content')

    <div class="col-md-11">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('compliances.update', $compliance) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div class="div-count">
                        @foreach(json_decode($compliance->compliance_image) as $image)
                            <div class="col-md-12">
                                <img class="small-img img-thumbnail pull-left" style="" src="{{url($image)}}" alt="">
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">

                        <div class="input-group control-group increment">
                            <input type="file" name="compliance_image[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success create_btn" type="button"><i class="glyphicon glyphicon-plus"></i>+</button>
                            </div>
                            @if($errors->has('compliance_image'))
                                <strong class="text-danger">{{ $errors->first('compliance_image') }}</strong>
                            @endif

                        </div>

                        {{-- extra input field --}}
                        <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px;">
                                <input type="file" name="compliance_image[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger remove_btn" type="button"><i class="glyphicon glyphicon-remove"></i> - </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    @if ($compliance->pdf_document!=null)
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="{{url($compliance->pdf_document)}}" height="300" allowfullscreen></iframe>
                        </div>
                    @endif
                    <div class="form-group">

                        <label class="control-label">PDF Document</label>
                        <input class="form-control" type="file" name="pdf_document">
                        @if($errors->has('pdf_document'))
                            <strong class="text-danger">{{ $errors->first('pdf_document') }}</strong>
                        @endif
                        <div class="text-primary">Note: If you want to upload compliance as pdf then select pdf from here.</div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Compliance Name</label>
                        <input type="text" value="{{$compliance->title}}" class="form-control" name="title" placeholder="Enter Compliance Name">
                        @if($errors->has('title'))
                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Homage / Certificate Name</label>
                        <input type="text" value="{{$compliance->homage}}" class="form-control" name="homage" placeholder="Enter Homage / Certificate Name">
                        @if($errors->has('homage'))
                            <strong class="text-danger">{{ $errors->first('homage') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="trumbowyg-demo" cols="30" rows="10">{{$compliance->description}}</textarea>
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
