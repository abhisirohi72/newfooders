const foodersModel = require("../models/foodersModel");
const ordersModel = require("../models/ordersModel");
const commonModel= require("../models/commonModel");
const CommonHelper= require("../helpers/common_helper");
const EncryptHelper= require('../helpers/encryptDecrypt_helper');
// const multer = require('multer');
var Password = require("node-php-password");
var jwt = require('jsonwebtoken');
require('dotenv').config();

// // Set up storage for uploaded files
// const storage = multer.diskStorage({
//   destination: function (req, file, cb) {
//     cb(null, 'uploads/'); // Destination folder for uploaded files
//   },
//   filename: function (req, file, cb) {
//     cb(null, Date.now() + '-' + file.originalname); // File naming
//   },
// });

// const upload = multer({ storage: storage });

exports.showDashboard = [  
  // const meals = await mealModel.getMeals();
  async (req, res, next) => {
    try{
        // console.log(req.file.filename);return false;
        if(!req.body.token){
            return res.status(200).json({ "status":false, message:"Token Field Is Required" });
            // return false;
        }

        // if(!req.body.fooder_id){
        //     return res.status(200).json({ "status":false, message:"Fooder Id Field Is Required" });
        //     // return false;
        // }
        var token= req.body.token;
        var fooder_id= req.body.fooder_id;

        try {
          var decoded = jwt.verify(token, process.env.TOKEN_KEY);
          console.log(decoded.fooder_id) // ba
          // if(decoded.fooder_id != fooder_id){
          //     return res.status(401).json({ "status":false, message:"You Are Unauthorized" });
          // }  
        } catch (error) {
          return res.status(401).json({ "status":false, message:"Invalid Token" });
        }
        
        // return false;
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(currentDate.getDate()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day}`;
        const getDetails= await ordersModel.ordersDetails(decoded.fooder_id, formattedDate);
        var newArray = [];
        // console.log(getDetails);
        await Promise.all(getDetails.map(async (item)=>{
          if (item.status=="0") {
            item.status= "Pending";
          }else if (item.status=="1") {
            item.status= "Accepted";
          }else{
            item.status= "Order Ready";
          }
          // console.log(item.status);

          var item_name="";
          var label_name="";
          if (item.order_mode=="0") {
            item_name= "#"+item.order_number_qrcode;
            label_name= "QR Code";
          }else{
            item_name= "#"+item.order_number;
            label_name= "Online";
          }
          
          // console.log(label_name);

          var iconData= "";
          if(item.type=="1"){
            iconData="C";
          }else{
            iconData= "T";
          }
          // console.log(iconData);
          //find time ago
          const timestamp_data= item.creation_date;
          // Get the current time as a Unix timestamp
          const currentTimestamp = Math.floor(Date.now() / 1000);

          // Calculate the time difference in seconds
          const timeDifferenceInSeconds = currentTimestamp - timestamp_data;

          // Calculate the time difference in minutes, hours, and days
          const minutesAgo = Math.floor(timeDifferenceInSeconds / 60);
          const hoursAgo = Math.floor(minutesAgo / 60);

          if(hoursAgo==0){
            var orderTimeDiff= `${minutesAgo % 60}m ago`;
          }else{
            var orderTimeDiff= `${hoursAgo % 24}h, ${minutesAgo % 60}m ago`;
          }
          newArray.push({
            iconData: iconData,
            order_num: item_name,
            main_status:item.status,
            order_mode:label_name,
            hour_ago:orderTimeDiff,
            order_time:timestamp_data,
            order_number_qrcode:item.order_number,
            encryptedId: EncryptHelper.encrypt("id=" + item.order_id)
          });
          // console.log(newArray);
        }));
        console.log(newArray);
        return res.status(200).json({ status:true, message:"Fetch Data", data:newArray });
    }catch(sendError){
        return res.status(200).json({ status:true, message:sendError });
    }
  },
];

exports.addDevice= [
  // upload.none(),

  async (req, res, next)=>{
    try {
      if(!req.body.token){
          return res.status(401).json({ "status":false, message:"Token Field Is Required" });
          // return false;
      }

      // if(!req.body.fooder_id){
      //     return res.status(401).json({ "status":false, message:"Fooder Id Field Is Required" });
      //     // return false;
      // }
      if(!req.body.app_id){
          return res.status(401).json({ "status":false, message:"App Id Field Is Required" });
          // return false;
      }
      var token= req.body.token;
      // var fooder_id= req.body.fooder_id;
      var app_id= req.body.app_id;
      var currentDate= await CommonHelper.getCurrentDateTime();

      try {
        var decoded = jwt.verify(token, process.env.TOKEN_KEY);
        console.log(decoded.fooder_id) // ba
        // if(decoded.fooder_id != fooder_id){
        //     return res.status(401).json({ "status":false, message:"You Are Unauthorized" });
        // }  
      } catch (error) {
        return res.status(401).json({ "status":false, message:"Invalid Token" });
      }
      var getDetails= await commonModel.upsert("fooders_appid", "fooder_id, app_id, created_date", [decoded.fooder_id, app_id, currentDate]);
      console.log(getDetails);
      if(getDetails){
        return res.status(200).json({ status:true, message:"Data has been saved!!!"});
      }
    } catch (sendError) {
      console.log(sendError);
      return res.status(400).json({ status: false, error: sendError.message });
    }
  },
];

exports.liveOrders= async (req, res, next)=>{
  // console.log(req.session.token);
  if(!req.session.token){
    res.redirect('/');
    return false;
  }else{
    const title="Live Order";
    const currentUrl = req.originalUrl;
    // Remove the leading '/' character
    const cleanedUrl = currentUrl.startsWith('/') ? currentUrl.slice(1) : currentUrl;
    res.render("live_order", {title:title, firstSegment:cleanedUrl});
  }
};

