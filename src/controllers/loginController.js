const foodersModel = require("../models/foodersModel");
const ordersModel = require("../models/ordersModel");
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

exports.login = async (req, res, next) => {
  res.render("login");
};

exports.signup= async (req, res, next) => {
  res.render("signup");
}; 

exports.forgot= async (req, res, next) => {
  res.render("forgot");
};

exports.checkLogin = [
  // console.log("check login"),
  // upload.single('file'), 
  upload.none(), 
  
  // const meals = await mealModel.getMeals();
  async (req, res, next) => {
    // Access the uploaded file via req.file
    // const uploadedFile = req.file;

    // // Check if a file was uploaded
    // if (!uploadedFile) {
    //   return res.status(400).json({ message: 'No file uploaded' });
    // }

    // // Handle the uploaded file here (e.g., save it, process it, etc.)

    // // Log the file information
    // console.log('Uploaded File:', uploadedFile);

    try {
      // console.log(process.env.TOKEN);
      if(!req.body.email){
        return res.status(200).json({ "status":false, message:"Email Field Is Required" });
        // return false;
      }

      if(!req.body.password){
        console.log("enter");
        return res.status(200).json({ "status":false, message:"Password Field Is Required" });
        // return false;
      }

      if(req.body.email && req.body.password){
        // Log other form data if needed
        const email       = req.body.email;
        const password    = req.body.password;
        var req_process   = req.body.req_process;

        const userDetails = await foodersModel.loginDetails(email,password);
        
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(currentDate.getDate()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day}`;
        if(userDetails!=null){
          var token = jwt.sign(userDetails, process.env.TOKEN_KEY);
          if(req_process || req_process=="web"){
            req.session.token = token;
            // console.log(req.session.token);
            // return false;
            // console.log("login controlller="+req.session.token);
            return res.status(200).json({ status:true, message:"Credentials Matched",token:token});
          }else{
            const getDetails= await ordersModel.ordersDetails(userDetails.fooder_id, formattedDate);
            return res.status(200).json({ status:true, message:"Credentials Matched",token:token, data:getDetails });
          }
        }else{
          return res.status(200).json({ "status":false, message:"Credentials Not Matched" });
        }
      }
    }catch(sendError){
      return res.status(400).json({ status:true, message:sendError });
    } 
  },
];

exports.logout= async (req, res, next)=>{
  try {
    req.session.destroy((err) => {
      if (err) {
        console.error('Error destroying session:', err);
      } else {
        // Redirect to a login or home page after logout
        res.redirect('/'); // Change to your desired URL
      }
    });  
  } catch (error) {
    console.error(error);
    return res.status(500).send('Internal Server Error');
  }
};

exports.logoutinApp= [
  // console.log("enter in logout"),
  upload.none(), 
  async (req, res, next)=>{
    try {
      console.log("token="+req.body.token);
      if(!req.body.token){
        return res.status(200).json({ "status":false, message:"Token Is Required" });
      }else{
        var token= req.body.token;
        var decoded = jwt.verify(token, process.env.TOKEN_KEY);
        return res.status(200).json(decoded);
        // req.session.destroy((err) => {
        //   if (err) {
        //     console.error('Error destroying session:', err);
        //   } else {
        //     // Redirect to a login or home page after logout
        //     return res.status(200).json({ "status":true, message:"Logout" });
        //   }
        // });
      }
    } catch (error) {
      console.error(error);
      return res.status(500).send('Internal Server Error');
    }
  }
];
