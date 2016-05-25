//db_server.js
const http = require('http');
var mysql = require('mysql');

const hostname = '127.0.0.1';
const port = 3000;




const server = http.createServer((req, res) => {
var rline = "hello from Rline\n";

      res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  //res.write('Hello man!!!!! How are you?');
      //res.type('json');   
      res.write(rline);

 res.end('Hello man!!!!! How are you?\n');
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});

var figlet = require("figlet");
figlet.text("PHP FOREVER!", function(error, data) {
    if (error)
      console.error(error);
    else
      console.log(data);
  });
