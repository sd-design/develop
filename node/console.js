var figlet = require("figlet");

var readline = require('readline');
var rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
  terminal: false
});

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
    console.log(line);
}
});