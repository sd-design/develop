var fs = require('fs');

fs.readFile('hello.txt', {encoding:'utf-8'},function(error, contents){
console.log(contents);
});
