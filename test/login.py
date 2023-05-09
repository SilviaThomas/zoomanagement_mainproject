from selenium import webdriver
import time
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
print("Login test case started")
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
print("User Logged In")
