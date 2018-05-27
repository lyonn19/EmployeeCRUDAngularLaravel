app.controller('cargoController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + 'cargos')
        .success(function(response) {
            console.log(response);
            $scope.cargos = response;
        });

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Adicionar Nuevo Cargo";
                $scope.idcargo = id;

                $http.get(API_URL + 'cargoseq' )
                    .success(function(response){
                        console.log(response);
                        $scope.cargo = { idcargo:response };
                    });
                break;
            case 'edit':
                $scope.form_title = "Detalle de Cargo";
                $scope.idcargo = id;
                $http.get(API_URL + 'cargos/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.cargo = response;

                    });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + 'cargos';

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.cargo),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'cargos/' + id
            }).
                success(function(data) {
                    console.log(data);
                    location.reload();
                }).
                error(function(data) {
                    console.log(data);
                    alert('Unable to delete');
                });
        } else {
            return false;
        }
    }
});
