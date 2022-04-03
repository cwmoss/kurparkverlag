HOST=technik@kyff05.20sec.de

all: build-host

build-host:
	#rsync -avz remote-server/ --exclude="vendor" --exclude="composer.lock" $(HOST):/var/www/vhosts/kurparkverlag/remote-server/
	#rsync -avz web/ --exclude="node_modules" --exclude="package-lock.json" $(HOST):/var/www/vhosts/kurparkverlag/web/
	rsync -avz slowfoot/ --exclude="vendor" --exclude="composer.lock" \
		--exclude="download" --exclude="rendered-images" --exclude="dist"\
		$(HOST):/var/www/vhosts/kurparkverlag/slowfoot/
	ssh -t $(HOST) 'cd /var/www/vhosts/kurparkverlag/slowfoot/;composer install'

build-host-update:
	ssh -t $(HOST) 'cd /var/www/vhosts/kurparkverlag/remote-server/;composer install'
	#ssh -t $(HOST) 'cd /var/www/vhosts/kurparkverlag/web/;npm install'

build-host-writeable:
	ssh -t $(HOST) 'sudo chmod -R 0777 /var/www/vhosts/kurparkverlag/slowfoot/'