to run it use :

||||||||||||||||||||||||||-

to install docker :

curl -fsSL https://get.docker.com/rootless | sh
export PATH=$HOME/bin:$PATH
export DOCKER_HOST=unix://$XDG_RUNTIME_DIR/docker.sock

||||||||||||||||||||||||||||

upodate the composer :
docker-compose run composer update
||||||||||||||||||||

docker-compose logs app
docker-compose logs web
docker-compose logs db