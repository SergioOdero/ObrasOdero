import http.client
import json

connection = http.client.HTTPConnection('api.football-data.org')
headers = { 'X-Auth-Token': 'YOUR_API_TOKEN' }
connection.request('GET', '/v2/competitions/DED', None, headers )
response = json.loads(connection.getresponse().read().decode())

print (response)