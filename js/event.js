
var app = angular.module('eventApp', [])

app.controller('eventCtrl', function($scope, $http){
	console.log(1231232312)

	var appId = "wx5f08243f1028e98e"
	var appSecreat = "7ad6fcbb9aff7c8c6fb1ac9995bf0574"
	var tokenUrl = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" + appId + "&secret=" + appSecreat

	// $http.get(tokenUrl,{
	// 	headers: {
	// 	   'Content-Type': "application/json; encoding=utf-8",
	// 	   'Origin': "https://api.weixin.qq.com/"
	// 	 },
	// 	responseType: "json"
	// }).then(function(response){



	// 	console.log(JSON.parse(response.data))
	// })
})



function _getToken(){
	var appId = "wx5f08243f1028e98e"
	var appSecreat = "7ad6fcbb9aff7c8c6fb1ac9995bf0574"


}