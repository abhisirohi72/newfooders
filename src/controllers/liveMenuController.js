const foodersModel = require("../models/foodersModel");
const ordersModel = require("../models/ordersModel");
const commonModel= require("../models/commonModel");
const CommonHelper= require("../helpers/common_helper");
const EncryptHelper= require('../helpers/encryptDecrypt_helper');
const multer = require('multer');
var Password = require("node-php-password");
var jwt = require('jsonwebtoken');
const { send } = require("process");
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
        const title="Category/Menu";
        const currentUrl = req.originalUrl;
        // Remove the leading '/' character
        const cleanedUrl = currentUrl.startsWith('/') ? currentUrl.slice(1) : currentUrl;
        console.log(cleanedUrl);
        res.render("view_menus", {title:title, firstSegment:cleanedUrl});
    }
};

exports.view_menu_datatable= async (req, res, next)=>{
  try {
    if(!req.session.token){
        res.redirect('/');
    }else{
      console.log(req.user.fooder_id);
      var draw        = req.body.draw;
      var start       = req.body.start;
      var rowperpage  = req.body.length;

      var columnIndex_arr = req.body.order;
      var columnName_arr  = req.body.columns;
      var order_arr       = req.body.order;
      var search_arr      = req.body.search;

      var columnIndex     = columnIndex_arr[0]['column'];
      var columnName      = columnName_arr[columnIndex]['data'];
      var columnSortOrder = order_arr[0]['dir'];
      var searchValue     = search_arr['value'];
      
      var totalRecords    = await commonModel.select("fooders_menus", "count(id) as total", "where fooder_id="+req.user.fooder_id);
      totalRecords = totalRecords[0].total;
      console.log(totalRecords);
      // return false;
      
      var totalRecordswithFilter= totalRecords;
      
      var getDetails = await commonModel.select("fooders_menus", "*", "where fooder_id="+req.user.fooder_id, start, rowperpage, columnName, columnSortOrder);

      if(searchValue){
        // console.log("enter in search");return false;
        totalRecordswithFilter= await commonModel.select("fooders_menus", "count(id) as total", "where fooder_id="+req.user.fooder_id+" and (name like '%"+searchValue+"%' or description like '%"+searchValue+"%')");
        totalRecordswithFilter = totalRecordswithFilter[0].total;

        getDetails = await commonModel.select("fooders_menus", "*", "where fooder_id="+req.user.fooder_id+" and (name like '%"+searchValue+"%' or description like '%"+searchValue+"%')", start, rowperpage, columnName, columnSortOrder);
      }
      console.log("blablbal");
      
      // console.log(getDetails);return false;
      // var newArray=[];
      // getDetails.forEach(async (item, index) => {
      //   var prod_count= await commonModel.select("fooders_products", "count(id) as total", "where menu_id= "+item.id);
      //   var send_status       = "Un Available";
      //   if (item.status=="1") {
      //     send_status= "Available";
      //   }
      //   const itemData= {
      //     menu         : item.name,
      //     description  : item.description,
      //     encryptedId  : EncryptHelper.encrypt("id="+item.id),
      //     total_prod   : prod_count[0].total,
      //     status       : send_status
      //   }
      //   newArray.push(itemData);
      // });
      const newArray = [];
      await Promise.all(getDetails.map(async (item) => {
        const prod_count = await commonModel.select("fooders_products", "count(id) as total", "where menu_id = " + item.id);
        const send_status = item.status === "1" ? "Available" : "Un Available";
        newArray.push({
          name: item.name,
          description: item.description,
          encryptedId: EncryptHelper.encrypt("id=" + item.id),
          total_prod: prod_count[0].total,
          status: send_status,
        });
      }));
      
      var sendArray=[];
      sendArray.push({
        draw: draw,
        iTotalRecords: totalRecords,
        iTotalDisplayRecords: totalRecordswithFilter,
        aaData: newArray
      });
      console.log(sendArray);
      return res.status(200).send(sendArray[0]);
      // return sendArray;
      // return res.send.json(sendArray);
      // return res.status(200).json({ "status":true, "message":"Fetch Data", data: sendArray});
      // res.json(getDetails);
      // console.log(getDetails);
      // return false;
    }
  } catch (error) {
    
  }
};
  