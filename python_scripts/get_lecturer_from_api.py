import requests
import json
import hashlib

writeFile = open("./outputs/lecturerData.sql", "w")

apiURL = "https://people.ce.pdn.ac.lk/api/staff/"
data = json.loads(requests.get(apiURL).text)
writeFile.write("INSERT INTO lecturer VALUES\n")
index = 1
for each in data:
    thisLect = data[each]
    if thisLect['contact_number'] == "":
        thisLect['contact_number'] = str(947000000)
    writeFile.write(f"({index},'{thisLect['name']}','{thisLect['email']}','password123',{thisLect['contact_number'].replace(' ','')},'Department of Computer Engineering'),\n")
    index += 1
