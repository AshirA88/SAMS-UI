from pad4pi import rpi_gpio
import sqlite3
import sys
import I2C_LCD_driver
from time import *
import datetime
import hashlib
from pyfingerprint import PyFingerprint
import calendar
import MySQLdb


mylcd = I2C_LCD_driver.lcd()

pressed_keys =''
pin="12345"
last = ''


def finger():
	
	try:
		f = PyFingerprint('/dev/ttyUSB0', 9600, 0xFFFFFFFF, 0x00000000)

		if ( f.verifyPassword() == False ):
			raise ValueError('The given fingerprint sensor password is wrong!')
			startChoice()
	except Exception as e:
		print('The fingerprint sensor could not be initialized!')
		print('Exception message: ' + str(e))
		startChoice()

	
	print('Currently used templates: ' + str(f.getTemplateCount()))

	
	try:
		mylcd.lcd_clear()
		mylcd.lcd_display_string('Place your',1)
		mylcd.lcd_display_string('right thumb',2)

		
		while ( f.readImage() == False ):
			pass

	
		f.convertImage(0x01)

		
		result = f.searchTemplate()

		positionNumber = result[0]
		accuracyScore = result[1]

		if ( positionNumber == -1 ):
			mylcd.lcd_clear()
			mylcd.lcd_display_string('Do not match',1,2)
			sleep(2)
			mylcd.lcd_clear()
			startChoice()
		else:
			mylcd.lcd_clear()
			today_name = datetime.date.today()
			if (calendar.day_name[today_name.weekday()] != 'Sunday'):
				
				now = datetime.datetime.now()
				
				
				my_time_string_10 = "10:30:00"
				my_time_string_11 = "10:45:00"
				my_time_string_12 = "12:15:00"
				
				
				time_10 = datetime.datetime.strptime(my_time_string_10, "%H:%M:%S")
				time_11 = datetime.datetime.strptime(my_time_string_11, "%H:%M:%S") 
                time_12 = datetime.datetime.strptime(my_time_string_12, "%H:%M:%S")
				

				
				
				time_10 = now.replace(hour=time_10.time().hour, minute=time_10.time().minute, second=time_10.time().second, microsecond=0)
				time_11 = now.replace(hour=time_11.time().hour, minute=time_11.time().minute, second=time_11.time().second, microsecond=0)
				time_12 = now.replace(hour=time_12.time().hour, minute=time_12.time().minute, second=time_12.time().second, microsecond=0)
				
				print('Found template at position "#"' + str(positionNumber))
				mylcd.lcd_display_string('Please Wait',1)

				
				f.loadTemplate(positionNumber, 0x01)

				
				characterics = str(f.downloadCharacteristics(0x01)).encode('utf-8')
				val_hash = hashlib.sha256(characterics).hexdigest()
				
				print('SHA-2 hash of template: ' + val_hash)

				
				conn = MySQLdb.connect("localhost","root","samss")
				curs = conn.cursor()
				db_val = curs.execute('SELECT rollnum,hashval FROM finger_store WHERE id in (values(?))', [positionNumber])
				for row in db_val:
					ext_id = row[0]
					mylcd.lcd_clear()
					mylcd.lcd_display_string("YOUR ID NUMBER",1,2)
					mylcd.lcd_display_string(ext_id,2,4)
					sleep(2)
					mylcd.lcd_clear()
				conn.commit()
				conn.close()

				con =MySQLdb.connect("localhost","root","samss")
				curs2 = con.cursor()
				curs2.execute('SELECT Timestamp from record where (Timestamp, id) in (values(?, ?))', (today_name, ext_id))
				d = curs2.fetchone()
				con.close()

				if d == None:
					con = MySQLdb.connect("localhost","root","samss")
					c = con.cursor()
					c.execute('INSERT INTO record (id,Timestamp) values(?, ?)',(ext_id, today_name))
					con.commit()
					con.close()
				

				if (now <= time_11) and (now > time_10):
					con = MySQLdb.connect("localhost","root","samss")
					c = con.cursor()
					c.execute('UPDATE reocord SET statusfirst = ? WHERE (id, Timestamp) in (values(?, ?))',('1', ext_id, today_name))
					con.commit()
					con.close()
					mylcd.lcd_display_string("Attendance",1)
					mylcd.lcd_display_string("Successful",2)
					sleep(2)
					mylcd.lcd_clear()

				elif (now >= time_11) and (now <= time_12):
					mylcd.lcd_display_string("Sorry",1,3)
					mylcd.lcd_dispplay_string("You are late",2,2)
					sleep(2)
					mylcd.lcd_clear()

                                

			
	except Exception as e:
		print('Operation failed!')
		print('Exception message: ' + str(e))
		startChoice()


KEYPAD = [
        ["1","2","3","A"],
        ["4","5","6","B"],
        ["7","8","9","C"],
        ["*","0","#","D"]
]

# same as calling: factory.create_4_by_4_keypad, still we put here fyi:
ROW_PINS = [16, 20, 21, 5] # BCM numbering; Board numbering is: 7,8,10,11 (see pinout.xyz/)
COL_PINS = [6, 13, 19, 26] # BCM numbering; Board numbering is: 12,13,15,16 (see pinout.xyz/)

factory = rpi_gpio.KeypadFactory()

# Try keypad = factory.create_4_by_3_keypad() or 
# Try keypad = factory.create_4_by_4_keypad() #for reasonable defaults
# or define your own:
keypad = factory.create_keypad(keypad=KEYPAD, row_pins=ROW_PINS, col_pins=COL_PINS)

#function to clear string
def clear_keys():
	global pressed_keys
	pressed_keys = pressed_keys.replace(pressed_keys,'')
	
#change store key function to do something on submission of a certain key that indicated send, will use pound for example.
def store_key(key):
	global pressed_keys
	global paass
	print(fun)
	if key=='#':
		#im printing but you should do whatever it is you intend to do with the sequence of keys.
		print(pressed_keys)
		if (pressed_keys=="1"):
			finger()
			startChoice()
		elif (pressed_keys=="2"):
			clear_keys()
			pwd()
		else:
			mylcd.lcd_clear()
			mylcd.lcd_display_string('Sorry',1,3)
			mylcd.lcd_display_string('Choose Again',2,2)
			sleep(2)
			startChoice()
		

	else:
		pressed_keys += key
		

def startChoice():	
	global fun
	clear_keys()
	mylcd.lcd_clear()
	mylcd.lcd_display_string('1. Attendance',1)
	
	fun = fun.replace(fun,'storekey')

startChoice()




try:
	while(True):
		time.sleep(0.2)
except:
	keypad.cleanup()
