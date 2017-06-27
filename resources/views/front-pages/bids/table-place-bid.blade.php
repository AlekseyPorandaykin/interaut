<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Место № {{$number}}</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Упаковка</label>
            <div class="col-sm-10">
                <select class="form-control" name="packing_type[{{$number}}]">
                    <option value="1">на паллете</option>
                    <option value="2">мешок, короб</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Вес (кг)</label>
            <div class="col-sm-10">
                <input type="text" name="weight[{{$number}}]" class="form-control" placeholder="0" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Объем (м3)</label>
            <div class="col-sm-10">
                <input type="text" name="scope[{{$number}}]" class="form-control" placeholder="0" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Тариф</label>
            <div class="col-sm-10">
                <input type="text" name="rate[{{$number}}]" class="form-control"  placeholder="0" value="1" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Оценочная стоимость</label>
            <div class="col-sm-10">
                <input type="text" name="assessed_value[{{$number}}]" class="form-control"  placeholder="0" required>
            </div>
        </div>
        <label class="col-sm-2 control-label">Удалить место</label>
        <div class=" col-sm-10">
            <a type="button" class="btn btn-danger" onclick="deletePlaceBid(this)"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
    </div>
</div>