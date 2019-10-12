const callAjax = (endpoint, data = null, type = "GET", dataType = "JSON") => (
	$.ajax({
		url: `http://localhost:8000/${endpoint}`,
		type,
		dataType,
		data,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	})
)