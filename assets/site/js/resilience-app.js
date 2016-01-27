var smgapp = angular.module('smg-app', []);
smgapp.controller('add-depts', function($scope){
    $scope.departments = [];
    $scope.addNewDepartment = function(){
        var newItem = $scope.departments.length + 1;
        $scope.departments.push({name: 'organization_depertments[]', id:'organization_depertments_' + newItem, placeholder: 'Teams or departments', value: ''});
    };
    $scope.removeDepartment = function($index){
        $scope.departments.splice($index, 1);
    };
});

smgapp.controller('add-locs', function($scope){
    $scope.locations = [];
    $scope.addNewLoc = function(){
        var newItem = $scope.locations.length + 1;
        $scope.locations.push({name: 'organization_location[]', id:'organization_location_' + newItem, placeholder: 'Locations', value: ''});
    };
    $scope.removeLoc = function($index){
        $scope.locations.splice($index, 1);
    };
});

smgapp.controller('add-levels', function($scope){
    $scope.levels = [];
    $scope.addNewLevel = function(){
        var newItem = $scope.levels.length + 1;
        $scope.levels.push({name: 'organization_levels[]', id:'organization_levels' + newItem, placeholder: 'Levels', value: ''});
    };
    $scope.removeLevel = function($index){
        $scope.levels.splice($index, 1);
    };
});

smgapp.controller('permalinkCltr', function($scope, $http){
    $scope.organization_url = '';
    $scope.generatePermalink = function(){
        var title = $scope.organization_name;
        title = title.replace(/[&\/\\#,+()@_$~%.'":*?<>{}]/g, '');
        title = title.replace(/[, ]+/g, ' ').trim();
        var words = title.split(' ');
        var str = words.join('-');
        $scope.organization_url = str.toLowerCase();
        
        var data = $.param({
            action: DOING_AJAX, 
            permalink: $scope.organization_url
        });
        
        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }
        $scope.unique = true;
        $http.post(BASE_URL + 'ajax/check_permalink', data, config).success(function(data){
            var $this = angular.element('#organization_url');
            if(data == 'unique'){
                $this.parent().removeClass().addClass('col-sm-3 has-success has-feedback');
                $this.siblings('span').remove();
                $this.parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
                angular.element('#not-unique').hide();
            }else if(data = 'exists'){
                $this.parent().removeClass().addClass('col-sm-3 has-error has-feedback');
                $this.siblings('span').remove();
                $this.parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
                angular.element('#not-unique').show();
            }
        });
    }
});

smgapp.controller('add-recpt', function($scope){
    $scope.recipients = [];
    $scope.addNewRecipient = function(){
        var newItem = $scope.recipients.length + 1;
        $scope.recipients.push({id:'recipient_' + newItem, value: ''});
    };
    $scope.removeRecipient = function($index){
        $scope.recipients.splice($index, 1);
    };
});