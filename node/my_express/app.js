var express = require('express'),
app = express(), server;
var colors = require('colors');
bodyParser = require('body-parser');
var mysql = require('mysql');
var fs = require('fs');
var requestIp = require('request-ip');


//data for pages
var my_home ={
home: {page:"Hello Mischa!!!", content: "This is Express and Jade template"},
about: {page:"About page", content: "This is Express and Jade template for ABOUT page"},
contact: {page:"Contact page", content: "This is Express and Jade template for Contact page"},
профайл: {page:"Профиль", content: "Страница профиля"}
};
linkKeys = Object.keys(my_home);
//options 
app.disable('x-powered-by');
app.set('view engine', 'jade');


app.use(function(req, res, next){
console.log('%s %s', req.method,req.url);
var clientIp = requestIp.getClientIp(req); 
     console.log(clientIp);
next();
});

//static content
app.use(express.static(__dirname + '/public'));

//форма нова страница
app.use(bodyParser.urlencoded({extended: true}));
app.route('/add')

app.get( '/add',function(req, res){
	res.render('add',{page: 'Добавление страницы', my_links: linkKeys})
})
app.post('/add', function(req, res) {
var data = req.body;
if (data.pageurl&& data.pagename&&data.pagecontent){
my_home[data.pageurl]={
page: data.pagename,
content: data.pagecontent
}
linkKeys = Object.keys(my_home);
}
res.redirect('/');
});
app.get('/db', function(req, res, next) {
    
    
    var connection = mysql.createConnection({
    host: "localhost",
    user: 'sd-design',
password: 'FiYzRiMmE3NmI5NzE5ZDkxMTAxN2M1OTI=',
database: 'sd-design',
});
connection.query("SELECT * FROM blog", function(err, rows, field){
    if (!err){
      res.type('json');   
      res.send(rows);
      //логируем IP-адрес запроса
var clientIp = requestIp.getClientIp(req); 
fs.writeFileSync(__dirname + '/logs/log.njs', clientIp+'\n', {encoding:'utf-8', flag: 'a'}); 
    }
    else{
        console.log(err);
    }
});
connection.end();


});



app.get('/:page?', function(req, res){
	var page = req.params.page, data;
	if(!page) {page = 'home';}
	data= my_home[page];
if(!data){res.redirect('/'); return;}
	data.my_links = linkKeys;
	res.render('main', data);
//res.send("Hello Mischa!!!");
//логируем IP-адрес запроса
var clientIp = requestIp.getClientIp(req); 
fs.writeFileSync(__dirname + '/logs/log.njs', clientIp+'\n', {encoding:'utf-8', flag: 'a'}); 
});
server = app.listen(3000, function(){

console.log("Express is working now ".yellow+"guy!!!".white ); 	
});


