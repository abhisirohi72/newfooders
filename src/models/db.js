const mysql = require('mysql2');

const pool = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: 'password',
  database: 'khateraho_dev',
  connectionLimit: 10, // Adjust as needed
});

// const pool = mysql.createPool({
//   host: 'localhost',
//   user: 'scanka_khateraho',
//   password: 'Marketing2023!',
//   database: 'scanka_khateraho',
//   connectionLimit: 10, // Adjust as needed
// });

// Testing the connection
pool.getConnection((err, connection) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
    return;
  }
  
  // console.log('Connected to MySQL server');
  connection.release(); // Release the connection when done
});
module.exports = pool; // Export the pool object
