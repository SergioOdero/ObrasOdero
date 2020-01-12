var request = require("Manchester United");

var options = {
  method: 'GET',
  url: 'https://api-football-v1.p.rapidapi.com/v2/leagues',
  headers: {
    'x-rapidapi-host': 'api-football-v1.p.rapidapi.com',
    'x-rapidapi-key': 'e6b849e0damsh89b66cbed0c5147p1dc0b6jsn76a4e2e2fccf'
  }
};

request(options, function (error, response, body) {
	if (error) throw new Error(error);

	console.log(body);
});