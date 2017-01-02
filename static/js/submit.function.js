function buttonSubmit(btn,id, url, newText) {
	// console.log(url);
	$.ajax({
		url: url,
		data: {
			id: id,
		},
		// cache: false,
		// dataType: "json",
		type: "POST",
		success: function (data) {
			btn.innerHTML = newText;
			btn.style.backgroundColor = '#676767';
			btn.style.borderColor = '#676767';
			console.log(data);
		},
		error : function (msg,meg) {
			console.log(msg);
			console.log(meg)
		}
	});

}