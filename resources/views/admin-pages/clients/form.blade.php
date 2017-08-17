@section('content')
    <ul id="tabs-panel-client" class="nav nav-tabs">
        <li class="@if(!Session::has("client-message-error")) active @endif"><a href="#home" data-toggle="tab">Реквизиты клиента</a></li>
        <li class="@if(Session::get("client-message-error") == 'profile' ) active  @endif"><a href="#profile" data-toggle="tab">Профиль</a></li>
        <li class="@if(Session::get("client-message-error") == 'tariff' ) active  @endif"><a href="#tariff" data-toggle="tab">Тарифы</a></li>
        <li class="@if(Session::get("client-message-error") == 'balans' ) active  @endif"><a href="#balans" data-toggle="tab">Баланс</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane @if(!Session::has("client-message-error")) active @endif" id="home">
            <div class="row">
                <br>
                {{ Form::open(['route' => 'save-new-client', 'method' => 'post', 'class' => 'form-horizontal col-xs-12 col-md-10']) }}
                <input type="hidden" name="id" value="{{(!empty($data["client"]->id)? $data["client"]->id: "")}}">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Наименование юридического лица</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="name_legal_entity" value="{{(!empty($data["client"]->name_legal_entity)?$data["client"]->name_legal_entity:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Юридический адрес (адрес места нахождения)</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  placeholder="Индекс, город, ул., д., оф." name="legal_address"  value="{{(!empty($data["client"]->legal_address)?$data["client"]->legal_address:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Фактический адрес (адрес места нахождения)</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  placeholder="Индекс, город, ул., д., оф." name="actual_address" value="{{(!empty($data["client"]->actual_address)?$data["client"]->actual_address:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ОГРН</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="ogrn" value="{{(!empty($data["client"]->ogrn)?$data["client"]->ogrn:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ИНН</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="inn" value="{{(!empty($data["client"]->inn)?$data["client"]->inn:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">КПП</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="kpp" value="{{(!empty($data["client"]->kpp)?$data["client"]->kpp:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ОКПО</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="okpo" value="{{(!empty($data["client"]->okpo)?$data["client"]->okpo:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ОКВЭД</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="okved" value="{{(!empty($data["client"]->okved)?$data["client"]->okved:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Расчетный счет</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="payment_account" value="{{(!empty($data["client"]->payment_account)?$data["client"]->payment_account:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Корреспондентский счет</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="correspondent_account" value="{{(!empty($data["client"]->correspondent_account)?$data["client"]->correspondent_account:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Банк</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="bank" value="{{(!empty($data["client"]->bank)?$data["client"]->bank:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">БИК</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="bik" value="{{(!empty($data["client"]->bik)?$data["client"]->bik:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Генеральный директор, на основании Устава</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="general_director" value="{{(!empty($data["client"]->general_director)?$data["client"]->general_director:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Менеджер</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="manager" value="{{(!empty($data["client"]->manager)?$data["client"]->manager:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Телефон</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="phone" value="{{(!empty($data["client"]->phone)?$data["client"]->phone:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Договор №</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control"  name="contract_number" value="{{(!empty($data["client"]->contract_number)?$data["client"]->contract_number:'')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Дата</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control datetimepicker-main"  name="date" value="{{(!empty($data["client"]->date)?$data["client"]->date:'')}}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <button type="submit" class="btn btn-primary" name="data" value="requisites">Сохранить</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="tab-pane @if(Session::get("client-message-error") == 'profile' ) active  @endif" id="profile">
            <br>

            {{ Form::open(['route' => 'save-new-client', 'method' => 'post', 'class' => 'form-horizontal col-xs-12 col-md-10']) }}
            <input type="hidden" name="id" value="{{(!empty($data["client"]->id)? $data["client"]->id: "")}}">
            <div class="form-group">
                <label class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Логин" name="name"  value="{{(!empty($data["user"]->name)? $data["user"]->name: "")}}">
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" placeholder="Email" name="email"  value="{{(!empty($data["user"]->email)? $data["user"]->email: "")}}">
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  placeholder="Пароль" name="password">
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="data" value="auth">Сохранить</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <div class="tab-pane @if(Session::get("client-message-error") == 'tariff' ) active  @endif" id="tariff">
            <br>
            {{ Form::open(['route' => 'save-new-client', 'method' => 'post', 'class' => 'form-horizontal col-xs-12 col-md-10']) }}
            <input type="hidden" name="id" value="{{(!empty($data["client"]->id)? $data["client"]->id: "")}}">

            <div class="form-group">
                <label class="col-sm-2 control-label">Загрузка тарифа</label>
                <div class="col-sm-10">
                    <input type="file"   name="file_tariff" >
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="data" value="tariff">Сохранить</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <div class="tab-pane @if(Session::get("client-message-error") == 'balans' ) active  @endif" id="balans">
            <br>
            баланс
        </div>
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

        $('#tabs-panel-client a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>

@stop