var mysql = require('mysql');
var pool  = mysql.createPool({
connectionLimit : 15,
host: 'localhost',
database: 'node',
user: 'node',
password: '1234567back'
});
var Tasks = {

list: function(callback){
pool.getConnection(function(err, connection) {
  // Use the connection
  connection.query( 'SELECT * FROM tasks', function(err, rows) {
    // And done with the connection.
callback(rows);
connection.release();

    // Don't use the connection here, it has been returned to the pool.
  });

});
},

edit: function(){
},


};

module.exports = Tasks; 