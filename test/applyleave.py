from selenium import webdriver
import time
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
print("zookeeper module leave apply test case started")
options=webdriver.ChromeOptions()
options.add_experimental_option('excludeSwitches',['enable-logging'])
driver = webdriver.Chrome(options=options)
driver.maximize_window()
driver.get("http://localhost/zoofari-1.0.0/Login.php")
driver.find_element("id", "email").send_keys("zookeeper@gmail.com")
time.sleep(3)
driver.find_element("id", "password").send_keys("Zookeeper123")
time.sleep(3)
driver.find_element("xpath", "/html/body/div/form/input").click()
time.sleep(3)
driver.find_element("xpath", "/html/body/div/ul/li[5]/a").click()
time.sleep(3)
driver.find_element("xpath", "/html/body/div/ul/li[5]/div/div/a[2]").click()
time.sleep(3)

driver.find_element("id", "reason").send_keys("hospital case")
time.sleep(3)
driver.find_element("id", "startdate").send_keys("01-05-2023")
time.sleep(3)
driver.find_element("id", "lastdate").send_keys("05-05-2023")
time.sleep(3)
driver.find_element("xpath","/html/body/div/div/div/div/div[2]/div/div/div[2]/div/div/div/div/div/div/div/form/div[5]/input").click()
time.sleep(3)

print("Leave applied success")

