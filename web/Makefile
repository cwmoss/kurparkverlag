all: build sync

build:
	gridsome build

sync:
	rsync -avz dist/ technik@kyff05.20sec.de:/var/www/vhosts/kurparkverlag/htdocs/