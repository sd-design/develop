var fs = require('fs');
//var file = fs.readFileSync('hello.txt', {encoding:'utf-8'});
//fs.renameSync("hello.txt", "subFolder/hello2.txt");
//console.log(file);
var data = "{'Hello', 'people', 'again'}";
fs.writeFileSync("hello.txt", data, {encoding:'utf-8', flag: 'a'}); 
var file = fs.readFileSync('hello.txt', {encoding:'utf-8'});
console.log(file);
console.log("-----------end file");
