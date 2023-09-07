var Password = require("node-php-password");
const pool= require("./db");

exports.loginDetails = (email, pass) => {
  // console.log(email);
  // console.log(pass);
  // return false;
  return new Promise((resolve, reject) => {

    const sql = `SELECT fooder_id, password FROM fooders where username= '${email}' LIMIT 1`;
    console.log(sql);
    pool.query(sql, async (err, results) => {
      if (err) {
        console.error('Error executing query:', err);
        reject(err); // Reject the promise with an error
      } else {
        if (results.length === 0) {
          resolve(null); // No user found with the provided email
        } else {
          const storedHashedPassword = results[0].password;
          console.log("pass="+pass);

          try {
            // Use bcrypt.compare to compare the provided password with the stored hashed password
            const isPasswordMatch = await Password.verify(pass, storedHashedPassword);

            if (isPasswordMatch) {
              resolve(results[0]); // Passwords match, resolve with user data
            } else {
              resolve(null); // Passwords do not match
            }
          } catch (compareError) {
            console.error('Error comparing passwords:', compareError);
            reject(compareError); // Reject the promise with an error
          }
        }
      }
    });
  });
};
