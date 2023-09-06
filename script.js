const cron = require("node-cron");

cron.schedule("0 0 * * *", () => {
  require("./reset.php");
});
