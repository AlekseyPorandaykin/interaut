@extends('admin-pages.index')
@section('title', 'Создать клиента')

@section('content')
    <div class="row">
        {{ Form::open(['route' => 'save-new-client', 'method' => 'post', 'class' => 'form-horizontal col-xs-12 col-md-10']) }}
        <div class="form-group">
            <label class="col-sm-3 control-label">Наименование юридического лица</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="name_legal_entity">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Юридический адрес (адрес места нахождения)</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  placeholder="Индекс, город, ул., д., оф." name="legal_address">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Фактический адрес (адрес места нахождения)</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  placeholder="Индекс, город, ул., д., оф." name="actual_address">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ОГРН</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="ogrn">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ИНН</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="inn">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">КПП</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="kpp">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ОКПО</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="okpo">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ОКВЭД</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="okved">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Расчетный счет</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="payment_account">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Корреспондентский счет</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="correspondent_account">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Банк</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="bank">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">БИК</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="bik">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Генеральный директор, на основании Устава</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="general_director">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Менеджер</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="manager">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Телефон</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="phone">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Договор №</label>
            <div class="col-sm-9">
                <input type="text" required class="form-control"  name="contract_number">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Дата</label>
            <div class="col-sm-9">
                <input type="text" class="form-control datetimepicker-main"  name="date">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-9">
                <button type="submit" class="btn btn-success">Создать</button>
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