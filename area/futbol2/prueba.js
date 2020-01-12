$.ajax({
  headers: { 'X-Auth-Token': 'YOUR_API_TOKEN' },
  url: 'http://api.football-data.org/v2/matches?status='LIVE',
  dataType: 'json',
  type: 'GET',
}).done(function(response) {
  // do something with the response, e.g. isolate the id of a linked resource   
  console.log(response);
});