
var app = angular.module("glutenapp", []);

// Search Filter
app.filter('searchFor', function(){
	return function(arr, searchString){
		if(!searchString){
			return arr;
		}
		var result = [];
		searchString = searchString.toLowerCase();
		angular.forEach(arr, function(item){
			if(item.Name.toLowerCase().indexOf(searchString) !== -1){
				result.push(item);
			}
		});
		return result;
	};

});
   
app.controller('glutendata', function($scope, $http) {
	$http.get("http://stocktwt.com/test/list.php").success(function (response) {$scope.items = response.records;});
	$http.get("http://stocktwt.com/test/table_list.php").success(function (response) {$scope.tableitems = response.records;});
	$http.get("http://stocktwt.com/test/count.php").success(function(response){$scope.count = response;});

	$scope.gluten = {
       value: 'NA'
      };
	$scope.update_submit = function(){ $scope.submitted = 'true'; }
	$scope.update_count = function(){
		document.getElementById("count").textContent = $scope.count;
		$scope.active='contact';
	}
	
	$scope.check_credentials = function () {

		document.getElementById("message").textContent = "";

		var request = $http({
			method: "post",
			url: "http://stocktwt.com/test/process.php",
				data: {
					name: $scope.name,
					email: $scope.email,
					fooditem: $scope.fooditem,
					gluten: $scope.gluten.value
					},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }});
/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
	    document.getElementById("message").textContent = "You have successfully submitted a food item to be reviewed";
		$scope.update_submit(); //updates to disable the submit button
});
}
});

