<!DOCTYPE html>
<html lang="en-US" ng-app="cargoRecords">
<head>
    <title>Cargos</title>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/bootstrap.min.js') ?>"></script>

    <!-- AngularJS Application Scripts -->
    <script src="<?= asset('app/app.js') ?>"></script>
    <script src="<?= asset('app/controllers/cargos.js') ?>"></script>


</head>
<body>
<h2>Administracion de Cargos</h2>
<div  ng-controller="cargoController">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right" style="padding-top:30px">
                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Agregar Cargo</button></th>
            </div>
        </div>
    </div>

    <!-- Table-to-load-the-data Part -->
    <table class="table table-bordered table-hover" style="margin-top:10px;">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Name del Cargo</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="cargo in cargos">
            <td>@{{ cargo.idcargo }}</td>
            <td>@{{ cargo.nombrecargo }}</td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', cargo.idcargo)">Editar</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(cargo.idcargo)">Eliminar</button>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- End of Table-to-load-the-data Part -->
    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmCargos" class="form-horizontal" novalidate="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group error">
                            <label for="inputEmail3" class="col-sm-3 control-label">ID Cargo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="idcargo" name="idcargo" placeholder="Codigo"
                                       ng-model="cargo.idcargo" ng-readonly="true">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Nombre del Cargo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombrecargo" name="nombrecargo" placeholder="Nombre Cargo"
                                       ng-model="cargo.nombrecargo" ng-required="true" ng-maxlength="16">
                                        <span class="help-inline"
                                              ng-show="frmCargos.nombrecargo.$invalid && frmCargos.nombrecargo.$touched">Nombre Cargo field is not valid</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, idcargo)" ng-disabled="frmCargos.$invalid">Guargar</button>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
