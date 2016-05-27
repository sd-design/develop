var http = require('http');
var colors = require('colors');
var readline = require('readline');
var request = require('request');
var cheerio = require('cheerio');

var rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
  terminal: false
});
console.log("Куда пойдем?\n--------------".inverse);

rl.on('line', function(line){
if(line === "exit"){
		console.log("Bye!");
		process.exit(-1);}
else{
request("http://"+line+"/", function(error, response, body){
	if(!error&&response.statusCode===200){
		//var $= cheerio.load(body);
		//var text = $('#about').text();
console.log('Ответ сервера:\n'.blue+body.green);
	}
	else{
console.log('Ответ сервера:'.blue+error.red);

}
});

}

	});
