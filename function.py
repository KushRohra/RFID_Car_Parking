import requests
import time
import json

#rfid = input("Enter RFID of the vehicle")
#rfid = int(rfid)
#vehicle = input("Enter the type of vehicle: 0 for 2 wheeler and 1 for 4 wheeler")
#vehicle = int(vehicle)
time = int(round(time.time()*1000))


rfid = 45
vehicle = 0
userdata = {"rfid":rfid, "time":time, "vehicle":vehicle}
resp = requests.post('http://localhost/RFID_Car_Parking/RFID_Car_Parking/admin_area/update.php', params=userdata)
#r = requests.get("http://localhost/test/test.php")#.json()
#getdata = r.json
print(resp)
#print(getdata)
#print(getdata['date'])