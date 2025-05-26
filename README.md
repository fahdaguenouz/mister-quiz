mister quize 









// to install mysql 
sudo apt update
sudo apt install mysql-server -y
sudo systemctl start mysql
sudo systemctl enable mysql


// to install xampp
wget https://www.apachefriends.org/xampp-files/8.2.12/xampp-linux-x64-8.2.12-0-installer.run

chmod +x xampp-linux-x64-8.2.12-0-installer.run
sudo ./xampp-linux-x64-8.2.12-0-installer.run
sudo /opt/lampp/lampp start



to enter the bash :
docker exec -it mysql-db bash
to run the seeder :
mysql -u root -p mister_quiz < /questions_and_answers.sql

for laravel in other terminal :
 docker-compose up -d
 docker exec -it laravel-app bash
 composer install