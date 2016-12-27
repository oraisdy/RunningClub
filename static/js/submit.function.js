function buttonSubmit() {
    
    // for (var i = 0;i<3;i++) {
    // 	console.log(url);
    // 	$.ajax({
    //     url: url,
    //     // data: {
    //     //     id: id,
    //     // },
      	
    //     // dataType: "json",
    //     type: "POST",
    //     async :false,
    //     success: function (data) {
    //         btn.innerHTML = newText;
    //         btn.style.backgroundColor = '#676767';
    //         btn.style.borderColor = '#676767';
    //         console.log(data);
    //     },
    //     error : function (msg,meg) {
    //         console.log("error"+msg+" "+meg);
    //     }
    // });
    // }
    for(var i = 0;i<3;i++){
			console.log('tsss');
			$.ajax({
				type : 'POST',
				url : 'WtdServlet',
				async:false,
				error : function(xhr, err) {
					console.log('error'+xhr+" "+err);
				},
				success : function(data) {
					console.log('success');
				}
			});
			}

}