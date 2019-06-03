Run the following command to create your database
    psql -h localhost -d ctech -U <your-postgres-user> -f users.sql

Modify these lines in your "utils.conf.php"
    define("HOST", <your-server-host>);
    define("DB_NAME", <your-db-name>);
    define("PGQL_USER", <your-postgres-user>);
    define("PGQL_PASSWORD", <your-postfres-password>);
