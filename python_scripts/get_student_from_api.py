import requests
import json

apiURL = "https://people.ce.pdn.ac.lk/api/students/"
data = json.loads(requests.get(apiURL).text)
print("INSERT INTO names VALUES ")
for eachStudent in data:
    eachStudent = data[eachStudent]
    if len(eachStudent['name_with_initials']) != 0:
        print(f"('{eachStudent['name_with_initials']}'),")
