$(document).ready(function() {
	// Initializing arrays with city names.
	var theory = [{
	display: "DMSA",value: "t1"},
	{display: "TOC", value: "t2"},
	{display: "DCWSN",value: "t3"}];

	var language= [{
	display: "C",value: "c"},
	{display: "Python",value: "py"},
	{display: "JAVA",value: "java"}];

	var subTopic1 = [{
	display: "Relational Model",value: "st1"},
	{display: "Normalisation",value: "st2"},
	{display: "Concurrancy Model",value: "st3"}];

	var subFunction = [{
	display: "Function",value: "fun"},
	{display: "Pointer",value: "ptr"},
	{display: "Array",value: "arr"},
	{display: "Strings",value: "str"}];

	// Function executes on change of first select option field.
	$("#subject").change(function() {
		var select = $("#subject option:selected").val();
		switch (select) {
			case "THEORY_SUBJECT":
				s_topic(theory);
			break;
			case "LANGUAGE":
				s_topic(language);
			break;
			default:
				$("#subject").empty();
				$("#subject").append("<option>--Select--</option>");
			break;
		}
	});

	// Function executes on change of first select option field.
	$("#subtopic").change(function() {
		var sselect = $("#subtopic option:selected").val();
		switch (sselect) {
			case "t1":
				ss_topic(subTopic1);
			break;
			case "c":
				ss_topic(subFunction);
			break;
			default:
				$("#subtopic").empty();
				$("#subtopic").append("<option>--Select--</option>");
			break;
		}
	});



	// Function To List out Cities in Second Select tags
	function s_topic(arr) {
		$("#subtopic").empty(); //To reset cities
		$("#subtopic").append("<option>--Select--</option>");

		$(arr).each(function(i) { //to list cities
			$("#subtopic").append("<option value=\"" + arr[i].value + "\">" + arr[i].display + "</option>")
		});
	}


		// Function To List out Cities in Second Select tags
	function ss_topic(arr) {
		$("#subsubtopic").empty(); //To reset cities
		$("#subsubtopic").append("<option>--Select--</option>");

		$(arr).each(function(i) { //to list cities
			$("#subsubtopic").append("<option value=\"" + arr[i].value + "\">" + arr[i].display + "</option>")
		});
	}
});