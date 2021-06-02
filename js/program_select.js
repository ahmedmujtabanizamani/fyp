function checkBoxLimit() {
	var checkBoxGroup = document.forms['form2']['program[]'];			
	var limit = 3;
	for (var i = 0; i < checkBoxGroup.length; i++) 
	{
		checkBoxGroup[i].onclick = function() {
			var checkedcount = 0;
			for (var i = 0; i < checkBoxGroup.length; i++) {
				checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
			}
			if (checkedcount > limit) {
				console.log("You can select maximum of " + limit + " programs.");
				alert("You can select maximum of " + limit + " programs.");						
				this.checked = false;
			}
		}
	}
}
