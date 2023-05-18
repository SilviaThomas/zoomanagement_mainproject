from selenium import webdriver
import time
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
print("Add Zookeeper test case started")
options=webdriver.ChromeOptions()
options.add_experimental_option('excludeSwitches',['enable-logging'])
driver = webdriver.Chrome(options=options)
driver.maximize_window()
driver.get("http://localhost/zoofari-1.0.0/Login.php")
driver.find_element("id", "email").send_keys("admin@gmail.com")
time.sleep(3)
driver.find_element("id", "password").send_keys("admin12345")
time.sleep(3)
driver.find_element("xpath", "/html/body/div/form/input").click()
time.sleep(3)
driver.find_element("xpath", "/html/body/div/ul/li[9]/a/span").click()
time.sleep(3)
driver.find_element("xpath", "/html/body/div/ul/li[9]/div/div/a[1]").click()
time.sleep(3)
driver.find_element("id", "fname").send_keys("asha")
time.sleep(3)
driver.find_element("id", "lname").send_keys("james")
time.sleep(3)
driver.find_element("id", "email").send_keys("ashajames@gmail.com")
time.sleep(3)
driver.find_element("id", "log_password").send_keys("Ashajames@123")
time.sleep(3)
driver.find_element("xpath", "/html/body/div/div/div/div/div[2]/section/div/div/form/div[9]/input").click()
time.sleep(3)
print("Task Submitted: In Test Passed")


