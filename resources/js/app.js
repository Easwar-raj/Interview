import angular from 'angular';

const app = angular.module('interview', []);

app.controller('StudentController', function($scope) {
    $scope.message = "Running Correctly in Interview";
});
