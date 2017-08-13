@section('content')
    <div class="row">
        {{ Form::open(['route' => 'save-new-client', 'method' => 'post', 'class' => 'form-horizontal col-xs-12 col-md-10']) }}
        <input type="hidden" name="id" value="{{(!empty($data->id)? $data->id: "")}}">
        <div class="form-group">
            <label class="col-sm-3 control-label">Наименование юридического лица</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="name_legal_entity" value="{{(!empty($data->name_legal_entity)?$data->name_legal_entity:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Юридический адрес (адрес места нахождения)</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  placeholder="Индекс, город, ул., д., оф." name="legal_address"  value="{{(!empty($data->legal_address)?$data->legal_address:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Фактический адрес (адрес места нахождения)</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  placeholder="Индекс, город, ул., д., оф." name="actual_address" value="{{(!empty($data->actual_address)?$data->actual_address:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ОГРН</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="ogrn" value="{{(!empty($data->ogrn)?$data->ogrn:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ИНН</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="inn" value="{{(!empty($data->inn)?$data->inn:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">КПП</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="kpp" value="{{(!empty($data->kpp)?$data->kpp:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ОКПО</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="okpo" value="{{(!empty($data->okpo)?$data->okpo:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ОКВЭД</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="okved" value="{{(!empty($data->okved)?$data->okved:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Расчетный счет</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="payment_account" value="{{(!empty($data->payment_account)?$data->payment_account:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Корреспондентский счет</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="correspondent_account" value="{{(!empty($data->correspondent_account)?$data->correspondent_account:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Банк</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="bank" value="{{(!empty($data->bank)?$data->bank:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">БИК</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="bik" value="{{(!empty($data->bik)?$data->bik:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Генеральный директор, на основании Устава</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="general_director" value="{{(!empty($data->general_director)?$data->general_director:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Менеджер</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="manager" value="{{(!empty($data->manager)?$data->manager:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Телефон</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="phone" value="{{(!empty($data->phone)?$data->phone:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Договор №</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="contract_number" value="{{(!empty($data->contract_number)?$data->contract_number:'')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Дата</label>
            <div class="col-sm-9">
                <input type="text" class="form-control datetimepicker-main"  name="date" value="{{(!empty($data->date)?$data->date:'')}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-9">
                <button type="submit" class="btn btn-primary">Принять</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker-main').datetimepicker({
                format: 'DD.MM.YYYY',
                locale: 'ru'
            });
        });
    </script>

@stop