To start the containers:

    docker-compose -f docker-compose-dev.yaml up -d

To stop the containers:

    docker-compose -f docker-compose-dev.yaml stop

## Database dumps

To load a dump (e.g. from the path `./dumps/dump.sql`):

    docker exec -i sample-master_db_1 bash -c '/usr/bin/mysql -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE' < ./dump.sql

To create a dump:

    docker exec -i sample-master_db_1 bash -c '/usr/bin/mysqldump -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE' > ./`/bin/date +'%Y%m%d%H%M%S'`_dump.sql

To create a new user/password from command line :

    php artisan tinker
    User::factory()->create(['email'=>'peyman@digitalspital.de','name'=>'Peyman','password'=>bcrypt('123456')]);

To create many random users : 
  
    php artisan tinker
    User::factory()->count(5)->create()

To re produce the api documentations:

    php artisan scribe:generate


