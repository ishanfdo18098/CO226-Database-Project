# Creates the reset_db.php file from the SQL files
file1 = open("../SQL/create_tables.sql")
file2 = open("../SQL/insert_data.sql")

outputText = """<?php
require("./functions.php");

$sql = " """
sqlCount = 0
for eachLine in file1:
    if "id18333488_site;" in eachLine:
        continue
    elif (";" in eachLine) and not ("--" in eachLine):
        sqlCount += 1
    outputText += eachLine
    
for eachLine in file2:
    if "id18333488_site;" in eachLine:
        continue
    elif (";" in eachLine) and not ("--" in eachLine):
        sqlCount += 1
    outputText += eachLine

print(f"{sqlCount} number of queries")

outputText += """";
$conn = connectToDB();
$count = 0;
if ($conn->multi_query($sql)) {
    do {
        // Store first result set
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s", $row[0]);
            }
            $result->free_result();
        }
        // if there are more result-sets, the print a divider
        if ($conn->more_results()) {
            $count++;
        }
        //Prepare next result set
    } while ($conn->next_result());
}
echo ($count . " queries submitted <br> DB should be now resetted.");"""

outputFile = open("../server/reset_db.php", "w")
outputFile.write(outputText)
