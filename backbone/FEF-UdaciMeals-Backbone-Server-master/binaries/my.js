var numLetters = function(letter){
	return new Function('times',
	"if (times < 0) return ; \
	var result = ''; \
	times = Math.round(times); \
	while (times--) { result += '" + letter +" ';} \
	return result;"

	);
};
var LotsOfAaas = numLetters('a');
console.log(LotsOfAaas(4.5));
