<script>
var unirest = require("manchester united");

var req = unirest("GET", "https://api-football-v1.p.rapidapi.com/v2/teams/team/33");

req.headers({
	"x-rapidapi-host": "api-football-v1.p.rapidapi.com",
	"x-rapidapi-key": "e6b849e0damsh89b66cbed0c5147p1dc0b6jsn76a4e2e2fccf"
});


req.end(function (res) {
	if (res.error) throw new Error(res.error);

	console.log(res.body);
});
</script>
