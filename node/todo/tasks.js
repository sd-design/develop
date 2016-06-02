var mysql = require('mysql');
var pool  = mysql.createPool({
connectionLimit : 15,
host: 'localhost',
database: 'node',
user: 'node',
password: '1234567back'
});


var Tasks = {

list: function(result){
pool.getConnection(function(err, connection) {
  // Use the connection
  connection.query( 'SELECT * FROM tasks', function(err, rows) {
    // And done with the connection.
result = rows;
return result;
connection.release();

    // Don't use the connection here, it has been returned to the pool.
  });

});


},

add: function(task, callback){
	
},


change: function(result){
    var connection = mysql.createConnection({
    host: "localhost",
    user: 'sd-design',
password: 'FiYzRiMmE3NmI5NzE5ZDkxMTAxN2M1OTI=',
database: 'sd-design',
});
connection.query("SELECT * FROM blog", function(err, rows, field){
    if (!err){
    
    result = rows;

    }
    else{
        console.log(err);
    }
});
connection.end();
return result;
},


complete: function(){
	
},

delete: function(){

},


};

module.exports = Tasks; 