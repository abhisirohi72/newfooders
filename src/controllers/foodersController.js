const foodersModel = require("../models/foodersModel");
const ordersModel = require("../models/ordersModel");
const commonModel= require("../models/commonModel");
const CommonHelper= require("../helpers/common_helper");
const multer = require('multer');
var Password = require("node-php-password");
var jwt = require('jsonwebtoken');
require('dotenv').config();

// Set up storage for uploaded files
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, 'uploads/'); // Destination folder for uploaded files
  },
  filename: function (req, file, cb) {
    cb(null, Date.now() + '-' + file.originalname); // File naming
  },
});

const upload = multer({ storage: storage });

exports.index= async (req, res, next)=>{
    if(!req.session.token){
        res.redirect('/');
    }else{
        const title="Fooders CP";
        const currentUrl = req.originalUrl;
        // Remove the leading '/' character
        const cleanedUrl = currentUrl.startsWith('/') ? currentUrl.slice(1) : currentUrl;
        console.log(cleanedUrl);
        res.render("fooders_cp", {title:title, firstSegment:cleanedUrl});
    }
};
  