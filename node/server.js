const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/html');
  res.write('<html><head><title>Hello man!!!!! How are you?</title></head><body><br>');
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
  