$(function(){

	if($('#mainNavBar #user').length) {
		
		$('#mainNavBar .navbar-nav li:contains(Login)').hide();
	}
});

function enableSubmitIfValid(){

	var form = document.querySelector("#editForm");
	if(form.checkValidity()) {
	 
	    $('#submit').prop('disabled', false).addClass('btn-primary');
	}
	else{
		
	    $('#submit').prop('disabled', true).removeClass('btn-primary');
	}
}
function formActions(){

	$('.dateTypeSelector input[name="dateType"]').on('change', function(){

	    $('.dateSelector').addClass('hidden');
	    $('.dateSelector input, .dateSelector select').prop('required', false);

	    var targetSelector = '#' + $('.dateTypeSelector input[name="dateType"]:checked').val() + 'DateSelector';
	    $(targetSelector).removeClass('hidden');
	    $(targetSelector + ':not(.hidden) input').prop('required', true);
	    $(targetSelector + ':not(.hidden) :not(.hidden) select').prop('required', true);
	});

	$('#hinduDateSelector .more i').on('click', function(){

	    $(this).hide();
	    $('#hinduSingleDateSelector').addClass('hidden');
	    $('#hinduSingleDateSelector select').prop('required', false);
	    $('#pooja-date-hindu').removeClass('hidden');
	});

	// Calculate hndu date and put value in pooja-data-hindu
	$('#pooja-date-hindu-maasa, #pooja-date-hindu-paksha, #pooja-date-hindu-tithi').on('change', function(){

	    var maasa = $('#pooja-date-hindu-maasa').val();
	    var paksha = parseInt($('#pooja-date-hindu-paksha').val());
	    var tithi = parseInt($('#pooja-date-hindu-tithi').val());

	    tithi = (tithi % 15 == 0) ? tithi : ((paksha - 1) * 15) + tithi;
	    if (tithi < 10) tithi = '0' + tithi;
	    var hinduDate = maasa + '-' + tithi;

	    if(hinduDate.match(/\d\d-\d\d/)) $('#pooja-date-hindu').val(hinduDate);
	});

	$('.dateTypeSelector input[name="dateType"]').trigger("change");

	$('.mainform .datePickerReceipt').datepicker({

	    format: "yyyy-mm-dd",
	    todayHighlight: true,
	    forceParse: false
	});

	$('.mainform .datePickerPooja').datepicker({

	    format: "mm-dd",
	    clearBtn: true,
	    todayHighlight: true,
	    multidate: true,
	    multidateSeparator: ";",
	    forceParse: false
	});

	$('#editForm input').on('change', function(){

	    enableSubmitIfValid();
	});

	$('#editForm input').on('focusin', function(){

	    $(this).addClass('validate');
	    $('#' + $(this).attr('id') + '-help').show();
	});

	$('#editForm input').on('focusout', function(){

	    if($(this).is(":valid"))
	    	$('#' + $(this).attr('id') + '-help').hide();
	});

	$('#submitRegion').on('click, mouseover', function(){

		$('#editForm input').each(function(){

			if($(this).is(":invalid")) {
		    
		    	$(this).addClass('validate');
		    	$('#' + $(this).attr('id') + '-help').show();
		    }
		});
	});
}
