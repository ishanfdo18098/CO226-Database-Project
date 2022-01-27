import requests
import json

apiURL = "https://people.ce.pdn.ac.lk/api/students/"
data = json.loads(requests.get(apiURL).text)
for eachStudent in data:
    print(data[eachStudent])
    break
