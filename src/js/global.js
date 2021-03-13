function notifNoAuto(data){
	swal({
		type: 'error',
		title: 'Warning !',
		html: data,
		showConfirmButton: false,
		timer: 2000
	})
};

function notifYesAuto(data){
	swal({
		type: 'success',
		title: 'Success',
		html: data,
		showConfirmButton: false,
		timer: 2000
	})
};

function notifNo(data){
	swal({
		type: 'error',
		title: 'Warning !',
		html: data
	})
};

function notifYes(data){
	swal({
		type: 'success',
		title: 'Success',
		html: data
	})
};

function notifCancle(data){
	swal({
		type: 'warning',
		title: 'Canceled',
		text: data,
		showConfirmButton: false,
		timer: 2000
	})
};

function loadingShow() {
	$('#loading').show();
}

function newloadingShow() {
	$.LoadingOverlaySetup({
		background      : "rgba(0, 0, 0, 0.5)",
		image           : "../img/favicon.png",
		imageAnimation  : "2000ms pulse",
		imageColor      : "#ffcc00"
	});
	
	$.LoadingOverlay("show");
}
function newloadingHide() {
	$.LoadingOverlay("hide");
}

function loadingHide() {
	$('#loading').hide();
}

$(document).ready(function(){
	// Setting Modal and Sweet Alert 2
	$("div#MyModal").on('shown.bs.modal',function(e){
		e.preventDefault();
		$('body').removeAttr('style');
	});
	$("div#MyModal").on('hidden.bs.modal',function(e){
		e.preventDefault();
		$('h5#MyModalTitle').empty();
		$("div#MyModalContent").empty();
		$("div#MyModalFooter").empty();
		$('div.modal-dialog').removeClass('modal-lg');
		$('div.modal-dialog').removeClass('modal-sm');
	});
});

function newWindow(mypage,myname,w,h,scroll,pos){
	if(pos=="random"){
		LeftPosition=(screen.availWidth)?Math.floor(Math.random()*(screen.availWidth-w)):50;
		TopPosition=(screen.availHeight)?Math.floor(Math.random()*((screen.availHeight-h)-75)):50;
	}

	if(pos=="center"){
		LeftPosition=(screen.availWidth)?(screen.availWidth-w)/2:50;TopPosition=(screen.availHeight)?(screen.availHeight-h)/2:50;
	}

	if(pos=="default"){
		LeftPosition=50;
		TopPosition=50
	}
	else if((pos!="center" && pos!="random" && pos!="default") || pos==null){
		LeftPosition=0;
		TopPosition=20
	}

	settings ='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
	win 	 = window.open(mypage,myname,settings);
	if(win.focus){ win.focus(); }
}  