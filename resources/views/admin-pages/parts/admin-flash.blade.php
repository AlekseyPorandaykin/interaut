@if(Session::has("flash_message"))
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            {!! Session::pull("flash_message") !!}
        </div>
    </div>
</div>
@endif
@if ($errors->any())
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                {{ $error }}
            </div>
            @endforeach
        </div>
        <? Session::forget("errors"); ?>
    </div>
@endif