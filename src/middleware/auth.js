const jwt = require("jsonwebtoken");
require('dotenv').config();

const config = process.env;

// Define your middleware to verify the token
const verifyToken = (req, res, next) => {
  // console.log(req.body.token);return false;
  const token = req.body.token || req.session.token;
  
  if (!token) {
    return res.status(200).json({ status: false, message: "Token Field Is Required" });
  }

  try {
    const decoded = jwt.verify(token, config.TOKEN_KEY);
    req.user = decoded;
    return next();
  } catch (err) {
    return res.status(401).send({ status: false, message: "Invalid Token" });
  }
};
module.exports = verifyToken;