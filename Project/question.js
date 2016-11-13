// Java-scrpt for providing questions and recieving answers

var result=[];
var count=0;

// var a=$("div.q_wrap");
// console.log(a);
var ele=$("div.q_wrap .question");
// console.log(ele[]).
next_ques();

// var len=ele.length;

function next_ques (){

	if(count<=3){
	// alert(count);

		if(count!=0){
			$(ele[count-1]).css("display","none");
		}
		$(ele[count]).css("display","block");
		count++;

	}else{
		alert("No more questions you nerd ..!!")
	}
}

$("input:radio").change(function(evt){

var Q_no=($(evt.target).attr('class'));
// console.log($(evt.target).attr('class'));
var selectedOption = $("input[name='option']:checked").val();
// console.log(selectedOption);

var temp= { 'Question_No': Q_no , 'Answer': selectedOption};


var count=0;


for (var i = result.length - 1; i >= 0; i--) {
	if(result[i].Question_No==temp.Question_No){
		// console.log("it works");
		count=1;
		result[i].Answer=temp.Answer;
	}
};

if(count==0){
result.push(temp);

}

console.log(result);

})

$("form.end").submit(function(evt){
	evt.preventDefault();
			formdata={
				'data':result
			}
				$.ajax({
					type:'POST',
					url:'submit.php',
					data:formdata,
					dataType:'json',
					encode:true
				})

				.done(function(data){

console.log("Success");
console.log(data);
console.log(data.sum);

$("h1.rslt").html(
 		data.sum
 	);

$("div.q_wrap .question").html("DONE");


console.log(data.test);

	})

	.fail(function(data){
		console.log(data);
		console.log("failed..!");

	})
})

// var json = "{ 'Question_No': 1 , 'Answer': opt2 }";
// vsar obj = JSON.parse(json);
// alert(obj);