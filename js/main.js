$(function(){
	$("#reg_activity").submit(function(e){
		var name = $("#name").val().trim()
		var mobile = $("#mobile").val().trim()
		var teaage = $("#tea_age").val().trim()
		var amount = $("#amount").val().trim()
		
		var isEmpty = true
		if(!name){
			alert("name is required")
//			$("#bb").tooltip('show')
		} else {
			if(!mobile){
				alert("mobile is required")
			} else {
				if(!teaage){
					alert("tea age is required")
				} else{
					if(!amount){
						alert("amount is required")
					} else {
						isEmpty = false
					}
				}
			}
		}
		var isValid = false
		if (!isEmpty){
			if (name.match(/.+&[$-/:-?{-~!"^_`\[\]]/)) {
				alert("special character is not allowed")
			} else {
				if (mobile.match(/^0?(13[0-9]|15[012356789]|18[02356789]|14[57])[0-9]{8}$/)){
					isValid = true
				} else{
					alert("Please enter a valid mobile number")
				}
			}
		}
		
		if (isEmpty || !isValid){
			e.preventDefault()
		}
		
	})
	
	var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
	
	var nextTuesday = nextTuesdayDate()
	var nextSunday = nextSundayDate()
	
	var tuesday = $("<option></option>").text(nextTuesday.toLocaleDateString() + ", " + days[nextTuesday.getDay()])
										.val(nextTuesday.toLocaleDateString())
	var sunday = $("<option></option>").text(nextSunday.toLocaleDateString() + ", " + days[nextSunday.getDay()])
										.val(nextSunday.toLocaleDateString())
	
//	$("#date").append(tuesday).append(sunday)
	
	function nextTuesdayDate(){
		var now = new Date();
		var day = now.getDay();
		var date = now.getDate()
		
		var date_diff = 2 - day;
		if (day>=0 && day<=2){
			now.setDate(date + date_diff)
		} else {
			now.setDate(date + date_diff +7)
		}
		
		return now
	}
	
	function nextSundayDate(){
		var now = new Date();
		var day = now.getDay();
		var date = now.getDate()
		
		var date_diff = 0 - day;
		now.setDate(date + date_diff +7)
		
		return now
	}

})
