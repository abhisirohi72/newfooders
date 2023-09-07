//Node.js ==> Express Framework (SIMPLE SERVER)
const express = require("express");
var useragent = require('express-useragent');
const cors = require('cors');
let app = express();
//Port to listen on
const PORT = 3000;

app.use(cors({
  origin: '*'
}));

const path = require("path");

const ejs = require('ejs');

const bodyParser = require("body-parser");

const bootstrap = require("./src/boostrap");

const session = require('express-session');
//Use a Custom Templating Engine
app.set("view engine", "ejs");

app.set("views", path.resolve("./src/views"));
//use sesion 

app.use(session({
  secret: 'ISTY3ZJ87PDQG1AL26F40KCUEC3F2GDARWI7UOEVN0PTB1HX4Y54HOJFWNDP2K6ULC0ISYVEBZ981H7QGE4MDWOK92SVJBL50XFINEK5P3H8GYOM2FICURAW764VSUCSXRT5BW6QGL3097AP4M1Z8KSD7N963QFCVRMK5YT24PX80OLEH746WKTQ20APGF15MIUDRVOCX7PAWSBDE2MOZVJG30LCIR65QCWRS3PZNIMF81495JO7TKQ2GV6NY20BKTS8IDR3OGMZV4C9ELPB0GKRTNXPMI9ULEVY2Z83WJ1AJCH4K56T3NFMEXP8LVQAB91G09Q3RNCUPT72I6LF4A0VOESX5WQXNZ3SPD8VJI2T07FOB9415GK07M6DS1NBWV3UR25XCJH8FAYZ57JISRTPZW9OE26X83NUL1A0H9OSWKARYF5EI72PDML0V6JGT13E2XBVHQF6CKJD4RUAIP1ST9G6045RS91ENZ8GMKCDFU2PABOQVSWQPGYT2N4KRBU9OIDL8J7XH',
  cookie: { maxAge: 1000 * 60 * 60 * 24 * 7 },
  resave: false,
  saveUninitialized: true,
}));

app.use(useragent.express());

app.use('/uploads', express.static('uploads'));
//Request Parsing
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.use(express.static(path.join(__dirname, 'public')));

//Create Express Router
const router = express.Router();
app.use(router);

const rootPath = path.resolve("./dist");
app.use(express.static(rootPath));

bootstrap(app, router);

//Main Page (Home)
// router.get("/", (req, res, next) => {
//   return res.send("Hello There");
// });

router.use((err, req, res, next) => {
  if (err) {
    //Handle file type and max size of image
    return res.send(err.message);
  }
});

app.listen(PORT, err => {
  if (err) return console.log(`Cannot Listen on PORT: ${PORT}`);
  console.log(`Server is Listening on: http://localhost:${PORT}/`);
});
