const cron = require("node-cron");

cron.schedule("0 0 * * *", () => {
  require("./reset.php");
});

// this script can't use, just use cron on your webhosting
