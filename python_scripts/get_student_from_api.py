import requests
import json

writeFile = open("./outputs/studentData.sql", "w")

apiURL = "https://people.ce.pdn.ac.lk/api/students/"
data = json.loads(requests.get(apiURL).text)
writeFile.write("INSERT INTO student VALUES\n")
totalNumStudents = len(data)
print(totalNumStudents)
i = 0
for eachStudent in data:
    eachStudent = data[eachStudent]
    if len(eachStudent['name_with_initials']) != 0:
        if i != totalNumStudents - 1:
            writeFile.write(
                f"('{eachStudent['eNumber']}','{eachStudent['emails']['faculty']}','{eachStudent['preferred_long_name']}','{eachStudent['preferred_short_name']}','{eachStudent['name_with_initials']}','','','Computing',''),\n")
        else:
            writeFile.write(
                f"('{eachStudent['eNumber']}','{eachStudent['emails']['faculty']}','{eachStudent['preferred_long_name']}','{eachStudent['preferred_short_name']}','{eachStudent['name_with_initials']}','','','Computing','');")
    i += 1
    print(i)
