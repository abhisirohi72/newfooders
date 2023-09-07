const auth = require("../middleware/auth");
const multer = require('multer');

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

loginController = require("../controllers/loginController");
dashboardController = require("../controllers/dashboardController");
liveMenuController = require("../controllers/liveMenuController");
productController = require("../controllers/productController");
ordersController = require("../controllers/ordersController");
foodersController = require("../controllers/foodersController");
deliveryGuysController = require("../controllers/deliveryGuysController");
verificationController = require("../controllers/verificationController");
offersController = require("../controllers/offersController");
manageTablesController = require("../controllers/manageTablesController");
imageGalleryController = require("../controllers/imageGalleryController");
profileController = require("../controllers/profileController");

exports.appRoute = router => {
  router.get("/", loginController.login);
  router.get("/signup", loginController.signup);
  router.get("/forgot_pass", loginController.forgot);
  router.post("/check_login", loginController.checkLogin);
  router.get("/logout", loginController.logout);
  router.get("/logout_in_app", loginController.logoutinApp);
  /********************************ROUTE START FOR VALIDATION************************ */
  router.post("/show_dashboard", (req, res, next) => {
    req.body;
    next();
  },upload.none(), auth, dashboardController.showDashboard);
  router.post("/add_device", (req, res, next) => {
    req.body;
    next();
  },upload.none(), auth, dashboardController.addDevice);
  router.get("/live_orders", (req, res, next) => {
    req.body;
    next();
  },upload.none(), auth, dashboardController.liveOrders);
  router.get("/view_menus",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth, liveMenuController.index);
  router.post("/view_menu_datatable",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth, liveMenuController.view_menu_datatable);
  router.get("/view_products",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth, productController.index);
  router.get("/orders",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth, ordersController.index);
  router.get("/fooders_cp",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth,foodersController.index);
  router.get("/delivery_guys",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth, deliveryGuysController.index);
  router.get("/verification",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth, verificationController.index);
  router.get("/offers",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth,offersController.index);
  router.get("/manage_tables",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth,manageTablesController.index);
  router.get("/image_gallery",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth,imageGalleryController.index);
  router.get("/profile",(req, res, next) => {
    req.body;
    next();
  },upload.none(), auth,profileController.index);
  /*********************************CODE FOR UPLOADING**************************** */
  // router.post("/show_dashboard", (req, res, next) => {
  //   req.body; // Access form data here

  //   // Define the dynamic destination path here
  //   const dynamicDestinationPath = 'uploads1/'; // Change this path as needed

  //   // Create a new Multer instance with the dynamic storage configuration
  //   const dynamicStorage = multer.diskStorage({
  //     destination: function (req, file, cb) {
  //       // Use the dynamic destination path
  //       cb(null, dynamicDestinationPath);
  //     },
  //     filename: function (req, file, cb) {
  //       cb(null, Date.now() + '-' + file.originalname);
  //     },
  //   });

  //   const dynamicUpload = multer({ storage: dynamicStorage });

  //   // Now you can use 'dynamicUpload' to handle the file upload
  //   dynamicUpload.single("file")(req, res, function (err) {
  //     if (err) {
  //       // Handle file upload error here
  //       return res.status(500).json({ error: 'File upload failed.' });
  //     }

  //     // Continue processing or send a response here
  //     next();
  //   });

  // }, auth, dashboardController.showDashboard);
  /*********************************CODE FOR UPLOADING**************************** */
  
};

// exports.signup= router =>{
//   router.get("/signup", loginController.signup);
// };
