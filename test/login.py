from selenium import webdriver
import time
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
print("accept leave test case started")
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

driver.find_element("xpath", "/html/body/div/ul/li[13]/a").click()
time.sleep(3)
driver.find_element("xpath", "/html/body/div/ul/li[13]/div/div/a").click()
time.sleep(3)
driver.find_element("xpath", "/html/body/div/div/div/div/div[2]/div[2]/div/div/div[2]/table/tbody/tr[1]/td[6]/a[1]").click()
time.sleep(3)
print("leave accepted ")
