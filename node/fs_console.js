var fs = require('fs');
var figlet = require("figlet");
var readline = require('readline');
var colors = require('colors');
//var file = fs.readFileSync('hello.txt', {encoding:'utf-8'});
//fs.renameSync("hello.txt", "subFolder/hello2.txt");
//console.log(file);

var readline = require('readline');
var rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
  terminal: false
});
console.log("Пишем в файл.\n---------------------".inverse);
rl.on('line', function(line){
	if(line === "exit"){
		console.log("Bye!");
		process.exit(-1);}
	if(line === "PHP"){
		figlet.text("PHP FOREVER!", function(error, data) {
    if (error)
      console.error(error);
    else
console.log(data);
  });
	}
		else{
fs.writeFileSync("hello.txt", line+'\n', {encoding:'utf-8', flag: 'a'}); 
var file = fs.readFileSync('hello.txt', {encoding:'utf-8'});
console.log(file.green);
console.log("--> данные записаны".red);
}
});


