route = require("./routes");

module.exports = (app, router) => {
  route.appRoute(router);
  // route.signup(router);
};
