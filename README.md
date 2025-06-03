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


dockerd-rootless-setuptool.sh install --skip-iptables

curl -fsSL https://get.docker.com/rootless | sh
export PATH=$HOME/bin:$PATH
export DOCKER_HOST=unix://$XDG_RUNTIME_DIR/docker.sock

# Then:
dockerd-rootless-setuptool.sh install --skip-iptables



mkdir -p ~/.config/docker
nano ~/.config/docker/daemon.json
{
  "dns": ["8.8.8.8", "1.1.1.1"]
}
systemctl --user restart docker



docker-compose up --build


to enter the bash :
docker exec -it mysql-db bash
to run the seeder :
mysql -u root -proot mister_quiz
mysql -u root -proot mister_quiz < /docker-entrypoint-initdb.d/questions_and_answers.sql


for laravel in other terminal :
 docker-compose up -d
 docker exec -it laravel-app bash
 composer install



 dockerd-rootless.sh &
 export DOCKER_HOST=unix://$XDG_RUNTIME_DIR/docker.sock