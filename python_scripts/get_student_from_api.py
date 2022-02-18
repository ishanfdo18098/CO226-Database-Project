import requests
import json
import hashlib

writeFile = open("./outputs/studentData.sql", "w")

apiURL = "https://people.ce.pdn.ac.lk/api/students/"
data = json.loads(requests.get(apiURL).text)
writeFile.write("INSERT INTO student VALUES\n")
for eachStudent in data:
    eachStudent = data[eachStudent]
    if int(eachStudent['eNumber'][2:4]) < 16:
        continue
    if len(eachStudent['name_with_initials']) != 0:
        writeFile.write(
            f"('{eachStudent['eNumber']}','{eachStudent['emails']['faculty']}','{eachStudent['emails']['faculty'][0:6]}','{eachStudent['preferred_long_name']}','{eachStudent['preferred_short_name']}','{eachStudent['name_with_initials']}','','','Department of Computer Engineering'),\n")

print("Now go the end of the file and add the semicolon manually 😂")
