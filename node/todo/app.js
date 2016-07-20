var tasks = require('./tasks');
var express = require('express'),
app = express(), server;
var colors = require('colors');
bodyParser = require('body-parser');
var mysql = require('mysql');
var fs = require('fs');
var requestIp = require('request-ip');

//data for pages
var my_home ={
home: {page:"МОЙ TODO_LIST", content: "МОЙ TODO_LIST"},
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
     console.log(req.url);
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
});
server = app.listen(8080, function(){

console.log("Express is working on port ".yellow+"8080".white ); 	
});